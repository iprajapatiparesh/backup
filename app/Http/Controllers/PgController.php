<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Pg;
use App\Models\Rentdetail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Storage;
use DB;
use Validator;

class PgController extends Controller
{

    public function index()
    {
        $pgs = Pg::all();

        $pgs = DB::table('pgs')
            ->leftJoin('users', 'pgs.UserId', '=', 'users.id')
            ->select('pgs.*', 'users.UserName')
            ->get();

        return view('admin.pg.index', compact('pgs'));
    }


    public function create()
    {
        $facilities = Facility::all();
        $pgAgents = User::where('role', 'pg_agent')->pluck('UserName', 'id');
        return view('admin.pg.create', compact('facilities', 'pgAgents'));
    }


    public function store(Request $request)
    {
        try {
            $rules = [
                'PgName' => 'required|string|max:255',
                'OwnerName' => 'required|string|max:255',
                'UserId' => 'required|exists:users,id',
                'PgType' => 'required|in:Boys,Girls,Both',
                'State' => 'required|string|max:255',
                'City' => 'required|string|max:255',
                'PinCode' => 'required|string|max:10',
                'RentRange' => 'required|string|regex:/^\d{4,}-\d{4,}$/',
                'Address' => 'required|string',
                'MinSharing' => 'required|integer|min:1',
                'MaxSharing' => 'required|integer|min:1|gte:MinSharing',
                'facilities_data' => 'nullable|string',
                'rent_details_data' => 'nullable|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            $validatedData = Validator::make($request->all(), $rules);

            if ($validatedData->fails()) {
                return response()->json([
                    'message' => 'Error: The given data was invalid.',
                    'errors' => $validatedData->errors()
                ], 422);
            }

            $pg = Pg::create([
                'PgName' => $request->input('PgName'),
                'OwnerName' => $request->input('OwnerName'),
                'UserId' => $request->input('UserId'),
                'PgType' => $request->input('PgType'),
                'State' => $request->input('State'),
                'City' => $request->input('City'),
                'PinCode' => $request->input('PinCode'),
                'RentRange' => $request->input('RentRange'),
                'Address' => $request->input('Address'),
                'MinSharing' => $request->input('MinSharing'),
                'MaxSharing' => $request->input('MaxSharing'),
                'Status' => 'Pending',
            ]);

            if ($request->has('facilities_data')) {
                $facilities = json_decode($request->facilities_data, true);
                foreach ($facilities as $facilityId) {
                    DB::table('pg_facilities')->updateOrInsert([
                        'PgId' => $pg->id,
                        'FacilityId' => $facilityId
                    ]);
                }
            }

            if ($request->has('rent_details_data')) {
                $rentDetails = json_decode($request->rent_details_data, true);
                foreach ($rentDetails as $detail) {
                    DB::table('rentdetails')->updateOrInsert([
                        'PgId' => $pg->id,
                        'Sharing' => $detail['Sharing'],
                        'AC' => $detail['AC'],
                        'Rent' => $detail['Rent']
                    ]);
                }
            }

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                foreach ($images as $index => $image) {
                    $imageName = $pg->id . '_' . $index . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $imagePath = 'pg_images/' . $imageName;

                    Storage::disk('public')->put($imagePath, file_get_contents($image));

                    DB::table('pg_images')->Insert([
                        'pg_id' => $pg->id,
                        'image_path' => $imageName
                    ]);
                }
            }

            return response()->json(['success' => true, 'message' => 'PG created successfully!']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error : ' . $e->getMessage()]);
        }
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $pg = Pg::findOrFail($id);
        $pgAgents = User::where('role', 'pg_agent')->pluck('UserName', 'id');
        $facilities = Facility::all();
        $pg_facilities = DB::table('pg_facilities')->where('PgId', $id)->get();
        $rentdetails = DB::table('rentdetails')->where('PgId', $id)->get();
        $pg_images = DB::table('pg_images')->where('pg_id', $id)->get();
        return view('admin.pg.edit', compact('pg', 'pgAgents', 'facilities', 'pg_facilities', 'rentdetails', 'pg_images'));
    }

    public function updateFacility(Request $request)
    {
        $request->validate([
            'pg_id' => 'required|integer|exists:pgs,id',
            'facilities' => 'array',
            'facilities.*' => 'integer|exists:facilities,id'
        ]);

        $pgId = $request->input('pg_id');
        $facilityIds = $request->input('facilities', []);

        try {
            DB::table('pg_facilities')->where('PgId', $pgId)->delete();

            $data = array_map(function ($facilityId) use ($pgId) {
                return ['PgId' => $pgId, 'FacilityId' => $facilityId];
            }, $facilityIds);

            DB::table('pg_facilities')->insert($data);

            return response()->json(['success' => true, 'message' => 'Facilities updated successfully']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function addRentdetail(Request $request)
    {
        $request->validate([
            'PgId' => 'required|exists:pgs,id',
            'Sharing' => 'required|integer',
            'AC' => 'required|in:yes,no',
            'Rent' => 'required|numeric|min:0',
        ]);

        try {
            $rentDetail = Rentdetail::create([
                'PgId' => $request->input('PgId'),
                'Sharing' => $request->input('Sharing'),
                'AC' => $request->input('AC'),
                'Rent' => $request->input('Rent'),
            ]);

            return response()->json([
                'success' => true,
                'id' => $rentDetail->id
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add rent detail: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteRentdetail(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:rentdetails,id',
        ]);

        try {
            $rentDetail = RentDetail::findOrFail($request->input('id'));
            $rentDetail->delete();

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete rent detail: ' . $e->getMessage()
            ], 500);
        }
    }

    public function uploadImages(Request $request)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $uploadedImages = $request->file('images');
            $imagePaths = [];

            foreach ($uploadedImages as $index => $image) {
                $imageName = $request->input('pg_id') . '_' . $index . '_' . time() . '.' . $image->getClientOriginalExtension();
                $imagePath = 'pg_images/' . $imageName;

                Storage::disk('public')->put($imagePath, file_get_contents($image));

                $imageId = DB::table('pg_images')->insertGetId([
                    'pg_id' => $request->input('pg_id'),
                    'image_path' => $imageName,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                $imagePaths[] = $imagePath;
            }

            return response()->json(['success' => true, 'message' => 'Images uploaded successfully', 'image_paths' => $imagePaths]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:pg_images,id'
        ]);

        try {
            $image = DB::table('pg_images')->where('id', $request->input('id'))->first();

            if ($image) {
                $filePath = 'pg_images/' . $image->image_path;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }

                DB::table('pg_images')->where('id', $request->input('id'))->delete();

                return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
            }

            return response()->json(['success' => false, 'message' => 'Image not found']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {


            $validator = Validator::make($request->all(), [
                'PgName' => 'required|string|max:255',
                'OwnerName' => 'required|string|max:255',
                'UserId' => 'required|exists:users,id',
                'PgType' => 'required|string|in:Boys,Girls,Both',
                'PinCode' => 'required|string|max:10',
                'State' => 'required|string',
                'City' => 'required|string',
                'RentRange' => 'required|string',
                'Address' => 'required|string',
                'MinSharing' => 'required|integer|min:1',
                'MaxSharing' => 'required|integer|min:1',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }

            $pg = PG::findOrFail($id);

            $pg->update([
                'PgName' => $request->input('PgName'),
                'OwnerName' => $request->input('OwnerName'),
                'UserId' => $request->input('UserId'),
                'PgType' => $request->input('PgType'),
                'PinCode' => $request->input('PinCode'),
                'State' => $request->input('State'),
                'City' => $request->input('City'),
                'RentRange' => $request->input('RentRange'),
                'Address' => $request->input('Address'),
                'MinSharing' => $request->input('MinSharing'),
                'MaxSharing' => $request->input('MaxSharing'),
            ]);

            return response()->json(['success' => true, 'message' => 'PG details updated successfully.']);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error : ' . $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        //
    }
}

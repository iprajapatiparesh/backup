<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Log;
use Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $users = User::query()
            ->where('firstName', 'like', "%{$search}%")
            ->orWhere('lastName', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('contact', 'like', "%{$search}%")
            ->orWhere('username', 'like', "%{$search}%")
            ->orWhere('role', 'like', "%{$search}%")
            ->paginate(10);

        return view('admin.users.index', compact('users', 'search'));
    }

    public function create()
    {
        return view('admin.users.create');
    }


    public function checkUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
        ]);

        $exists = User::where('UserName', $request->input('username'))->exists();

        return response()->json(['exists' => $exists]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|digits:10|unique:users,contact',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,pg_agent',
            'active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = new User([
                'FirstName' => $request->firstName,
                'LastName' => $request->lastName,
                'email' => $request->email,
                'Contact' => $request->contact,
                'UserName' => $request->username,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'Active' => 1,
            ]);

            $user->save();

            return redirect()->route('users.index')->with('success', 'User created successfully.');

        } catch (Exception $e) {

            Log::error('User creation failed: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Failed to create user. Please try again later.')->withInput();
        }


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'contact' => 'required|digits:10',
            'username' => 'required|string|max:255|unique:users,UserName,' . $id,
            'role' => 'required|in:admin,pg_agent',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $user->FirstName = $request->input('firstName');
            $user->LastName = $request->input('lastName');
            $user->email = $request->input('email');
            $user->Contact = $request->input('contact');
            $user->UserName = $request->input('username');
            $user->role = $request->input('role');
            $user->save();

            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (Exception $e) {
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Failed to update user. Please try again later.')->withInput();
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

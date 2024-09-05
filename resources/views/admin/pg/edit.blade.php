@extends('layout.app')

@section('content')
    <div class="card mt-4">
        <div class="p-3">

            @if (session('success'))
                <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
                    <div class="bg-success me-3 icon-item">
                        <span class="fas fa-check-circle text-white fs-3"></span>
                    </div>
                    <p class="mb-0 flex-1">{{ session('success') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('info'))
                <div class="alert alert-info border-2 d-flex align-items-center" role="alert">
                    <div class="bg-info me-3 icon-item">
                        <span class="fas fa-info-circle text-white fs-3"></span>
                    </div>
                    <p class="mb-0 flex-1">{{ session('info') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning border-2 d-flex align-items-center" role="alert">
                    <div class="bg-warning me-3 icon-item">
                        <span class="fas fa-exclamation-circle text-white fs-3"></span>
                    </div>
                    <p class="mb-0 flex-1">{{ session('warning') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('danger'))
                <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
                    <div class="bg-danger me-3 icon-item">
                        <span class="fas fa-times-circle text-white fs-3"></span>
                    </div>
                    <p class="mb-0 flex-1">{{ session('danger') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card-header ">
                <h5>Update PG</h5>
            </div>

            <form id="pgForm" action="{{ route('pgs.update', $pg->id) }}" method="POST" novalidate>
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="PgName" class="form-label">PG Name</label>
                        <input type="text" class="form-control" id="PgName" name="PgName" value="{{ $pg->PgName }}"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="OwnerName" class="form-label">Owner Name</label>
                        <input type="text" class="form-control" id="OwnerName" name="OwnerName"
                            value="{{ $pg->OwnerName }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="UserId" class="form-label">PG Agent</label>
                        <select class="form-select" id="UserId" name="UserId" required>
                            <option value="">Select User</option>
                            @foreach ($pgAgents as $id => $name)
                                <option value="{{ $id }}"
                                    {{ $id == old('UserId', $pg->UserId) ? 'selected' : '' }}>
                                    {{ $name }}
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="PgType" class="form-label">PG Type</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PgType" id="PgTypeBoys" value="Boys"
                                {{ old('PgType', $pg->PgType) == 'Boys' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="PgTypeBoys">Boys</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PgType" id="PgTypeGirls" value="Girls"
                                {{ old('PgType', $pg->PgType) == 'Girls' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="PgTypeGirls">Girls</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PgType" id="PgTypeBoth" value="Both"
                                {{ old('PgType', $pg->PgType) == 'Both' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="PgTypeBoth">Both</label>
                        </div>
                    </div>

                </div>


                <div class="row mb-3">

                    <div class="col-md-6">
                        <label for="PinCode" class="form-label">Pin Code</label>
                        <input type="text" class="form-control" id="PinCode" name="PinCode"
                            value="{{ $pg->PinCode }}" required>
                        <div class="invalid-feedback" style="display: none" id="pincodeinvalid">Invalid Pincode</div>
                    </div>

                    <div class="col-md-6">
                        <label for="State" class="form-label">State</label>
                        <select class="form-control" id="State" name="State" required>
                            <option value="" disabled>Select your state</option>
                            <option value="Andhra Pradesh"
                                {{ old('State', $pg->State) == 'Andhra Pradesh' ? 'selected' : '' }}>Andhra Pradesh
                            </option>
                            <option value="Arunachal Pradesh"
                                {{ old('State', $pg->State) == 'Arunachal Pradesh' ? 'selected' : '' }}>Arunachal Pradesh
                            </option>
                            <option value="Assam" {{ old('State', $pg->State) == 'Assam' ? 'selected' : '' }}>Assam
                            </option>
                            <option value="Bihar" {{ old('State', $pg->State) == 'Bihar' ? 'selected' : '' }}>Bihar
                            </option>
                            <option value="Chhattisgarh"
                                {{ old('State', $pg->State) == 'Chhattisgarh' ? 'selected' : '' }}>Chhattisgarh</option>
                            <option value="Goa" {{ old('State', $pg->State) == 'Goa' ? 'selected' : '' }}>Goa</option>
                            <option value="Gujarat" {{ old('State', $pg->State) == 'Gujarat' ? 'selected' : '' }}>Gujarat
                            </option>
                            <option value="Haryana" {{ old('State', $pg->State) == 'Haryana' ? 'selected' : '' }}>Haryana
                            </option>
                            <option value="Himachal Pradesh"
                                {{ old('State', $pg->State) == 'Himachal Pradesh' ? 'selected' : '' }}>Himachal Pradesh
                            </option>
                            <option value="Jharkhand" {{ old('State', $pg->State) == 'Jharkhand' ? 'selected' : '' }}>
                                Jharkhand</option>
                            <option value="Karnataka" {{ old('State', $pg->State) == 'Karnataka' ? 'selected' : '' }}>
                                Karnataka</option>
                            <option value="Kerala" {{ old('State', $pg->State) == 'Kerala' ? 'selected' : '' }}>Kerala
                            </option>
                            <option value="Madhya Pradesh"
                                {{ old('State', $pg->State) == 'Madhya Pradesh' ? 'selected' : '' }}>Madhya Pradesh
                            </option>
                            <option value="Maharashtra" {{ old('State', $pg->State) == 'Maharashtra' ? 'selected' : '' }}>
                                Maharashtra</option>
                            <option value="Manipur" {{ old('State', $pg->State) == 'Manipur' ? 'selected' : '' }}>Manipur
                            </option>
                            <option value="Meghalaya" {{ old('State', $pg->State) == 'Meghalaya' ? 'selected' : '' }}>
                                Meghalaya</option>
                            <option value="Mizoram" {{ old('State', $pg->State) == 'Mizoram' ? 'selected' : '' }}>Mizoram
                            </option>
                            <option value="Nagaland" {{ old('State', $pg->State) == 'Nagaland' ? 'selected' : '' }}>
                                Nagaland</option>
                            <option value="Odisha" {{ old('State', $pg->State) == 'Odisha' ? 'selected' : '' }}>Odisha
                            </option>
                            <option value="Punjab" {{ old('State', $pg->State) == 'Punjab' ? 'selected' : '' }}>Punjab
                            </option>
                            <option value="Rajasthan" {{ old('State', $pg->State) == 'Rajasthan' ? 'selected' : '' }}>
                                Rajasthan</option>
                            <option value="Sikkim" {{ old('State', $pg->State) == 'Sikkim' ? 'selected' : '' }}>Sikkim
                            </option>
                            <option value="Tamil Nadu" {{ old('State', $pg->State) == 'Tamil Nadu' ? 'selected' : '' }}>
                                Tamil Nadu</option>
                            <option value="Telangana" {{ old('State', $pg->State) == 'Telangana' ? 'selected' : '' }}>
                                Telangana</option>
                            <option value="Tripura" {{ old('State', $pg->State) == 'Tripura' ? 'selected' : '' }}>Tripura
                            </option>
                            <option value="Uttar Pradesh"
                                {{ old('State', $pg->State) == 'Uttar Pradesh' ? 'selected' : '' }}>Uttar Pradesh</option>
                            <option value="Uttarakhand" {{ old('State', $pg->State) == 'Uttarakhand' ? 'selected' : '' }}>
                                Uttarakhand</option>
                            <option value="West Bengal" {{ old('State', $pg->State) == 'West Bengal' ? 'selected' : '' }}>
                                West Bengal</option>
                            <option value="Andaman and Nicobar Islands"
                                {{ old('State', $pg->State) == 'Andaman and Nicobar Islands' ? 'selected' : '' }}>Andaman
                                and Nicobar Islands</option>
                            <option value="Chandigarh" {{ old('State', $pg->State) == 'Chandigarh' ? 'selected' : '' }}>
                                Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu"
                                {{ old('State', $pg->State) == 'Dadra and Nagar Haveli and Daman and Diu' ? 'selected' : '' }}>
                                Dadra and Nagar Haveli and Daman and Diu</option>
                            <option value="Lakshadweep" {{ old('State', $pg->State) == 'Lakshadweep' ? 'selected' : '' }}>
                                Lakshadweep</option>
                            <option value="Delhi" {{ old('State', $pg->State) == 'Delhi' ? 'selected' : '' }}>Delhi
                            </option>
                            <option value="Puducherry" {{ old('State', $pg->State) == 'Puducherry' ? 'selected' : '' }}>
                                Puducherry</option>
                            <option value="Ladakh" {{ old('State', $pg->State) == 'Ladakh' ? 'selected' : '' }}>Ladakh
                            </option>
                            <option value="Jammu and Kashmir"
                                {{ old('State', $pg->State) == 'Jammu and Kashmir' ? 'selected' : '' }}>Jammu and Kashmir
                            </option>
                        </select>
                    </div>


                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label for="City" class="form-label">City</label>
                        <input type="text" class="form-control" id="City" name="City"
                            value="{{ $pg->City }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="RentRange" class="form-label">Rent Range (₹)</label>
                        <input type="text" class="form-control" id="RentRange" name="RentRange"
                            placeholder="for ex . 5000-15000" value="{{ $pg->RentRange }}" required>
                        <div class="invalid-feedback" style="display: none" id="rentrangeinvalid">Invalid Rent range .
                            Correct is : 5000-15000</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="Address" class="form-label">Address</label>
                        <textarea class="form-control" id="Address" name="Address" rows="3" required>{{ $pg->Address }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="MinSharing" class="form-label">Minimum Sharing</label>
                        <input type="number" class="form-control" id="MinSharing" name="MinSharing"
                            value="{{ $pg->MinSharing }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="MaxSharing" class="form-label">Maximum Sharing</label>
                        <input type="number" class="form-control" id="MaxSharing" name="MaxSharing"
                            value="{{ $pg->MaxSharing }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Facilities</label>
                        <div class="form-check">
                            <div class="row">
                                @foreach ($facilities as $index => $facility)
                                    <div class="col-md-4">
                                        <input class="form-check-input" type="checkbox"
                                            id="facility_{{ $facility->id }}" name="facilities[]"
                                            value="{{ $facility->id }}"
                                            {{ $pg_facilities->contains('FacilityId', $facility->id) ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                            for="facility_{{ $facility->id }}">{{ $facility->name }}</label>
                                    </div>

                                    @if (($index + 1) % 3 == 0)
                            </div>
                            <div class="row">
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <a class="btn btn-primary col-md-2" href="#" id="saveFacilities">Save Facilities</a>
                    </div>
                </div>

                <h5>Rent Details</h5>

                <div class="col-md-12">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row align-items-center">
                                        <div class="form-group col-md-3">
                                            <label class="label">Rent Type</label>
                                            <select class="form-select" name="rent_type" id="rent_type">
                                                <option value="">Select Rent Type</option>
                                                <option value="ac">AC</option>
                                                <option value="nonac">Non-AC</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="label">Sharing</label>
                                            <input type="text" class="form-control" id="sharing" name="sharing">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="label">Rent</label>
                                            <input type="number" class="form-control" id="rent" name="rent">
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <button type="button" class="btn btn-primary mt-3"
                                                id="addRentDetail">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="rentDetailsTable" class="table table-bordered table-striped mt-2 text-sm">
                            <thead>
                                <tr>
                                    <th class="th">Rent Type</th>
                                    <th class="th">Sharing</th>
                                    <th class="th">Rent</th>
                                    <th class="th">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentdetails as $detail)
                                    <tr id="rent-detail-{{ $detail->id }}">
                                        <td>{{ $detail->AC == 'yes' ? 'AC' : 'Non-AC' }}</td>
                                        <td>{{ $detail->Sharing }}</td>
                                        <td>{{ $detail->Rent }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm delete-rent-detail"
                                                data-id="{{ $detail->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Hidden fields to store facilities and rent details -->
                <input type="hidden" id="facilities_data" name="facilities_data">
                <input type="hidden" id="rent_details_data" name="rent_details_data">



                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="images" class="form-label">Upload Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple
                            accept="image/*">
                        <div id="imagePreview" class="mt-3 d-flex flex-wrap align-items-start">
                            @foreach ($pg_images as $image)
                                <div class="image-item position-relative d-inline-block me-2 mb-2"
                                    style="position: relative;">
                                    <img src="{{ asset('storage/app/public/pg_images/' . $image->image_path) }}"
                                        alt="Image" class="img-thumbnail"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                    <a id="delete_pg_image" class="btn btn-danger btn-sm"
                                        style="position: absolute; top: 5px; right: 5px;" data-id="{{ $image->id }}">
                                        Remove
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <small class="text-danger d-none" id="imageError">You can upload a maximum of 8 images.</small>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
            </form>

        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {


            function toggleSubmitButton() {
                if ($('.is-invalid').length > 0) {
                    $('#submitButton').prop('disabled', true);
                } else {
                    $('#submitButton').prop('disabled', false);
                }
            }

            $('#PgName').on('keyup', function() {
                var namePattern = /^[a-zA-Z0-9\s]+$/;
                var field = $(this);
                if (namePattern.test(field.val())) {
                    field.removeClass('is-invalid').addClass('is-valid');
                } else {
                    field.removeClass('is-valid').addClass('is-invalid');
                }
                toggleSubmitButton();
            });

            $('#OwnerName').on('keyup', function() {
                var namePattern = /^[a-zA-Z\s]+$/;
                var field = $(this);
                if (namePattern.test(field.val())) {
                    field.removeClass('is-invalid').addClass('is-valid');
                } else {
                    field.removeClass('is-valid').addClass('is-invalid');
                }
                toggleSubmitButton();
            });

            $('#City').on('keyup', function() {
                var namePattern = /^[a-zA-Z\s]+$/;
                var field = $(this);
                if (namePattern.test(field.val())) {
                    field.removeClass('is-invalid').addClass('is-valid');
                } else {
                    field.removeClass('is-valid').addClass('is-invalid');
                }
                toggleSubmitButton();
            });

            $('#PinCode').on('keyup', function() {
                var pincode = $(this).val();

                if (pincode.length === 6) {
                    $.ajax({
                        url: `https://api.postalpincode.in/pincode/${pincode}`,
                        method: 'GET',
                        success: function(response) {
                            if (response[0].Status === 'Success') {
                                var details = response[0].PostOffice[0];
                                $('#City').val(details.District);
                                $('#State').val(details.State);
                                $('#City').removeClass('is-invalid').addClass('is-valid');
                                $('#State').removeClass('is-invalid').addClass('is-valid');
                                $('#pincodeinvalid').hide();
                                $('#PinCode').removeClass('is-invalid').addClass('is-valid');
                            } else {

                                $('#PinCode').removeClass('is-valid').addClass('is-invalid');
                                $('#pincodeinvalid').show();

                                $('#City').val('');
                                $('#State').val('');
                                $('#City').removeClass('is-valid').addClass('is-invalid');
                                $('#State').removeClass('is-valid').addClass('is-invalid');

                                toggleSubmitButton();
                            }
                        },
                        error: function() {
                            $('#City').val('');
                            $('#State').val('');
                            $('#City').removeClass('is-valid').addClass('is-invalid');
                            $('#State').removeClass('is-valid').addClass('is-invalid');
                        }
                    });
                } else {
                    $('#City').val('');
                    $('#State').val('');
                    $('#City').removeClass('is-valid is-invalid');
                    $('#State').removeClass('is-valid is-invalid');
                }
            });

            $('#RentRange').on('keyup', function() {
                var field = $(this);
                var rentRange = field.val();
                var rentRangePattern = /^(\d{1,6})-(\d{1,6})$/;
                var isValid = false;

                var match = rentRange.match(rentRangePattern);

                if (match) {
                    var firstValue = parseInt(match[1], 10);
                    var secondValue = parseInt(match[2], 10);

                    // Check if the second value is greater than the first value
                    if (secondValue > firstValue) {
                        isValid = true;
                    }
                }

                if (isValid) {
                    $('#rentrangeinvalid').hide();
                    field.removeClass('is-invalid').addClass('is-valid');
                } else {
                    $('#rentrangeinvalid').show();
                    field.removeClass('is-valid').addClass('is-invalid');
                }

                toggleSubmitButton();
            });

            const maxImages = 8;

            $('#images').on('change', function() {
                const existingCount = $('#imagePreview .image-item').length;
                const newFiles = $(this)[0].files;
                const totalImages = existingCount + newFiles.length;

                if (totalImages > maxImages) {
                    $('#imageError').removeClass('d-none');
                    toastr.error('You can upload a maximum of 8 images only');
                    $(this).val('');
                    return;
                } else {
                    $('#imageError').addClass('d-none');
                }

                const formData = new FormData();
                for (let i = 0; i < newFiles.length; i++) {
                    const file = newFiles[i];
                    formData.append('images[]', file);
                    formData.append('pg_id', '{{ $pg->id }}');
                    formData.append('_token', '{{ csrf_token() }}');
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagePreview').append(`
                <div class="image-item position-relative d-inline-block me-2">
                    <img src="${e.target.result}" alt="Image" class="img-thumbnail" width="150">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 mt-2 me-2" data-new="true">Remove</button>
                </div>
            `);
                    };

                    reader.readAsDataURL(file);
                }

                $.ajax({
                    url: "{{ route('uploadImages') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Images uploaded successfully');
                        } else {
                            toastr.error('Failed to upload images');
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred while uploading images');
                    }
                });
            });


            $('#imagePreview').on('click', '.btn-danger', function() {
                if ($(this).data('new')) {
                    $(this).closest('.image-item').remove();
                } else {
                    const imageId = $(this).data('id');
                    $.ajax({
                        url: "{{ route('deleteImage') }}",
                        type: 'POST',
                        data: {
                            id: imageId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                $(this).closest('.image-item').remove();
                                toastr.success('Image deleted successfully');
                            } else {
                                toastr.error('Failed to delete image');
                            }
                        }.bind(this),
                        error: function() {
                            toastr.error('An error occurred while deleting the image');
                        }
                    });
                }
            });

            function updateImageInput() {
                var files = [];
                $('#imagePreview img').each(function() {
                    var src = $(this).attr('src');
                    if (src) {
                        var file = dataURLToFile(src, 'image.jpg');
                        files.push(file);
                    }
                });
                $('#images').prop('files', files);
            }

            function dataURLToFile(dataURL, filename) {
                var arr = dataURL.split(','),
                    mime = arr[0].match(/:(.*?);/)[1],
                    bstr = atob(arr[1]),
                    n = bstr.length,
                    u8arr = new Uint8Array(n);
                while (n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new File([u8arr], filename, {
                    type: mime
                });
            }

            $('#addRentDetail').on('click', function() {
                const rentType = $('#rent_type').val();
                const sharing = $('#sharing').val();
                const rent = $('#rent').val();

                var isAc = rentType === 'ac' ? 'yes' : 'no';
                var ac = rentType === 'ac' ? 'AC' : 'Non-AC';

                if (!rentType || !sharing || !rent) {
                    toastr.error('Please fill in all fields.');
                    return;
                }

                const newRow = `
            <tr id="rent-detail-new">
                <td>${ac}</td>
                <td>${sharing}</td>
                <td>${rent}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm delete-rent-detail" data-id="new">Delete</button>
                </td>
            </tr>
        `;
                $('#rentDetailsTable tbody').append(newRow);


                $.ajax({
                    url: '{{ route('addRentdetail') }}',
                    type: 'POST',
                    data: {
                        PgId: '{{ $pg->id }}',
                        Sharing: sharing,
                        AC: isAc,
                        Rent: rent,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.success) {
                            toastr.success('Rent Detail added');
                            $('#rent-detail-new').attr('id', 'rent-detail-' + data.id);
                            $('#rent-detail-new .delete-rent-detail').attr('data-id', data.id);
                        } else {
                            toastr.error('Failed to add rent detail.');
                            $('#rent-detail-new').remove();
                        }
                    }
                });
            });

            $('#rentDetailsTable').on('click', '.delete-rent-detail', function() {
                const row = $(this).closest('tr');
                const id = $(this).data('id');

                if (id === 'new') {
                    row.remove();
                    return;
                }

                if (confirm('Are you sure you want to delete this rent detail?')) {
                    $.ajax({
                        url: '{{ route('deleteRentdetail') }}',
                        type: 'POST',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if (data.success) {
                                toastr.success('Rent Detail deleted');
                                row.remove();
                            } else {
                                toastr.error('Failed to delete rent detail.');
                            }
                        }
                    });
                }
            });


            $('#saveFacilities').on('click', function(e) {
                e.preventDefault();

                const facilities = $('input[name="facilities[]"]:checked').map(function() {
                    return $(this).val();
                }).get();

                $.ajax({
                    url: "{{ route('updateFacility') }}",
                    type: 'POST',
                    data: {
                        pg_id: "{{ $pg->id }}",
                        facilities: facilities,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Facilities updated successfully');
                        } else {
                            toastr.error('Failed to update facilities: ' + response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        toastr.error('An error occurred while updating facilities: ' +
                            textStatus);
                    }
                });
            });

            $('#pgForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            setInterval(() => {
                                window.location.href = "{{ route('pgs.index') }}";
                            }, 1000);
                        } else {
                            toastr.error(response.message);
                        }

                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, errors) {
                                toastr.error(errors[0]);
                            });
                        } else {
                            toastr.error('An unexpected error occurred.');
                        }
                    }
                });
            });
        });
    </script>
@endsection

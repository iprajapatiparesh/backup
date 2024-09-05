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
                <h5>Create PG</h5>
            </div>

            <form id="pgForm" action="{{ route('pgs.store') }}" method="POST" novalidate>
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="PgName" class="form-label">PG Name</label>
                        <input type="text" class="form-control" id="PgName" name="PgName" required>
                    </div>
                    <div class="col-md-6">
                        <label for="OwnerName" class="form-label">Owner Name</label>
                        <input type="text" class="form-control" id="OwnerName" name="OwnerName" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="UserId" class="form-label">PG Agent</label>
                        <select class="form-select" id="UserId" name="UserId" required>
                            <option value="">Select User</option>
                            @foreach ($pgAgents as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="PgType" class="form-label">PG Type</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PgType" id="PgTypeBoys" value="Boys"
                                required>
                            <label class="form-check-label" for="PgTypeBoys">Boys</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PgType" id="PgTypeGirls" value="Girls"
                                required>
                            <label class="form-check-label" for="PgTypeGirls">Girls</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PgType" id="PgTypeBoth" value="Both"
                                required>
                            <label class="form-check-label" for="PgTypeBoth">Both</label>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">

                    <div class="col-md-6">
                        <label for="PinCode" class="form-label">Pin Code</label>
                        <input type="text" class="form-control" id="PinCode" name="PinCode" required>
                        <div class="invalid-feedback" style="display: none" id="pincodeinvalid">Invalid Pincode</div>
                    </div>

                    <div class="col-md-6">
                        <label for="State" class="form-label">State</label>
                        <select class="form-control" id="State" name="State" required>
                            <option value="" disabled selected>Select your state</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and
                                Diu</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        </select>
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label for="City" class="form-label">City</label>
                        <input type="text" class="form-control" id="City" name="City" required>
                    </div>

                    <div class="col-md-6">
                        <label for="RentRange" class="form-label">Rent Range (₹)</label>
                        <input type="text" class="form-control" id="RentRange" name="RentRange"
                            placeholder="for ex . 5000-15000" required>
                        <div class="invalid-feedback" style="display: none" id="rentrangeinvalid">Invalid Rent range .
                            Correct is : 5000-15000</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="Address" class="form-label">Address</label>
                        <textarea class="form-control" id="Address" name="Address" rows="3" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="MinSharing" class="form-label">Minimum Sharing</label>
                        <input type="number" class="form-control" id="MinSharing" name="MinSharing" required>
                    </div>
                    <div class="col-md-6">
                        <label for="MaxSharing" class="form-label">Maximum Sharing</label>
                        <input type="number" class="form-control" id="MaxSharing" name="MaxSharing" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Facilities</label>
                        <div class="form-check">
                            <div class="row">
                                @foreach ($facilities as $index => $facility)
                                    <div class="col-md-4">
                                        <input class="form-check-input" type="checkbox" id="facility_{{ $facility->id }}"
                                            name="facilities[]" value="{{ $facility->id }}">
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
                        <div id="imagePreview" class="mt-3"></div>
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

            $('#images').on('change', function() {
                var files = this.files;
                var imagePreview = $('#imagePreview');
                var maxImages = 8;

                imagePreview.empty();

                if (files.length > maxImages) {
                    toastr.error('You can upload a maximum of ' + maxImages + ' images.');
                    this.value = '';
                    return;
                }

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];

                    if (file && file.type.startsWith('image/')) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            var imgWrapper = $('<div>').css({
                                'display': 'inline-block',
                                'position': 'relative',
                                'margin': '5px'
                            });
                            var img = $('<img>').attr('src', event.target.result).css({
                                'width': '150px',
                                'height': '150px'
                            });

                            var removeBtn = $('<button>').text('Remove').addClass(
                                'btn btn-danger btn-sm').css({
                                'position': 'absolute',
                                'top': '0',
                                'right': '0'

                            }).on('click', function() {
                                $(this).parent().remove();
                                updateImageInput();
                            });

                            imgWrapper.append(img).append(removeBtn);
                            imagePreview.append(imgWrapper);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        toastr.error('Only image files are allowed.');
                        this.value = '';
                        return;
                    }
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

            document.getElementById('addRentDetail').addEventListener('click', function() {
                var rentType = document.getElementById('rent_type').value;
                var sharing = document.getElementById('sharing').value;
                var rent = document.getElementById('rent').value;

                if (rentType && sharing && rent) {
                    var rentTypeText = rentType === 'ac' ? 'AC' : 'Non-AC';

                    var rowHtml = "<tr>" +
                        "<td class='th'>" + rentTypeText + "</td>" +
                        "<td class='th'>" + sharing + "</td>" +
                        "<td class='th'>" + rent + "</td>" +
                        "<td class='th'>" +
                        "<a type='button' onclick='DeleteRow(this);' class='fas fa-trash-alt'></a>" +
                        "</td>" +
                        "</tr>";

                    var tableBody = document.querySelector('#rentDetailsTable tbody');
                    if (!tableBody) {
                        tableBody = document.createElement('tbody');
                        document.getElementById('rentDetailsTable').appendChild(tableBody);
                    }

                    tableBody.insertAdjacentHTML('beforeend', rowHtml);

                    // Clear fields after adding
                    document.getElementById('rent_type').value = '';
                    document.getElementById('sharing').value = '';
                    document.getElementById('rent').value = '';
                } else {
                    toastr.error('Please fill in all fields!');
                }
            });

            function DeleteRow(button) {
                button.closest('tr').remove();
            }

            $("#pgForm").submit(function(event) {
                event.preventDefault();

                var facilitiesData = [];
                $("input[name='facilities[]']:checked").each(function() {
                    facilitiesData.push($(this).val());
                });
                $("#facilities_data").val(JSON.stringify(facilitiesData));

                var rentDetailsData = [];
                $('#rentDetailsTable tbody tr').each(function(index, row) {
                    var rentType = $(row).find('td:eq(0)').text().trim();
                    var sharing = $(row).find('td:eq(1)').text().trim();
                    var rent = $(row).find('td:eq(2)').text().trim();
                    var isAc = rentType === 'AC' ? 'yes' : 'no';

                    rentDetailsData.push({
                        Sharing: sharing,
                        AC: isAc,
                        Rent: rent
                    });
                });
                $("#rent_details_data").val(JSON.stringify(rentDetailsData));

                var formData = new FormData(this);
                var files = $('#images')[0].files;

                formData.delete('images[]');

                for (var i = 0; i < files.length; i++) {
                    formData.append('images[]', files[i]);
                }

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);

                            setInterval(() => {
                                window.location.href = "{{ route('pgs.index') }}";
                            }, 1000);

                        } else if (response.error) {
                            toastr.error(response.error);
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

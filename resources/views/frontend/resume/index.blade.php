@extends('layouts.frotend_partial.app')
@section('content')
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action={{ route('resume.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="body mt-5">
                        <h6  style="font-size: 16px !important;font-weight: 370 !important">{{ trans('file.basic_information') }} </h6>
                        <input type="hidden" name="id" value="{{ $resume ? $resume->id : '' }}">
                        <hr>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group text-center"> <!-- Center align the container -->
                                    <label for="photo" class="tooltip-label _expanded_" title="{{ trans('file.photo') }}">{{ trans('file.photo') }} <span class="text-danger">*</span></label>
                                    <!-- Hidden file input to trigger file selection -->
                                    <input type="file" class="form-control d-none" name="photo" id="photo" accept="image/*">

                                    <!-- Avatar container with circular shape and centered content -->
                                    <div id="avatar-container" class="avatar-container">
                                        <img src="{{  $resume ? $resume->photo : url('/assets/images/default-user.png')  }}" id="avatar" class="avatar" alt="Avatar" width="100" height="100">
                                    </div>
                                    @if ($errors->has('photo'))
                                        <span id="profile-error" class="text-danger">{{ $errors->first('photo') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name" class="tooltip-label _expanded_" title="{{ trans('file.nametooltip') }}">{{ trans('file.name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Name" value="{{ $resume ? $resume->name : old('name') }}">
                                    @if ($errors->has('name'))
                                        <span id="name-error" class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="nickname">{{ trans('file.nickname') }}</label>
                                    <input type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" id="nickname" placeholder="Please Enter Nickname" value="{{ $resume ? $resume->nickname : old('nickname') }}">
                                    @if ($errors->has('nickname'))
                                        <span id="name-error" class="text-danger">{{ $errors->first('nickname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="phone" class="tooltip-label _expanded_" title="{{ trans('file.phonetooltips') }}">{{ trans('file.phone') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" min="5" max="10" placeholder="Please Enter Phone" value="{{   $resume ? $resume->phone : old('phone')   }}">
                                        <span id="phone-error" class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="email" class="tooltip-label _expanded_" title="{{ trans('file.emailtooltip') }}">{{ trans('file.email') }} <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Please Enter Email" value="{{ $resume ? $resume->email : old('email')  }}">
                                    @if ($errors->has('email'))
                                        <span id="email-error" class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="phone" class="tooltip-label _expanded_" title="{{ trans('file.dobtooltip') }}">{{ trans('file.dob') }} <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob" placeholder="Please Enter DOB" value="{{  $resume ? $resume->dob : old('dob')   }}">
                                    @if ($errors->has('dob'))
                                        <span id="name-error" class="text-danger">{{ $errors->first('dob') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="nickname">{{ trans('file.line_id') }}</label>
                                    <input type="text" class="form-control @error('nickname') is-invalid @enderror" name="line" id="line" placeholder="Please Enter Line ID" value="{{  $resume ? $resume->line : old('line')   }}">
                                    @if ($errors->has('line'))
                                        <span id="name-error" class="text-danger">{{ $errors->first('line_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="gender">{{ trans('file.gender') }}</label>
                                    <select class="form-control @error('gendertooltip') is-invalid @enderror" name="gender" id="gender">
                                        <option selected disabled>{{ trans('file.genderSelected') }}</option>
                                        <option value="male" {{ ($resume ? $resume->gender : old('gender')) == 'male' ? 'selected' : '' }}>{{ trans('file.male') }}</option>
                                        <option value="female" {{ ($resume ? $resume->gender : old('gender')) == 'female' ? 'selected' : '' }}>{{ trans('file.female') }}</option>
                                        <option value="other" {{ ($resume ? $resume->gender : old('gender')) == 'other' ? 'selected' : '' }}>{{ trans('file.other') }}</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="address" class="tooltip-label _expanded_" title="{{ trans('file.addresstooltip') }}">{{ trans('file.address') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="address" id="address" min="5" max="8" placeholder="Please Enter Address" value="{{  $resume ? $resume->address : old('address')   }}">
                                    @if ($errors->has('address'))
                                        <span id="address-error" class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="nationality" class="tooltip-label _expanded_" title="{{ trans('file.nationalitytooltip') }}">{{ trans('file.nationality') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" id="nationality"  placeholder="Please Enter Nationality" value="{{  $resume ? $resume->nationality : old('nationality')  }}">
                                    @if ($errors->has('nationality'))
                                        <span id="address-error" class="text-danger">{{ $errors->first('nationality') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="address" class="tooltip-label _expanded_" title="{{ trans('file.languagetooltip') }}">{{ trans('file.language') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('language') is-invalid @enderror" name="language" id="language" min="5" max="8" placeholder="Please Enter Language" value="{{  $resume ? $resume->language : old('language')  }}">
                                    @if ($errors->has('language'))
                                        <span id="address-error" class="text-danger">{{ $errors->first('language') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="description">{{ trans('file.about_me') }}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="4" name="description" id="description" rows="4
                                    " placeholder="Please Enter Description">{{  $resume ? $resume->description : old('description')  }}</textarea>
                                </div>
                            </div>
                        </div>
                        <h6  style="font-size: 16px !important;font-weight: 370 !important">{{ trans('file.education') }} </h6>
                        <hr>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="school" class="tooltip-label _expanded_" title="{{ trans('file.schooltooltip') }}">{{ trans('file.school') }}</label>
                                    <input type="text" class="form-control @error('school') is-invalid @enderror" name="school" id="school" placeholder="Please Enter School/University" value="{{  $resume ? $resume->school : old('school')  }}">
                                    @if ($errors->has('school'))
                                        <span id="school-error" class="text-danger">{{ $errors->first('school') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="degree">{{ trans('file.degree') }}</label>
                                    <input type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" id="degree" placeholder="Please Enter Degree" value="{{  $resume ? $resume->degree : old('degree')  }}">
                                    @if ($errors->has('degree'))
                                        <span id="degree-error" class="text-danger">{{ $errors->first('degree') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="major">{{ trans('file.major') }}</label>
                                    <input type="text" class="form-control @error('major') is-invalid @enderror" name="major" id="major" placeholder="Please Enter Major" value="{{  $resume ? $resume->major : old('major')  }}">
                                    @if ($errors->has('major'))
                                        <span id="major-error" class="text-danger">{{ $errors->first('major') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="gpa">{{ trans('file.gpa') }}</label>
                                    <input type="number" class="form-control @error('gpa') is-invalid @enderror" name="gpa" id="gpa" placeholder="Please Enter GPA" value="{{  $resume ? $resume->gpa : old('gpa')  }}">
                                    @if ($errors->has('gpa'))
                                        <span id="major-error" class="text-danger">{{ $errors->first('major') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="hobby">{{ trans('file.hobby') }}</label>
                                    <input type="text" class="form-control @error('hobby') is-invalid @enderror" name="hobby" id="hobby" placeholder="Please Enter Hobby" value="{{  $resume ? $resume->hobby : old('hobby')  }}">
                                    @if ($errors->has('hobby'))
                                        <span id="major-error" class="text-danger">{{ $errors->first('hobby') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="final_date">{{ trans('file.final_date') }}</label>
                                    <input type="date" class="form-control @error('finish_date') is-invalid @enderror" name="finish_date" id="finish_date" placeholder="Please Enter Final Date" value="{{  $resume ? $resume->finish_date : old('finish_date')  }}">
                                    @if ($errors->has('finish_date'))
                                        <span id="finish_date-error" class="text-danger">{{ $errors->first('finish_date') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h6  style="font-size: 16px !important;font-weight: 370 !important">{{ trans('file.working_experience') }} </h6>
                        <hr>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="company" class="tooltip-label _expanded_" title="{{ trans('file.companytooltip') }}">{{ trans('file.company') }}</label>
                                    <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" id="company" placeholder="Please Enter Company" value="{{  $resume ? $resume->company : old('company')  }}">
                                    @if ($errors->has('company'))
                                        <span id="company-error" class="text-danger">{{ $errors->first('company') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="nickname">{{ trans('file.position') }}</label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position" placeholder="Please Enter Position" value="{{  $resume ? $resume->position : old('position')  }}">
                                    @if ($errors->has('position'))
                                        <span id="position-error" class="text-danger">{{ $errors->first('position') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="start_date" class="tooltip-label _expanded_" title="{{ trans('file.start_date') }}">{{ trans('file.start_date') }}</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" id="start_date" placeholder="Please Enter Start Date" value="{{  $resume ? $resume->start_date : old('start_date')  }}">
                                    @if ($errors->has('start_date'))
                                        <span id="start-error" class="text-danger">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="end_date" class="tooltip-label _expanded_" title="{{ trans('file.end_date') }}">{{ trans('file.end_date') }}</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" id="end_date" placeholder="Please Enter End Date" value="{{  $resume ? $resume->end_date : old('end_date')  }}">
                                    @if ($errors->has('end_date'))
                                        <span id="end-error" class="text-danger">{{ $errors->first('end_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="description">{{ trans('file.worked_address') }}</label>
                                    <textarea class="form-control @error('worked_address') is-invalid @enderror" rows="4"  name="worked_address" id="worked_address" rows="4" placeholder="Please Enter Worked Address">{{  $resume ? $resume->worked_address : old('worked_address')  }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5" style="text-align: center">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> {{ trans('file.submit') }}</button>
                            <a href="{{ route('backend.song.index') }}" class="btn btn-danger"><i class="icon-logout"></i> {{ trans('file.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if(session('showModal'))
    <script>
        $(document).ready(function(){
            $('#successModal').modal('show');
        });
    </script>
@endif
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">{{ trans('file.previous_view') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group text-center">
                            <div id="avatar-container" class="avatar-container">
                                <img src="" id="avatardata" class="avatar" alt="Avatar" width="100" height="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="name">{{ trans('file.name') }}</label>
                            <input type="text" class="form-control" value="" id="namedata" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="phone">{{ trans('file.phone') }}</label>
                            <input type="text" class="form-control" value="" id="phonedata" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="email">{{ trans('file.email') }}</label>
                            <input type="text" class="form-control" value="" id="emaildata" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="address">{{ trans('file.address') }}</label>
                            <input type="text" class="form-control" value="" id="addressdata" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="email">{{ trans('file.gender') }}</label>
                            <input type="text" class="form-control" value="" id="genderdata" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="address">{{ trans('file.dob') }}</label>
                            <input type="date" class="form-control" value="" id="dobdata" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edit" onclick="editData()"><i class="fa fa-edit"></i> {{ trans('file.edit') }}</button>
                <button type="button" class="btn btn-info" onclick="printData()"><i class="fa fa-download"></i> {{ trans('file.download') }}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-logout"></i> {{ trans('file.close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function editData() {
        var data_id = {!! json_encode(session('data')) !!};
        var id = data_id.id;
        window.location.href = "{{ route('resume.edit', 'id') }}".replace('id', id);
    }
    function printData() {
        var data_id = {!! json_encode(session('data')) !!};
        var id = data_id.id;
        window.location.href = "{{ route('resume.download', 'id') }}".replace('id', id);
    }
    document.addEventListener("DOMContentLoaded", function() {
        var showModal = {{ session('showModal') ? 'true' : 'false' }};
        if (showModal) {
            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();
            var data = {!! json_encode(session('data')) !!};
            if(data.photo != null && data.photo != '' && data.photo != 'null'){
                $('#avatardata').attr('src', data.photo);
            }else{
                $('#avatardata').attr('src', '{{ url('/assets/images/default-user.png') }}');
            }
            $('#namedata').val(data.name);
            $('#phonedata').val(data.phone);
            $('#emaildata').val(data.email);
            $('#addressdata').val(data.address);
            $('#genderdata').val(data.gender);
            $('#dobdata').val(data.dob);
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('keyup', function() {
            var errorMessage = document.getElementById('phone-error');
            if (errorMessage) {
                // Remove any existing error message and invalid class
                errorMessage.style.display = 'none';
                phoneInput.classList.remove('is-invalid');
                var inputValue = phoneInput.value;
                if (!/^\d{5,10}$/.test(inputValue)) {
                    errorMessage.style.display = 'block';
                    phoneInput.classList.add('is-invalid');
                }
                if (!/^\d*$/.test(phoneInput.value)) {
                    errorMessage.style.display = 'block';
                    phoneInput.classList.add('is-invalid');
                }
            } else {
                console.error("Error: 'phone-error' element not found");
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var nameInput = document.getElementById('name');
        var phoneinput = document.getElementById('phone');
        var emailinput = document.getElementById('email');
        var errorMessage = document.getElementById('name-error');
        var emailerrorMessage = document.getElementById('email-error');
        var addressInput = document.getElementById('address');
        var addresserrorMessage = document.getElementById('address-error');
        addressInput.addEventListener('input', function() {
            if (addresserrorMessage && addresserrorMessage.textContent.trim() !== '') {
                addresserrorMessage.style.display = 'none';
                addressInput.classList.remove('is-invalid');
            }
        })
        emailinput.addEventListener('input', function() {
            if (emailerrorMessage && emailerrorMessage.textContent.trim() !== '') {
                emailerrorMessage.style.display = 'none';
                emailinput.classList.remove('is-invalid');
            }
        })
        nameInput.addEventListener('input', function() {
            if (errorMessage && errorMessage.textContent.trim() !== '') {
                errorMessage.style.display = 'none';
                nameInput.classList.remove('is-invalid');
            }
        });
        phoneinput.addEventListener('input', function() {
            if (errorMessage && errorMessage.textContent.trim() !== '') {
                errorMessage.style.display = 'none';
                phoneinput.classList.remove('is-invalid');
            }
        })
    });
</script>
<script>
    // Get reference to file input and avatar elements
    const fileInput = document.getElementById('photo');
    const avatarContainer = document.getElementById('avatar-container');
    const avatar = document.getElementById('avatar');

    // Add event listener for avatar click
    avatar.addEventListener('click', function() {
        // Trigger click event on file input
        fileInput.click();
    });

    // Add event listener for file input change
    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];

        // Check if file is selected
        if (file) {
            // Create a FileReader object to read the file
            const reader = new FileReader();

            // Set callback function to execute when file is read
            reader.onload = function(e) {
                // Update avatar src with the data URL of the selected image
                avatar.src = e.target.result;
            };

            // Read the file as a data URL (base64 encoded string)
            reader.readAsDataURL(file);
        }
    });
</script>

@endpush

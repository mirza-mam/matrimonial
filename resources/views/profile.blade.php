@extends('layout.main')
@push('header')
    <title>Syed Asad | Select Proposal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #707070 !important;
        }
    </style>
@endpush
@section('section')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-8 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white items-center"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                            <p class="my-5">ID : {{ $profile->id }}</p>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                alt="Avatar" class="img-fluid mb-4" style="width: 80px;" />
                            <h5>{{ $profile->first_name }} {{ $profile->last_name }}</h5>
                            <p>{{ $profile->email }}</p>
                            <p class="mb-5">Profile <button type="button" class="bg-transparent border-0 text-white"
                                    data-mdb-toggle="modal" data-mdb-target="#updateModal"><i class="far fa-edit"
                                        style="cursor: pointer;"></i></button></p>
                            <p class="mb-5">Password <button type="button" class="bg-transparent border-0 text-white"
                                    data-mdb-toggle="modal" data-mdb-target="#passwordModal"><i class="far fa-edit"
                                        style="cursor: pointer;"></i></button></p>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Title</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row">
                                    <p class="text-muted">{{ $profile->title }}</p>
                                </div>
                                <h6>Detail</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Gender</h6>
                                        <p class="text-muted">{{ $profile->gender }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Height</h6>
                                        <p class="text-muted">{{ $profile->height }}"</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Marital Status</h6>
                                        <p class="text-muted">{{ $profile->marital_status }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Caste</h6>
                                        <p class="text-muted">{{ $profile->caste }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Occupation</h6>
                                        <p class="text-muted">{{ $profile->occupation }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Education</h6>
                                        <p class="text-muted">{{ $profile->education }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Look</h6>
                                        <p class="text-muted">{{ $profile->look }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Income</h6>
                                        <p class="text-muted">{{ $profile->income }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Mobile</h6>
                                        <p class="text-muted">{{ $profile->mobile }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>WhatsApp</h6>
                                        <p class="text-muted">{{ $profile->whatsapp }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Religion</h6>
                                        <p class="text-muted">{{ $profile->religion }}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Country</h6>
                                        <p class="text-muted">
                                            {{ \App\Models\WorldCountries::where('id', '=', $profile->world_countries_id)->first()->name }}
                                        </p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>State</h6>
                                        <p class="text-muted">
                                            {{ \App\Models\WorldDivisions::where('id', '=', $profile->world_divisions_id)->first()->name }}
                                        </p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>City</h6>
                                        <p class="text-muted">
                                            {{ \App\Models\WorldCities::where('id', '=', $profile->world_cities_id)->first()->name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('update-profile') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <input type="text" value="{{ $profile->first_name }}" id="first_name"
                                        class="form-control form-control-lg" name="first_name" />
                                    <input type="hidden" value="{{ $profile->id }}" id="user_id"
                                        class="form-control form-control-lg" name="user_id" />
                                    <label class="form-label" for="first_name">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 pb-2">

                                <div class="form-outline">
                                    <input type="text" value="{{ $profile->last_name }}" id="last_name"
                                        class="form-control form-control-lg" name="last_name" />
                                    <label class="form-label" for="last_name">Last Name</label>
                                </div>

                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <label class="form-label" for="show_name">Want To Display Name</label>
                            <select class="form-select" name="show_name">
                                <option value="" hidden>Want To Display Name</option>
                                <option value="Yes" @selected($profile->show_name == 'Yes')>Yes</option>
                                <option value="No" @selected($profile->show_name == 'No')>No</option>
                            </select>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <input type="date" value="{{ $profile->dob }}" id="dob"
                                    class="form-control form-control-lg" name="dob" />
                                <label class="form-label" for="dob">Date Of Birth</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <select class="form-select" name="gender">
                                    <label class="form-label" for="gender">Gender</label>
                                    <option value="" hidden>Gender</option>
                                    <option value="Male" @selected($profile->gender == 'Male')>Male</option>
                                    <option value="Female"@selected($profile->gender == 'Female')>Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <input type="text" value="{{ $profile->height }}" id="heigh"
                                        class="form-control form-control-lg" name="height" />
                                    <label class="form-label" for="heigh">Height<sub>(In
                                            feet)</sub></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <select class="form-select" name="marital_status">
                                    <option value="" hidden>Marital status</option>
                                    <option value="Single" @selected($profile->marital_status == 'Single')>Single</option>
                                    <option value="Married" @selected($profile->marital_status == 'Married')>Married</option>
                                    <option value="Widow (Husband Died)" @selected($profile->marital_status == 'Widow (Husband Died)')>Widow (Husband Died)
                                    </option>
                                    <option value="Widower (Wife Died)" @selected($profile->marital_status == 'Widower (Wife Died)')>Widower (Wife Died)
                                    </option>
                                    <option value="Divorced" @selected($profile->marital_status == 'Divorced')>Divorced</option>
                                    <option value="Separated" @selected($profile->marital_status == 'Separated')>Separated</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <input type="text" value="{{ $profile->caste }}" id="caste"
                                        class="form-control form-control-lg" name="caste" />
                                    <label class="form-label" for="caste">Caste</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 pb-2">
                            <div class="form-outline">
                                <textarea type="text" value="{{ $profile->title }}" id="title" class="form-control form-control-lg"
                                    name="title">{{ $profile->title }}</textarea>
                                <label class="form-label" for="title">Title</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label" for="qualification">Qualification</label>
                                <select class="form-select" name="qualification">
                                    <option value="" hidden>Qualification</option>
                                    <option value="Under Matric">Under Matric</option>
                                    <option value="Under Matric">Under Matric</option>
                                    <option value="Matric">Matric</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Graduation">Graduation</option>
                                    <option value="Masters">Masters</option>
                                    <option value="Masters">PHD</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label" for="occupation">Occupation</label>
                                <select class="form-select" name="occupation">
                                    <option value="" hidden>Occupation</option>
                                    <option value="Doctor"@selected($profile->occupation == 'Doctor')>Doctor</option>
                                    <option value="Engineer"@selected($profile->occupation == 'Engineer')>Engineer</option>
                                    <option value="CSS Officer"@selected($profile->occupation == 'CSS Officer')>CSS Officer</option>
                                    <option value="Cyber Security"@selected($profile->occupation == 'Cyber Security')>Cyber Security</option>
                                    <option value="Teacher"@selected($profile->occupation == 'Teacher')>Teacher</option>
                                    <option value="Business Man"@selected($profile->occupation == 'Business Man')>Business Man</option>
                                    <option value="Armed Forces"@selected($profile->occupation == 'Armed Forces')>Armed Forces</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <select class="form-select" name="look">
                                    <option value="" hidden>Look</option>
                                    <option value="Very Fair"@selected($profile->look == 'Very Fair')>Very Fair</option>
                                    <option value="Fair"@selected($profile->look == 'Fair')>Fair</option>
                                    <option value="Medium"@selected($profile->look == 'Medium')>Medium</option>
                                    <option value="Dark"@selected($profile->look == 'Dark')>Dark</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <input type="text" value="{{ $profile->income }}" id="income"
                                        class="form-control form-control-lg" name="income" />
                                    <label class="form-label" for="income">Income</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 pb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="religion">Religion</label>
                                    <select class="form-select" name="religion">
                                        <option value="" hidden>Religion</option>
                                        <option value="Islam"@selected($profile->religion == 'Islam')>Islam</option>
                                        <option value="Christianity"@selected($profile->religion == 'Christianity')>Christianity</option>
                                        <option value="Hinduism"@selected($profile->religion == 'Hinduism')>Hinduism</option>
                                        <option value="Buddhism"@selected($profile->religion == 'Buddhism')>Buddhism</option>
                                        <option value="Other"@selected($profile->religion == 'Other')>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 pb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="country">Country</label>
                                    <select class="form-select" name="country">
                                        <option value="{{ $profile->world_countries_id }}" hidden>Country</option>
                                        @foreach (\App\Models\WorldCountries::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="state">Province/State</label>
                                    <select class="form-select" name="state">
                                        <option value="{{ $profile->world_divisions_id }}" hidden>State</option>
                                        @foreach (\App\Models\WorldCountries::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <label class="form-label" for="city">City</label>
                                    <select class="form-select" name="city">
                                        <option value="{{ $profile->world_cities_id }}" hidden>Cities</option>
                                        @foreach (\App\Models\WorldCountries::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <input type="text" value="{{ $profile->whatsapp }}" id="whatsapp"
                                        class="form-control form-control-lg" name="whatsapp" />
                                    <label class="form-label" for="whatsapp">WhatsApp</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                    <input type="text" value="{{ $profile->mobile }}" id="mobile"
                                        class="form-control form-control-lg" name="mobile" />
                                    <label class="form-label" for="mobile">Mobile</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn register_btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('password-update') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <span class="bi bi-eye trailing text-muted" id="p_eye_show"
                                        style="cursor: pointer;display: block;" onclick="password_show_hide()"></span>
                                    <span class="bi bi-eye-slash trailing text-muted" id="p_eye_hide"
                                        style="cursor: pointer;display: none;" onclick="password_show_hide()"></span>
                                    <input type="password" id="password"
                                        class="form-control form-control-lg form-icon-trailing" name="password" />
                                    <label class="form-label" for="password">Old Password</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <span class="bi bi-eye trailing text-muted" id="c_p_eye_show"
                                        style="cursor: pointer;display: block;" onclick="c_password_show_hide()"></span>
                                    <span class="bi bi-eye-slash trailing text-muted" id="c_p_eye_hide"
                                        style="cursor: pointer;display: none;" onclick="c_password_show_hide()"></span>
                                    <input type="password" id="confirm_password"
                                        class="form-control form-control-lg form-icon-trailing"
                                        name="password_confirmation" />
                                    <label class="form-label" for="password_confirmation">New Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn register_btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('footer')
    <script>
        function password_show_hide() {
            var x = document.querySelector("#password");
            var show_eye = document.getElementById("p_eye_show");
            var hide_eye = document.getElementById("p_eye_hide");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }

        function c_password_show_hide() {
            var c_x = document.querySelector("#confirm_password");
            if (c_x.type === "password") {
                c_x.type = "text";
                $('#c_p_eye_show').hide();
                $('#c_p_eye_hide').show();
            } else {
                c_x.type = "password";
                $('#c_p_eye_hide').hide();
                $('#c_p_eye_show').show();
            }
        }
    </script>
@endpush

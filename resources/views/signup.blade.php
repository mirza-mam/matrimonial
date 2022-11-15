@extends('layout.main')
@push('header')
<title>Register | Select Proposal</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<style>
@media (min-width: 1025px) {
    .h-custom {
        height: 100vh !important;
    }
}

.form-outline .trailing {
    pointer-events: visiblestroke !important;
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
}

.card-registration .select-arrow {
    top: 13px;
}

.gradient-custom-2 {
    /* fallback for old browsers */
    background: #eee;
}

.bg-indigo {
    background-color: #707070 !important;
}

@media (min-width: 992px) {
    .card-registration-2 .bg-indigo {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }
}

@media (max-width: 991px) {
    .card-registration-2 .bg-indigo {
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }
}
</style>
@endpush
@section('section')
<section class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5 font-heading">Basic Infomation</h3>

                                        <div class="mb-4 pb-2">
                                            <select class="form-select" name="you_are">
                                                <option value="" hidden>You are</option>
                                                <option value="Self">Self</option>
                                                <option value="Parent/Guardian">Parent/Guardian</option>
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <input type="text" id="first_name"
                                                        class="form-control form-control-lg" name="first_name" />
                                                    <label class="form-label" for="first_name">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <input type="text" id="last_name"
                                                        class="form-control form-control-lg" name="last_name" />
                                                    <label class="form-label" for="last_name">Last name</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <select class="form-select" name="show_name">
                                                <option value="" hidden>Want To Display Name</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="email" id="email" class="form-control form-control-lg"
                                                    name="email" />
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="date" id="dob" class="form-control form-control-lg"
                                                    name="dob" />
                                                <label class="form-label" for="dob">Date of birth</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">
                                                <select class="form-select" name="gender">
                                                    <option value="" hidden>Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <input type="text" id="height" class="form-control form-control-lg"
                                                        name="height" />
                                                    <label class="form-label" for="height">Height<sub>(In
                                                            feet)</sub></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">
                                                <select class="form-select" name="marital_status">
                                                    <option value="" hidden>Marital status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widow (Husband Died)">Widow (Husband Died)</option>
                                                    <option value="Widower (Wife Died)">Widower (Wife Died)</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline">
                                                    <input type="text" id="caste" class="form-control form-control-lg"
                                                        name="caste" />
                                                    <label class="form-label" for="caste">Caste</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <span class="bi bi-eye trailing" id="p_eye_show"
                                                        style="cursor: pointer;display: block;"
                                                        onclick="password_show_hide()"></span>
                                                    <span class="bi bi-eye-slash trailing" id="p_eye_hide"
                                                        style="cursor: pointer;display: none;"
                                                        onclick="password_show_hide()"></span>
                                                    <input type="password" id="password"
                                                        class="form-control form-control-lg form-icon-trailing"
                                                        name="password" />
                                                    <label class="form-label" for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <span class="bi bi-eye trailing" id="c_p_eye_show"
                                                        style="cursor: pointer;display: block;"
                                                        onclick="c_password_show_hide()"></span>
                                                    <span class="bi bi-eye-slash trailing" id="c_p_eye_hide"
                                                        style="cursor: pointer;display: none;"
                                                        onclick="c_password_show_hide()"></span>
                                                    <input type="password" id="confirm_password"
                                                        class="form-control form-control-lg form-icon-trailing"
                                                        name="confirm_password" />
                                                    <label class="form-label" for="confirm_password">Confirm
                                                        Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 bg-indigo text-white">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5 font-heading">Personal Details</h3>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <textarea type="text" id="title" class="form-control form-control-lg"
                                                    name="title" placeholder="I'm MBBS doctor looking for..."></textarea>
                                                <label class="form-label" for="title">Title</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2 form-white">
                                                <select class="form-select" name="qualification">
                                                    <option value="" hidden>Qualification</option>
                                                    <option value="Under Matric">Under Matric</option>
                                                    <option value="Matric">Matric</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Graduation">Graduation</option>
                                                    <option value="Masters">Masters</option>
                                                    <option value="Masters">PHD</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2 form-white">
                                                <select class="form-select" name="occupation">
                                                    <option value="" hidden>Occupation</option>
                                                    <option value="Doctor">Doctor</option>
                                                    <option value="Engineer">Engineer</option>
                                                    <option value="CSS Officer">CSS Officer</option>
                                                    <option value="Cyber Security">Cyber Security</option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="Business Man">Business Man</option>
                                                    <option value="Armed Forces">Armed Forces</option>
                                                    <option value="Other">Other</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">
                                                <select class="form-select" name="look">
                                                    <option value="" hidden>Look</option>
                                                    <option value="Very Fair">Very Fair</option>
                                                    <option value="Fair">Fair</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="Dark">Dark</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline form-white">
                                                    <input type="number" id="income"
                                                        class="form-control form-control-lg" name="income" />
                                                    <label class="form-label" for="income">Income</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-4 pb-2">
                                                <div class="form-outline form-white">
                                                    <select class="form-select" name="religion">
                                                        <option value="" hidden>Religion</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Christianity">Christianity</option>
                                                        <option value="Hinduism">Hinduism</option>
                                                        <option value="Buddhism">Buddhism</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-4 pb-2">
                                                <div class="form-outline form-white">
                                                    <select class="form-select" name="country">
                                                        <option value="" hidden>Country</option>
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
                                                <div class="form-outline form-white">
                                                    <select class="form-select" name="state">
                                                        <option value="" hidden>State</option>
                                                        @foreach (\App\Models\WorldCountries::all() as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline form-white">
                                                    <select class="form-select" name="city">
                                                        <option value="" hidden>Cities</option>
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
                                                <div class="form-outline form-white">
                                                    <input type="number" id="whatsapp"
                                                        class="form-control form-control-lg" name="whatsapp" />
                                                    <label class="form-label" for="whatsapp">WhatsApp</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <div class="form-outline form-white">
                                                    <input type="number" id="mobile"
                                                        class="form-control form-control-lg" name="mobile" />
                                                    <label class="form-label" for="mobile">Mobile</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                            <input class="form-check-input me-3" type="checkbox" value=""
                                                id="form2Example3c" required />
                                            <label class="form-check-label text-white" for="form2Example3">
                                                I do accept the <a href="javascript:void(0)" class="text-white"><u>Terms
                                                        and
                                                        Conditions</u></a> of your
                                                site.
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-light btn-lg"
                                            data-mdb-ripple-color="dark">Register</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
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
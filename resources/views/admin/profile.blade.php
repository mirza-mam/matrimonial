@extends('admin.layout.main')
@push('header')
    <title>Profile | Select Proposal</title>
@endpush
@section('section')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
    @php
        $admin = \App\Models\Admins::first();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <form action="{{ route('admin.update-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('uploads/' . $admin->media) }}" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar"
                                onerror="this.src='{{ asset('admin/img/avatars/1.png') }}'" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="media" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" onchange="readURL(this);" />                                        
                                </label>
                                <button type="submit" class="btn btn-success mt-n3">Update</button>
                                <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('admin.update-profile') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input class="form-control" type="text" id="firstName" name="firstName"
                                    value="{{ $admin->first_name }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="lastName" id="lastName"
                                    value="{{ $admin->last_name }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" value="{{ $admin->email }}"
                                    placeholder="john.doe@example.com" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="organization" class="form-label">Username</label>
                                <input type="text" class="form-control" id="organization" value="{{ $admin->username }}"
                                    disabled />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('admin.update-password') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-password-toggle mb-3 col-md-6">
                                <label class="form-label" for="basic-default-password12">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="basic-default-password12"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2" />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                                <small class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-password-toggle mb-3 col-md-6">
                                <label class="form-label" for="basic-default-password1">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="basic-default-password1"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2" />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#uploadedAvatar')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush

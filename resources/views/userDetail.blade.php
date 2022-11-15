@extends('layout.main')
@push('header')
<title>Syed Asad | Select Proposal</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('section')

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $detail->first_name }} {{ $detail->last_name }}</h5>
                        <p class="text-muted mb-1">ID : {{ $detail->id }}</p>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <p class="mb-4 px-4 pt-3 heading-red">Contact Detail</p>
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-phone fa-lg text-warning"></i>
                                <p class="mb-0">{{ $detail->mobile }}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-whatsapp fa-lg" style="color: #25D366;"></i>
                                <p class="mb-0">{{ $detail->whatsapp }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-4 mt-4 mb-lg-0">
                    <div class="card-body p-0">
                        <p class="mb-4 px-4 pt-3 heading-red">Address Detail</p>
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-globe fa-lg"></i>
                                <p class="mb-0">
                                    {{ \App\Models\WorldCountries::where('id', '=', $detail->world_countries_id)->first()->name }}
                                </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-fort-awesome-alt fa-lg"></i>
                                <p class="mb-0">
                                    {{ \App\Models\WorldDivisions::where('id', '=', $detail->world_divisions_id)->first()->name }}
                                </p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-city fa-lg"></i>
                                <p class="mb-0">
                                    {{ \App\Models\WorldCities::where('id', '=', $detail->world_cities_id)->first()->name }}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="mb-4 heading-red">Basic Detail</p>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Title</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $detail->title }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $detail->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Age</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ age_counter($detail->dob) }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Gender</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $detail->gender }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Height</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $detail->height }}"</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Marital Status </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $detail->marital_status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="mb-4 heading-red">Personal Detail</p>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Education</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $detail->education }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Occupation</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $detail->occupation }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Look</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $detail->look }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Income</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $detail->income }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Religion</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $detail->religion }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="mb-0">Caste</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $detail->caste }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('footer')
<script></script>
@endpush
@extends('layout.main')
@push('header')
    <title>Search | Select Proposal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('section')
    <div class="row mx-3 mt-4 mb-4">
        <h3 class="heading-black" style="font-size: 20px;">Featured</h3>
        <div class="row featured">
            @foreach ($featuredUsers as $featured)                
                <div class="card-body p-4 m-1 text-left"
                    style="background-color: #c81919; color: white;border-radius: 10px">
                    <div class="rounded-1 mb-2 title-limit" style="height: 55px;">
                        {{ $featured->title }}
                    </div>
                    <div class="table-responsive" style="margin-top: -2.5rem !important;">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="px-2">ID</td>
                                    <td class="px-2">{{ $featured->id }}</td>
                                </tr><br>
                                <tr>
                                    <td class="px-2">Status</td>
                                    <td class="px-2">{{ $featured->marital_status }}</td>
                                </tr><br>
                                <tr>
                                    <td class="px-2">Location</td>
                                    <td class="px-2">
                                        {{ \App\Models\WorldCountries::where('id', '=', $featured->world_countries_id)->first()->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">Occupation</td>
                                    <td class="px-2">
                                        {{ $featured->occupation }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">Age</td>
                                    <td class="px-2">
                                        {{ age_counter($featured->dob) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">Gender</td>
                                    <td class="px-2">
                                        {{ $featured->gender }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">WhatsApp</td>
                                    <td class="px-2">
                                        {{ $featured->whatsapp }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">Mobile</td>
                                    <td class="px-2">
                                        {{ $featured->mobile }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('user-details', [$featured->id]) }}" class="btn register_btn mt-3">View profile</a>    
                    </div>                    
                </div>
            @endforeach
        </div>
    </div>
    <div class="row mx-3 mt-4 mb-4">
        <div class="col-md-2 p-3 rounded overflow-auto" style="background-color: #8f8b8f">
            <div class="mb-4">
                <h5 class="heading-white">Quick Searches</h5>
                <div style="background-color: #f9f9f9;">
                    <div class="dropdown">
                        <button class="dropbtn"><span>Islamabad</span> <i class="fa-solid fa-angle-right"
                                style="float: right"></i></button>
                        <div class="dropdown-content" style="float: right">
                            <a href="{{ url('islamabad/male/single') }}">Male Single</a>
                            <a href="{{ url('islamabad/male/divorced') }}">Male Divorced</a>
                            <a href="{{ url('islamabad/female/single') }}">Female Single</a>
                            <a href="{{ url('islamabad/female/divorced') }}">Female Divorced</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn"><span>Karachi</span> <i class="fa-solid fa-angle-right"
                                style="float: right"></i></button>
                        <div class="dropdown-content" style="float: right">
                            <a href="{{ url('karachi/male/single') }}">Male Single</a>
                            <a href="{{ url('karachi/male/divorced') }}">Male Divorced</a>
                            <a href="{{ url('karachi/female/single') }}">Female Single</a>
                            <a href="{{ url('karachi/female/divorced') }}">Female Divorced</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn"><span>Lahore</span> <i class="fa-solid fa-angle-right"
                                style="float: right"></i></button>
                        <div class="dropdown-content" style="float: right">
                            <a href="{{ url('lahore/male/single') }}">Male Single</a>
                            <a href="{{ url('lahore/male/divorced') }}">Male Divorced</a>
                            <a href="{{ url('lahore/female/single') }}">Female Single</a>
                            <a href="{{ url('lahore/female/divorced') }}">Female Divorced</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background-color: white;border: 1px solid white;height: 40px;margin: -16px !important;margin-top: 29px !important;"></div>
            <h5 class="heading-black mt-5 text-center">Searche by filter</h5>
            <form method="POST" action="{{ route('user.search') }}">
                <div class="mb-4">
                    <h5 class="heading-white">Profession</h5>
                    @csrf
                    <div>
                        <select name="profession" class="form-select">
                            <option value="" selected>Select Profession</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Business Man">Business Man</option>
                            <option value="Developer">Developer</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="heading-white">Province</h5>
                    <div>
                        <select class="form-select" name="province">
                            <option value="" selected>Select Province</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="heading-white">City</h5>
                    <div>
                        <select class="form-select" name="city">
                            <option value="" selected>Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="heading-white">Gender</h5>
                    <div>
                        <select class="form-select" name="gender">
                            <option value="" selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="heading-white">Marital Status</h5>
                    <div>
                        <select class="form-select" name="marital_status">
                            <option value="" selected>Select Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="Widow (Husband Died)">Widow (Husband Died)</option>
                            <option value="Widower (Wife Died)">Widower (Wife Died)</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 text-center">
                    <button type="submit" name="filter" class="btn filter_btn"><b>Apply Filter</b></button>
                </div>
            </form>
        </div>
        <div class="col-md-8 m-0 p-4 px-5 overflow-auto"
            style="background-color: white;background-image: url({{ asset('front/images/2.png') }});background-repeat: no-repeat;background-position: center;background-size: cover;padding: 5% !important;height: 83% !important;">
            <h2 class="heading-black text-center mb-4" style="font-size: 20px;">New Proposals</h2>
            <div class="row justify-content-around" id="table_data">
                @include('pagination')
            </div>
        </div>
        <div class="col-md-2 p-3 rounded overflow-auto" style="background-color: #8f8b8f">
            <div class="mb-4">
                <h5 class="heading-white text-center">Abroad Searches</h5>
            </div>
            <form method="POST" action="{{ route('user.search') }}">
                <div class="mb-4">
                    <h5 class="heading-white">Profession</h5>
                    @csrf
                    <div>
                        <select name="profession" class="form-select">
                            <option value="" selected>Select Profession</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Business Man">Business Man</option>
                            <option value="Developer">Developer</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="heading-white">Province</h5>
                    <div>
                        <select class="form-select" name="province">
                            <option value="" selected>Select Province</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="heading-white">City</h5>
                    <div>
                        <select class="form-select" name="city">
                            <option value="" selected>Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="heading-white">Gender</h5>
                    <div>
                        <select class="form-select" name="gender">
                            <option value="" selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <h5 class="heading-white">Marital Status</h5>
                    <div>
                        <select class="form-select" name="marital_status">
                            <option value="" selected>Select Status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="Widow (Husband Died)">Widow (Husband Died)</option>
                            <option value="Widower (Wife Died)">Widower (Wife Died)</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 text-center">
                    <button type="submit" name="filter" class="btn filter_btn"><b>Apply Filter</b></button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('footer')
    <script>
        $('.featured').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            autoplay: true,
            dots: false,
            customPaging: function(slider, i) {
                var thumb = $(slider.$slides[i]).data();
                return '<a class="featured-number">' + (i + 1) + '</a>';
            },
            responsive: [{
                    breakpoint: 901,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 521,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $(document).ready(function() {

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                var l = window.location;
                $.ajax({
                    url: "proposal?page=" + page,
                    success: function(satwork) {
                        $('#table_data').html(satwork);
                    }
                });
            }

        });
    </script>
@endpush

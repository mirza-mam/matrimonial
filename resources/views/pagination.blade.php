@if (count($users)>0)
    @foreach ($users as $user)
    <div class="card-body col-md-5 p-4 m-1 text-left" style="background-color: #efefef;border-radius: 10px">
        <div class="rounded-1 mb-2 title-limit" style="color: #c81919;height: 55px;">
            {{ $user->title }}
        </div>
        <div class="row">
            <div class="col-md-8">
                <table class="table-responsive"
                    style="margin-top: -2.5rem !important;margin-right: 1rem !important;">
                    <tbody>
                        <tr>
                            <td class="m-2" style="color: #c81919;">ID</td>
                            <td class="text-muted mb-0">{{ $user->id }}</td>
                        </tr><br>
                        <tr>
                            <td class="m-2" style="color: #c81919;">Status</td>
                            <td class="text-muted mb-0">{{ $user->marital_status }}</td>
                        </tr><br>
                        <tr>
                            <td class="m-2" style="color: #c81919;">Location</td>
                            <td class="text-muted mb-0">
                                {{ \App\Models\WorldCountries::where('id', '=', $user->world_countries_id)->first()->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="m-2" style="color: #c81919;">Occupation</td>
                            <td class="text-muted mb-0">
                                {{ $user->occupation }}
                            </td>
                        </tr>
                        <tr>
                            <td class="m-2" style="color: #c81919;">Age</td>
                            <td class="text-muted mb-0">
                                {{ age_counter($user->dob) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="m-2" style="color: #c81919;">Gender</td>
                            <td class="text-muted mb-0">
                                {{ $user->gender }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="mt-3 mb-4">
                    <img src="{{ asset('upload/'.$user->media) }}" alt="{{ $user->first_name }} {{ $user->last_name }}" class="rounded-circle img-fluid" style="width: 150px;" onerror="this.src='{{ asset('front/images/profile.png') }}'">
                </div>
            </div>
        </div>
        <a href="{{ route('user-details', [$user->id]) }}"
            class="btn register_btn float-end">
            View profile</a>
    </div>
    @endforeach
    <nav aria-label="..." class="mt-4 d-flex justify-content-lg-center">
        {!! $users->links() !!}
    </nav>
@else
    <h1 class="text-white text-center items-center">
        Data Not Found.
    </h1>
@endif

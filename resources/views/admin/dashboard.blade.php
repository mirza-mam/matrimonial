@extends('admin.layout.main')
@push('header')
<title>Dashboard | Select Proposal</title>
@endpush
@section('section')
<div class="row">
    <div class="col-lg-3 col-md-12 col-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-semibold d-block mb-1 text-info"><i class='bx bx-group' style="font-size: 2.15rem;"></i>
                    Total
                    Users</h5>
                <h3 class="card-title mb-2">{{$totalUsers}}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-12 col-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-semibold d-block mb-1 text-warning"><i class='bx bx-group'
                        style="font-size: 2.15rem;"></i> Featured
                    Users</h5>
                <h3 class="card-title mb-2">{{$featuredUsers}}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-12 col-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-semibold d-block mb-1 text-success"><i class='bx bx-group'
                        style="font-size: 2.15rem;"></i> Verified
                    Users</h5>
                <h3 class="card-title mb-2">{{$verifiedUsers}}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-12 col-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="fw-semibold d-block mb-1 text-gray"><i class='bx bx-group' style="font-size: 2.15rem;"></i>
                    Pending
                    Users</h5>
                <h3 class="card-title mb-2">{{$pendingUsers}}</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
            </div>
            <img class="img-fluid" src="{{ asset('/admin/img/elements/13.jpg') }}" alt="Card image cap" />
            <div class="card-body">
                <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                <a href="javascript:void(0);" class="card-link">Card link</a>
                <a href="javascript:void(0);" class="card-link">Another link</a>
            </div>
        </div>
    </div>
</div>
@endsection
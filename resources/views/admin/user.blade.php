@extends('admin.layout.main')
@push('header')
<title>Users | Select Proposal</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.css" />
@endpush
@section('section')
<div class="card overflow-auto p-2">
    <div class="card-header">
        <h3>Users</h3>
        <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Import User Data</button>
        </form>
        <a class="btn btn-warning float-end" href="{{ route('admin.users_export') }}">Export User Data</a>
    </div>
    <table class="table p-0 text-nowrap card-body" id="horizontal-example">
        <thead>
            <tr>
                <th>id</th>
                <th>first name</th>
                <th>last name</th>
                <th>email</th>
                <th>dob</th>
                <th>you are</th>
                <th>title</th>
                <th>gender</th>
                <th>height</th>
                <th>marital status</th>
                <th>caste</th>
                <th>look</th>
                <th>education</th>
                <th>occupation</th>
                <th>income</th>
                <th>religion</th>
                <th>whatsapp</th>
                <th>mobile</th>
                <th>world_countries_id</th>
                <th>world_divisions_id</th>
                <th>world_cities_id</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        </tbody>
    </table>
</div>
@endsection
@push('footer')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#horizontal-example').DataTable({
        processing: true,
        serveSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('admin.get-users') }}",
            type: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function(data) {
                // data.fromValues = $("#filterUserType").serialize();
            }
        },
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'first_name',
                name: 'first_name'
            },
            {
                data: 'last_name',
                name: 'last_name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'dob',
                name: 'dob'
            },
            {
                data: 'you_are',
                name: 'you_are'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'gender',
                name: 'gender'
            },
            {
                data: 'height',
                name: 'height'
            },
            {
                data: 'marital_status',
                name: 'marital_status'
            },
            {
                data: 'caste',
                name: 'caste'
            },
            {
                data: 'look',
                name: 'look'
            },
            {
                data: 'education',
                name: 'education'
            },
            {
                data: 'occupation',
                name: 'occupation'
            },
            {
                data: 'income',
                name: 'income'
            },
            {
                data: 'religion',
                name: 'religion'
            },
            {
                data: 'whatsapp',
                name: 'whatsapp'
            },
            {
                data: 'world_countries_id',
                name: 'world_countries_id'
            },
            {
                data: 'world_divisions_id',
                name: 'world_divisions_id'
            },
            {
                data: 'world_cities_id',
                name: 'world_cities_id'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
        ]
    });
});
</script>
@endpush
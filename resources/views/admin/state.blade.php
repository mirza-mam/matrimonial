@extends('admin.layout.main')
@push('header')
    <title>States | Select Proposal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
@endpush
@section('section')
    <div class="card overflow-hidden p-2">
        <div class="card-header">
            <h3>States</h3>
        </div>
        <table class="table p-0 text-nowrap card-body" id="horizontal-example">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>                    
                    <th>Country</th>                    
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#horizontal-example').DataTable({
                processing: true,
                serveSide: true,
                ajax: {
                    url: "{{ route('admin.get-states') }}",
                    type: 'post',
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'country',
                        name: 'world_countries.name'
                    },
                ]
            });
        });
    </script>
@endpush

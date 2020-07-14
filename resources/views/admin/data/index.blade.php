@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
    <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
        <li>
            <a class="nav-link active" href="{{ route('admin.data') }}"><i class="icon icon-home2"></i>All Admins</a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('admin.data.add') }}"><i class="icon icon-plus-circle"></i> Add Admin</a>
        </li>
    </ul>
</div>
@endsection
@section('content')
<div class="container-fluid my-3">
    <div class="card no-b">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('bottom')
<script>
    var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                url: '{{ route('admin.api.data') }}',
                type: 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
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
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    mRender: function (data, type, row) {
                        return '<a href="{{ route('admin.data.edit') }}/' + row.id +
                            '" class="btn btn-warning btn-xs mr-1"><i class="icon icon-pencil pr-0"></i></a>' +
                            '<a href="javascript:void(0)" onclick="deleteRow(' + row.id +
                            ')" class="btn btn-danger btn-xs mr-1 white-text"><i class="icon icon-trash pr-0"></i></a>'
                    }
                }
            ],
        });

        function deleteRow(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.data.delete') }}/" + id,
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            table.ajax.reload();
                        }
                    })
                }
            });
        }

</script>
@endpush
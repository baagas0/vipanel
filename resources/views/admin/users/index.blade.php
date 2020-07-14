@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link active"  href="{{ route('admin.users') }}"><i class="icon icon-home2"></i>All Users</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.users.add') }}" ><i class="icon icon-plus-circle"></i> Add User</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.users.import') }}" ><i class="icon icon-document-upload2"></i> Import Users</a>
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
							<th>Balance</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Balance</th>
							<th>Status</th>
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
			url: '{{ route('admin.api.users') }}',
			type:'POST',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
		},
		columns: [
		{ data: 'id', name: 'id' },
		{ data: 'name', name: 'name' },
		{ data: 'username', name: 'username' },
		{ data: 'email', name: 'email' },
		{ data: 'balance', name: 'balance' },
		{ data: 'status', name: 'status' },
		{ mRender: function (data, type, row) {
			return '<a href="{{ route('admin.users.edit') }}/'+row.id+'" class="btn btn-warning btn-xs mr-1"><i class="icon icon-pencil pr-0"></i></a>'+
			'<a href="{{ route('admin.users.detail') }}/'+row.id+'" class="btn btn-info btn-xs mr-1 white-text"><i class="icon icon-eye pr-0"></i></a>'
		}}
		],
	});
</script>
@endpush
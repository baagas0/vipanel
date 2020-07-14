@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link active"  href="{{ route('admin.settings') }}"><i class="icon icon-home2"></i>All Settings</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.settings.add') }}" ><i class="icon icon-plus-circle"></i> Add Settings</a>
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
							<th>Slug</th>
							<th>Name</th>
							<th>Value</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Slug</th>
							<th>Name</th>
							<th>Value</th>
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
			url: '{{ route('admin.api.settings') }}',
			type:'POST',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
		},
		columns: [
		{ data: 'slug', name: 'slug' },
		{ data: 'name', name: 'name' },
		{ data: 'value', name: 'value' },
		{ mRender: function (data, type, row) {
			return '<a href="{{ route('admin.settings.edit') }}/'+row.id+'" class="btn btn-warning btn-xs mr-1"><i class="icon icon-pencil pr-0"></i></a>'
		}}
		],
	});

</script>
@endpush
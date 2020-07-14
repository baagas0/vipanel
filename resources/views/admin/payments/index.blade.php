@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link active"  href="{{ route('admin.payments') }}"><i class="icon icon-home2"></i>All Payments</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.payments.add') }}" ><i class="icon icon-plus-circle"></i> Add Payment</a>
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
							<th>Slug</th>
							<th>Name</th>
							<th>Rate</th>
							<th>Value</th>
							<th>Is Bank</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Slug</th>
							<th>Name</th>
							<th>Rate</th>
							<th>Value</th>
							<th>Is Bank</th>
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
			url: '{{ route('admin.api.payments') }}',
			type:'POST',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
		},
		columns: [
		{ data: 'id', name: 'id' },
		{ data: 'slug', name: 'slug' },
		{ data: 'name', name: 'name' },
		{ data: 'rate', name: 'rate' },
		{ data: 'value', name: 'value' },
		{ data: 'is_bank', name: 'is_bank' },
		{ mRender: function (data, type, row) {
			return '<a href="{{ route('admin.payments.edit') }}/'+row.id+'" class="btn btn-warning btn-xs mr-1"><i class="icon icon-pencil pr-0"></i></a>'+
			'<a href="javascript:void(0)" onclick="deleteRow('+row.id+')" class="btn btn-danger btn-xs mr-1"><i class="icon icon-trash pr-0"></i></a>'
		}}
		],
	});

	function deleteRow(id){
		swal.fire({
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
					url: "{{ route('admin.payments.delete')}}/"+id,
					type: "POST",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					success:function(data){
						table.ajax.reload();
					}
				})
			}
		});
	}
</script>
@endpush
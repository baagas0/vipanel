@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link active"  href="{{ route('admin.pages') }}"><i class="icon icon-home2"></i>All Pages</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.pages.add') }}" ><i class="icon icon-plus-circle"></i> Add Page</a>
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
							<th>Title</th>
							<th>Content</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Content</th>
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
			url: '{{ route('admin.api.pages') }}',
			type:'POST',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
		},
		columns: [
		{ data: 'id', name: 'id' },
		{ data: 'title', name: 'title' },
		{ data: 'content', name: 'content' },
		{ data: 'is_published', name: 'is_published' },
		{ mRender: function (data, type, row) {
			return '<a href="{{ route('admin.pages.edit') }}/'+row.id+'" class="btn btn-warning btn-xs mr-1"><i class="icon icon-pencil pr-0"></i></a>'+
			'<a href="javascript:void(0)" onclick="deleteRow('+row.id+')" class="btn btn-danger btn-xs mr-1"><i class="icon icon-trash pr-0"></i></a>'
		}}
		],
	});

	function deleteRow(id){
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
					url: "{{ route('admin.pages.delete')}}/"+id,
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
@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link"  href="{{ route('admin.deposits') }}"><i class="icon icon-home2"></i>All Deposits</a>
		</li>
		<li>
			<a class="nav-link active"  href="{{ route('admin.deposits.waiting') }}" ><i class="icon icon-timer"></i> Waiting Payment</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.deposits.success') }}" ><i class="icon icon-check"></i> Success Payment</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.deposits.failed') }}" ><i class="icon icon-close"></i> Failed Payment</a>
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
							<th>User</th>
							<th>Date</th>
							<th>Payment</th>
							<th>Amount</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>User</th>
							<th>Date</th>
							<th>Payment</th>
							<th>Amount</th>
							<th>Description</th>
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
			url: '{{ route('admin.api.deposits','waiting') }}',
			type:'POST',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
		},
		columns: [
		{ data: 'id', name: 'id' },
		{ data: 'created_at', name: 'created_at' },
		{ data: 'user.name', name: 'user.name' },
		{ data: 'payment.name', name: 'payment.name' },
		{ data: 'amount', name: 'amount' },
		{ data: 'description', name: 'description', defaultContent: "-"},
		{ mRender: function (data, type, row) {
			return '<a href="javascript:void(0)" onclick="approveRow('+row.id+')" class="btn btn-warning btn-xs mr-1"><i class="icon icon-check pr-0"></i> Accept</a>'
		}}
		],
	});

	function approveRow(id){
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, accept it!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: "{{ route('admin.deposits.approve')}}/"+id,
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
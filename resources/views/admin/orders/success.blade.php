@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link "  href="{{ route('admin.orders') }}"><i class="icon icon-home2"></i>All Orders</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.orders.waiting') }}" ><i class="icon icon-timer"></i> Waiting Orders</a>
		</li>
		<li>
			<a class="nav-link active"  href="{{ route('admin.orders.success') }}" ><i class="icon icon-check"></i> Success Orders</a>
		</li>
		<li>
			<a class="nav-link"  href="{{ route('admin.orders.failed') }}" ><i class="icon icon-close"></i> Failed Orders</a>
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
							<th>API ID</th>
							<th>Target</th>
							<th>QTY</th>
							<th>Status</th>
							<th>Approve At</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>API ID</th>
							<th>Target</th>
							<th>QTY</th>
							<th>Status</th>
							<th>Approved At</th>
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
			url: '{{ route('admin.api.orders', 'success') }}',
			type:'POST',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
		},
		columns: [
		{ data: 'id', name: 'id' },
		{ data: 'api_id', name: 'api_id' },
		{ data: 'target', name: 'target' },
		{ data: 'quantity', name: 'quantity' },
		{ data: 'status', name: 'status' },
		{ data: 'approved_at', name: 'approved_at' },
		],
	});
</script>
@endpush
@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link active"  href="{{ route('admin.news') }}"><i class="icon icon-home2"></i>All Logs</a>
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
							<th>Date</th>
							<th>Page</th>
							<th>Description</th>
							<th>IP</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Date</th>
							<th>Page</th>
							<th>Description</th>
							<th>IP</th>
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
			url: '{{ route('admin.api.logs') }}',
			type:'POST',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
		},
		columns: [
		{ data: 'created_at', name: 'created_at' },
		{ data: 'page', name: 'page' },
		{ data: 'description', name: 'description' },
		{ data: 'ip', name: 'ip' },
		],
	});

</script>
@endpush
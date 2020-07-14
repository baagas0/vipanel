@extends('layouts.app')
@section('content')
<div class="container-fluid my-3">
	<div class="card no-b">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover data-tables">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Min</th>
                            <th>Max</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->category }}</td>
                                <td>{{ $service->name }}</td>
                                <td>Rp{{ number_format($service->price+5000) }}</td>
                                <td>{{ number_format($service->min) }}</td>
                                <td>{{ number_format($service->max) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Min</th>
                            <th>Max</th>
                        </tr>
                    </tfoot>
                </table>
			</div>
		</div>
	</div>
</div>
@endsection
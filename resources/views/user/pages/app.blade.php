@extends('layouts.app')
@section('content')
<div class="container-fluid my-3">
	<div class="card no-b">
		<div class="card-body">
			{!! $data->content !!}
		</div>
	</div>
</div>
@endsection
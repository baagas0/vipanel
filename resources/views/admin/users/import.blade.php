@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link" href="{{ route('admin.users') }}"><i class="icon icon-home2"></i>All
			Users</a>
		</li>
		<li>
			<a class="nav-link" href="{{ route('admin.users.add') }}"><i class="icon icon-plus-circle"></i> Add User</a>
		</li>
		<li>
			<a class="nav-link active" href="{{ route('admin.users.add') }}"><i class="icon icon-document-upload2"></i> Import
			Users</a>
		</li>
	</ul>
</div>
@endsection
@section('content')
<div class="container-fluid my-3">
	<div class="card my-3 shadow no-b r-0">
		<div class="card-header white">
			<h6>{{ $page_title }}</h6>
		</div>
		<div class="card-body">
			<form class="was-validated">
				<div class="custom-file">
					<input type="file" name="file-import" class="custom-file-input" id="validatedCustomFile" required>
					<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
					<div class="invalid-feedback">Example invalid custom file feedback</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
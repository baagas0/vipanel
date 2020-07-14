@extends('layouts.custom')
@section('content')
<div class="page has-sidebar-left">
	<header class="blue accent-3 relative">
		<div class="container-fluid text-white">
			<div class="row p-t-b-10 ">
				<div class="col">
					<div class="pb-3">
						<div class="image mr-3  float-left">
							<img class="user_avatar no-b no-p" src="{{ asset(auth('admin')->user()->photo) }}" alt="User Image">
						</div>
						<div>
							<h6 class="p-t-10">{{ auth('admin')->user()->name }}</h6>
							{{ auth('admin')->user()->email }}
						</div>
					</div>
				</div>
			</div>

			<div class="row justify-content-between">
				<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
					<li>
						<a class="nav-link active" href="{{ route('admin.account') }}"><i class="icon icon-user"></i>Account</a>
					</li>
					<li>
						<a class="nav-link" href="{{ route('admin.account.change.password') }}"><i
								class="icon icon-lock"></i> Change Password</a>
					</li>
					<li>
						<a class="nav-link" href="{{ route('admin.account.logs') }}"><i class="icon icon-clock-o"></i>
							Log Activity</a>
					</li>
				</ul>
			</div>

		</div>
	</header>

	<div class="container-fluid my-3">
		<div class="card mb-3 shadow no-b r-0">
			<div class="card-header white">
				<h6>{{ $page_title }}</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.account.update') }}" method="POST" class="needs-validation"
					enctype="multipart/form-data" novalidate>
					{{ csrf_field() }}
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="username" value="{{ $data->username }}"
								min="5" required disabled>
							<div class="valid-feedback">
								Looks good!
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="photo">Change Photo</label>
							<input type="file" name="photo" id="photo" class="form-control">
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="name">Nama</label>
							<input type="text" name="name" class="form-control" id="name"
								value="{{ (empty($data) ? old('name') : $data->name) }}" min="5" required>
							<div class="valid-feedback">
								Looks good!
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="email">E-Mail</label>
							<input type="email" name="email" class="form-control" id="email"
								value="{{ (empty($data) ? old('email') : $data->email) }}" required>
							<div class="invalid-feedback">
								Format Email Harus Valid
							</div>
						</div>
					</div>
					<button class="btn btn-primary" type="submit"><i class="icon icon-save2"></i> Save</button>
				</form>

				<script>
					(function () {
							'use strict';
							window.addEventListener('load', function () {
								var forms = document.getElementsByClassName('needs-validation');
								var validation = Array.prototype.filter.call(forms, function (form) {
									form.addEventListener('submit', function (event) {
										if (form.checkValidity() === false) {
											event.preventDefault();
											event.stopPropagation();
										}
										form.classList.add('was-validated');
									}, false);
								});
							}, false);
						})();
				</script>
			</div>
		</div>
	</div>
</div>
@endsection
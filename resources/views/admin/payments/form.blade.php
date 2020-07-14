@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link" href="{{ route('admin.payments') }}"><i class="icon icon-home2"></i>All
			Payments</a>
		</li>
		<li>
			<a class="nav-link active" href="{{ route('admin.payments.add') }}"><i class="icon icon-plus-circle"></i> {{ $page_title }}</a>
		</li>
	</ul>
</div>
@endsection
@section('content')
<div class="container-fluid my-3">
	<div class="card mb-3 shadow no-b r-0">
		<div class="card-header white">
			<h6>{{ $page_title }}</h6>
		</div>
		<div class="card-body">
			<form action="" method="POST" class="needs-validation" novalidate>
				{{ csrf_field() }}
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="slug">Slug</label>
						<input type="text" name="slug" class="form-control" id="slug" value="{{ (empty($data) ? old('slug') : $data->slug) }}" min="5" required>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="name">Name</label>
						<input type="name" name="name" class="form-control" id="name" value="{{ (empty($data) ? old('name') : $data->name) }}" required>
						<div class="invalid-feedback">
							Format Title Harus Valid
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="rate">Rate</label>
						<input type="number" name="rate" class="form-control" id="rate" value="{{ (empty($data) ? old('rate') : $data->rate) }}" required >
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<label for="value">Value</label>
						<input type="text" name="value" class="form-control" id="value" value="{{ (empty($data) ? old('value') : $data->value) }}" required>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<label>Is Bank</label>
						<div class="form-control">
						<div class="material-switch">
                                <input id="is_bank" name="is_bank" type="checkbox" {{ (empty($data) ? '' : ($data->is_bank == 1 ? 'checked' : '')) }}/>
                                <label for="is_bank" class="bg-primary"></label>
                            </div>
                        </div>
						<div class="valid-feedback">
							Looks Good
						</div>
					</div>
				</div>
				<button class="btn btn-primary" type="submit"><i class="icon icon-save2"></i> Save</button>
			</form>

			<script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function () {
					'use strict';
					window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
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
@endsection
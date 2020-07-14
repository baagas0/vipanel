@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
	<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
		<li>
			<a class="nav-link"  href="{{ route('admin.vouchers') }}"><i class="icon icon-home2"></i>All Vouchers</a>
		</li>
		<li>
			<a class="nav-link active"  href="{{ route('admin.vouchers.add') }}" ><i class="icon icon-plus-circle"></i> Add Voucher</a>
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
						<label for="type">Type</label>
						<select name="type" id="type" class="custom-select" onchange="check()" required>
							<option value="">== Type Coupon ==</option>
							<option value="percent" {{ empty($data) ? (old('type') == 'percent' ? 'selected' : '') : ($data->type == 'Percent' ? 'selected' : '') }}>Percent</option>
							<option value="amount" {{ empty($data) ? (old('type') == 'amount' ? 'selected' : '') : ($data->type == 'Amount' ? 'selected' : '') }}>Amount</option>
						</select>
						<div class="invalid-feedback">Required</div>
					</div>
					<div class="col-md-6 mb-3">
						<label for="code">Code</label>
						<input type="text" name="code" class="form-control" id="code" value="{{ (empty($data) ? old('code') : $data->code) }}" min="5" required>
						<div class="invalid-feedback">
							Format Harus Benar
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="min_amount">Min. Amount</label>
						<input type="number" name="min_amount" class="form-control" id="min_amount" value="{{ (empty($data) ? old('min_amount') : $data->min_amount) }}">
						<div class="invalid-feedback">
							Format Harus Benar
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<label for="percent">Percent</label>
						<input type="number" name="percent" class="form-control" id="percent" value="{{ (empty($data) ? old('percent') : $data->percent) }}" max="100">
						<div class="invalid-feedback">
							Format Harus Benar
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<label for="max_discount">Max. Discount</label>
						<input type="number" name="max_discount" class="form-control" id="max_discount" value="{{ (empty($data) ? old('max_discount') : $data->max_discount) }}">
						<div class="invalid-feedback">
							Format Harus Benar
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="amount">Amount</label>
						<input type="number" name="amount" class="form-control" id="amount" value="{{ (empty($data) ? old('amount') : $data->amount) }}">
						<div class="invalid-feedback">
							Format Harus Benar
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<label for="quota">Quota</label>
						<input type="number" name="quota" class="form-control" id="quota" value="{{ (empty($data) ? old('quota') : $data->quota) }}" required>
						<div class="invalid-feedback">
							Format Harus Benar
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<label for="expired_at">Expired at</label>
						<input type="text" name="expired_at" id="expired_at" value="{{ (empty($data) ? old('expired_at') : $data->expired_at) }}" class="date-time-picker form-control" data-options='{"format":"Y-m-d H:i"}' required autocomplete="off" />
						<div class="invalid-feedback">
							Format Harus Benar
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
@push('bottom')
<script>
	$(function(){check()});

	$('.date-time-picker').datetimepicker({
		format: 'Y-m-d H:m',
		minDate: '{{ now()->format("Y-m-d H:i") }}'
	});

	function check(){
		if ($('#type').val() == 'percent') {
			$('#amount').prop('disabled',true);
			$('#percent').prop('disabled',false);
			$('#max_discount').prop('disabled',false);
		}else if ($('#type').val() == 'amount') {
			$('#amount').prop('disabled',false);
			$('#percent').prop('disabled',true);
			$('#max_discount').prop('disabled',true);
		}
	}
</script>
@endpush
@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
    <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
        <li>
            <a class="nav-link active" href="{{ route('deposit') }}"><i class="icon icon-plus"></i>Deposit</a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('deposit.history') }}"><i class="icon icon-home"></i>Deposits History</a>
        </li>
    </ul>
</div>
@endsection
@section('content')
<div class="container-fluid my-3">
    @if(session()->get('message_type') == 'success')
    <div role="alert" class="alert alert-success">
        <h4>Permintaan deposit Anda telah masuk ke sistem, berikut data permintaan deposit Anda:</h4>
        <ul>
            <li>ID Deposit: {{ session()->get('id') }}</li>
            <li>Metode Deposit: {{ session()->get('payment')->name }}</li>
            <li>Jumlah Deposit: Rp{{ session()->get('amount') }}</li>
            <li>Jumlah Saldo Diterima: Rp{{ session()->get('amount_received') }}</li>
        </ul>
        <p class="h4">Silahkan Transfer Ke {{ session()->get('payment')->name }} {{ session()->get('payment')->value }} dengan Nominal Rp{{ session()->get('amount') }}</p>
    </div>
    @endif
    <div role="alert" class="alert alert-warning"><strong>Penting!</strong> Halo {{ auth()->user()->name }}, sebelum membuat permintaan deposit disarankan untuk membaca Informasi terlebih dahulu, jika Anda masuk menggunakan PC maka Informasi terletak disebelah kanan form pesanan, jika Anda masuk menggunakan smartphone / mobile phone maka Informasi terletak dibagian bawah form pesanan.
    Terimakasih.</div>
    <div class="d-flex row">
        <div class="col-md-7">
            <div class="card no-b">
                <div class="card-body">
                    <form action="{{ route('deposit.add') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="payment_id">Metode Deposit</label>
                            <select class="form-control" name="payment_id" id="payment_id" required>
                                <option value="">== PILIH ==</option>
                                @foreach($payments as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Silahkan Pilih Salah Satu Metode Deposit!</div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="amount">Jumlah Deposit</label>
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="Min. Rp10.000" min="10000" required>
                                <div class="invalid-feedback">
                                    Silahkan Isi Jumlah Deposit Terlebih Dahulu, Minimal Rp10.000
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="amount_received">Jumlah Saldo Diterima</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="amount_received_pretend">Rp</span>
                                    </div>
                                    <input type="text" name="amount_received" class="form-control" id="amount_received" placeholder="" aria-describedby="amount_received_pretend" disabled>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>

                    <script>
                        (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                var forms = document.getElementsByClassName('needs-validation');
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
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
        <div class="col-md-5">
            <div class="card no-b p-3">
                {!! setting('deposit') !!}
            </div>
        </div>
    </div>
</div>
@endsection
@push('bottom')
<script type="text/javascript">
    $('#amount').on('keyup', function() {
        var payment_id = $('#payment_id').val();
        amount = this.value;
        $.ajax({
            type: "POST",
            data: {payment_id: payment_id, amount: amount},
            url: "{{ route('deposit.amount.received') }}",
            dataType: "json",
            success: function(data) {
                $('#amount_received').val(data);
            }
        });
    });
</script>
@endpush
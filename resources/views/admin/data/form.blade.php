@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
    <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
        <li>
            <a class="nav-link" href="{{ route('admin.data') }}"><i class="icon icon-home2"></i>All
                Users</a>
        </li>
        <li>
            <a class="nav-link active" href="{{ route('admin.data.add') }}"><i
                    class="icon icon-plus-circle"></i> {{ $page_title }}</a>
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
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ (empty($data) ? old('name') : $data->name) }}"
                            min="5" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" name="username" class="form-control" id="username"
                                value="{{ (empty($data) ? old('username') : $data->username) }}"
                                aria-describedby="inputGroupPrepend" min="5" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ (empty($data) ? old('email') : $data->email) }}"
                            required>
                        <div class="invalid-feedback">
                            Format Email Harus Valid
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" min="8" {{ empty($data) ? 'required' : ''}}>
                        <div class="valid-feedback">
                            Looks good!
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
@endsection

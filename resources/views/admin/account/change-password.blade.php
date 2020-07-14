@extends('layouts.custom')
@section('content')
<div class="page has-sidebar-left">
    <div>
        <header class="blue accent-3 relative">
            <div class="container-fluid text-white">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <div class="pb-3">
                            <div class="image mr-3  float-left">
                                <img class="user_avatar no-b no-p" src="{{ asset(auth('admin')->user()->photo) }}"
                                    alt="User Image">
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
                            <a class="nav-link" href="{{ route('admin.account') }}"><i
                                    class="icon icon-user"></i>Account</a>
                        </li>
                        <li>
                            <a class="nav-link active" href="{{ route('admin.account.change.password') }}"><i
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
                    <form action="{{ route('admin.account.change.password')}}" method="POST" class="needs-validation"
                        novalidate>
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" class="form-control"
                                    id="current_password" min="8" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="new_password">New Password</label>
                                <input type="password" name="new_password" class="form-control" id="new_password"
                                    min="8" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="new_confirm_password">Confirm Password</label>
                                <input type="password" name="new_confirm_password" class="form-control"
                                    id="new_confirm_password" min="8" required>
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
    </div>

</div>
</div>
@endsection

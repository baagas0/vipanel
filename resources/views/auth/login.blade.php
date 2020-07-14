@extends('layouts.auth')
@section('content')
<div class="page parallel">
    <div class="d-flex row">
        <div class="col-md-4 white">
            <div class="p-5 mt-2">
                <img src="{{ asset('img/basic/logo.png') }}" alt="Logo"/>
            </div>
            <div class="p-5">
                <h3>{{ __('Login') }}</h3>
                <p>Silahkan Login Untuk Memulai Session.</p>
                <form action="{{ route($action) }}" method="POST">
                    @csrf
                    <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                        <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group has-icon"><i class="icon-user-secret"></i>
                        <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" value="{{ old('password') }}" required autocomplete="currentpassword">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label" for="remember">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Login') }}
                    </button>
                    <p class="forget-pass mt-3">Lupa Password? <a href="{{ route($password_route) }}">Klik Disini</a></p>
                </form>
            </div>
        </div>
        <div class="col-md-8  height-full blue accent-3 align-self-center text-center" data-bg-repeat="false"
        data-bg-possition="center"
        style="background: url('{{ asset('img/icon/icon-plane.png') }}') #FFEFE4">
    </div>
</div>
</div>
@endsection
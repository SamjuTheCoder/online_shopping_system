@extends('layouts.appLogin')

@section('content')

<!--banner-->

<div class="login">
	
    <div class="main-agileits">
            <div class="form-w3agile">
                <center><h4>{{ __('Account Login') }}</h4></center>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="name">{{ __('Email:') }}<span style="color:red">*</span></label>
                    <div class="key">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input  type="text" name="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="clearfix"></div>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <label for="name">{{ __('Password:') }}<span style="color:red">*</span></label>
                    <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input  type="password" name="password"  required="" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <div class="clearfix"></div>
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <input type="submit" value="Login">
                </form>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                         {{ __('Remember Me') }}
                    </label>
            </div>
            <div class="forg">
                
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                
                @if (Route::has('register'))
                    
                    <a class="forg-right" href="{{ route('register') }}">{{ __('Register') }}</a>
                    
                @endif
            <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

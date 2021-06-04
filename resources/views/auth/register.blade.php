@extends('layouts.appLogin')

@section('content')

<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<center><h4>Create Account <i style="font-size:12px;">Items mark <span style="color:red">*</span> are important</i></h4></center>
                    <br>
					<form method="POST" action="{{ route('register') }}">
                        @csrf

                        <label for="name">{{ __('Fullname:') }}<span style="color:red">*</span></label>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" placeholder="Fullname" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>

							<div class="clearfix"></div>
                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
                        <label for="name">{{ __('Email:') }}<span style="color:red">*</span></label>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
							<div class="clearfix"></div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
                        <label for="name">{{ __('Phone:') }}<span style="color:red">*</span></label>
                        <div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input id="phone" placeholder="Phone" type="text" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            <div class="clearfix"></div>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
                     
                        <label for="name">{{ __('Delivery Address:') }} <span style="color:red">*</span></label>
                        <div class="key">
							<i class="fa fa-home" aria-hidden="true"></i>
							<input id="address" placeholder="Address" type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                            <div class="clearfix"></div>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
						</div>
<!--    
                        <label for="name">{{ __('Country:') }}</label>
						<div class="key">
							<i class="fa fa-home" aria-hidden="true"></i>
							<input id="country" placeholder="Country" type="text" class="@error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" autocomplete="country">
                            <div class="clearfix"></div>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>

                        <label for="name">{{ __('City:') }}</label>
                        <div class="key">
							<i class="fa fa-home" aria-hidden="true"></i>
							<input id="city" placeholder="City" type="text" class="@error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city">
                            <div class="clearfix"></div>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
						</div> -->
                        <label for="name">{{ __('Password:') }}<span style="color:red">*</span></label>
                        <div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input id="password" placeholder="Password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <div class="clearfix"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>

                        <label for="name">{{ __('Confirm password:') }}<span style="color:red">*</span></label>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input id="password-confirm" placeholder="Confirm Password" type="password"  name="password_confirmation" required autocomplete="new-password">
                        	<div class="clearfix"></div>
						</div>
						<input type="submit" value="Submit">
					</form>
				</div>
				
			</div>
		</div>
@endsection

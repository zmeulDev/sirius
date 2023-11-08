
@extends('layouts.fullwidth')

@section('content')
<div class="col-xl-12">
	<div class="card">
		<div class="card-body p-0">
			<div class="row m-0">
				<div class="col-xl-6 col-md-6 sign text-center">
					<div>
						<div class="text-center my-5">
							<img src="{{ asset('images/sirius-text.png')}}" alt="">
						</div>
                        @if(Route::has('password.request'))
                        <div class="row d-flex justify-content-between mt-4 mb-2">
                            <div class="mb-3">
                                <a href="{{ route('register') }}">Register</a> | | <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            
                        </div>
                        
                        @endif
					</div>
				</div>
				<div class="col-xl-6 col-md-6">
					<div class="sign-in-your py-4 px-2">
						<h4 class="fs-20">Sign in</h4>
						
						<p></p>
						
                        @if(session()->has('message'))
                            <p class="alert alert-info">
                                {{ session()->get('message') }}
                            </p>
                        @endif

                        <form method="POST" action="{{ route('password.request') }}">
                @csrf

                <input name="token" value="{{ $token }}" type="hidden">

                <div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}">

                        @if($errors->has('email'))
                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <span class="text-danger">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-flat btn-block">
                            {{ trans('global.reset_password') }}
                        </button>
                    </div>
                </div>
            </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
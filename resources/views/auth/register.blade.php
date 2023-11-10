
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
                                <a href="{{ route('login') }}">I have account</a> | | <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            
                        </div>
                        
                        @endif
					</div>
				</div>
				<div class="col-xl-6 col-md-6">
					<div class="sign-in-your py-4 px-2">
						<h4 class="fs-20">Register</h4>
						
						<p></p>
						
                        @if(session()->has('message'))
                            <p class="alert alert-info">
                                {{ session()->get('message') }}
                            </p>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.register') }}
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
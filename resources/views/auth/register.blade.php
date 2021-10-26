@extends('layouts.guest')

@section('content')
	<div id="register">
		<div class="container">
			<div id="register-row" class="row justify-content-center align-items-center">
				<div id="register-column" class="col-md-6">
					<div id="register-box" class="col-md-12">
						<form action="{{ route('register') }}" id="register-form" class="form" method="post">
							@csrf
							<h3 class="text-center text-info">Sign up</h3>

							<div class="form-group">
								<label for="name" class="text-info">Name:</label><br>
								<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
								@error('name')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
								@enderror
							</div>

							<div class="form-group">
								<label for="email" class="text-info">Email:</label><br>
								<input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
								@error('email')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
								@enderror
							</div>
							<div class="form-group">
								<label for="password" class="text-info">Password:</label><br>
								<input type="password" name="password" id="password" class="form-control">
								@error('password')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
								@enderror
							</div>
							<div class="form-group">
								<label for="password_confirmation" class="text-info">Confirm Password:</label><br>
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
								@error('password_confirmation')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
								@enderror
							</div>
							<div class="form-group text-center">
								<input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
							</div>
							@if (Route::has('login'))
								<div id="register-link" class="text-right">
									<a href="{{ route('login') }}" class="text-info">Already registered? Login here</a>
								</div>
							@endif
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
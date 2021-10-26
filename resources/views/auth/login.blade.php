@extends('layouts.guest')

@section('content')
	<div id="login">
		<div class="container">
			<div id="login-row" class="row justify-content-center align-items-center">
				<div id="login-column" class="col-md-6">
					<div id="login-box" class="col-md-12">
						<form action="{{ route('login') }}" id="login-form" class="form" method="post">
							@csrf
							<h3 class="text-center text-info">Login</h3>

							<div class="form-group">
								<label for="email" class="text-info">Email:</label><br>
								<input type="text" name="email" id="email" class="form-control">
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
							<div class="form-group text-center">
								<input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
							</div>
							@if (Route::has('register'))
								<div id="register-link" class="form-group text-right">
									<a href="{{ route('register') }}" class="text-info">Register here</a>
								</div>
							@endif
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
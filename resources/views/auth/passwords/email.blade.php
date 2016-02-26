@extends('auth.passwords.master')
@section('title', 'Forgot password')

@section('content')
	<div class="ibox-content">

		<h2 class="font-bold">Forgot password</h2>

		<p>
			Enter your email address and reset link will be send to your email address.
		</p>

		<div class="row">

			<div class="col-lg-12">

				{!! Form::open(['url' => 'password/email', 'method' => 'post', 'class' => 'm-t']) !!}

				{{-- email field --}}
				<div class="form-group">
					{!! Form::email('email', null, [
						'class' => 'form-control',
						'placeholder' => 'email address',
						'required' => ''
					]) !!}
				</div>

				{{-- submit field --}}
				<div class="form-group">
					{!! Form::submit('Reset password', [
						'class' => 'btn btn-primary block full-width m-b'
					]) !!}
				</div>

				<p class="text-muted text-center">
					<small>Remembered password?</small>
				</p>
				<a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">Login</a>

				{!! Form::close() !!}

			</div>
		</div>
	</div>

@endsection
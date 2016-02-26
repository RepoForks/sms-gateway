@extends('auth.passwords.master')
@section('title', 'Password reset')

@section('content')
	<div class="ibox-content">

		<h2 class="font-bold">Password reset</h2>

		<p>
			This set new password for <strong>{{ $email }}</strong>.
		</p>

		<div class="row">

			<div class="col-lg-12">

				{!! Form::open(['url' => 'password/reset', 'method' => 'post']) !!}

				{!! Form::hidden('token', $token) !!}

				{!! Form::hidden('email', $email) !!}

				{{-- password field --}}
				<div class="form-group">
					{!! Form::password('password', [
						'class' => 'form-control',
						'placeholder' => 'password'
					]) !!}
				</div>

				{{-- password confirmation field --}}
				<div class="form-group">
					{!! Form::password('password_confirmation', [
						'class' => 'form-control',
						'placeholder' => 'password confirmation'
					]) !!}
				</div>

				{{--  submit field--}}
				<div class="form-group">
					{!! Form::submit('Change password', [
						'class' => 'btn btn-primary block full-width m-b'
					]) !!}
				</div>
				{!! Form::close() !!}

			</div>
		</div>
	</div>
@endsection

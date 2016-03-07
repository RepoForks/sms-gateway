@section('title', 'Register')

@extends('auth.master')

@section('content')
	<div class="row">

		@include('admin.error')

		<div class="col-md-6">
			<h2 class="font-bold">Welcome to SMSgw</h2>

			<p>Create an account and start using SMSgw immediately.</p>

		</div>
		<div class="col-md-6">
			<div class="ibox-content">

				{!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'm-t', 'id' => 'register-form']) !!}

				{{--  first name field --}}
				<div class="form-group">
					{!! Form::text('first_name', null, [
						'class' => 'form-control',
						'placeholder' =>' First name',
						'required' => 'true'
					]) !!}
				</div>

				{{-- last name field --}}
				<div class="form-group">
					{!! Form::text('last_name', null, [
						'class' => 'form-control',
						'placeholder' => 'Last name',
						'required' => 'true'
					]) !!}
				</div>

				{{-- email field --}}
				<div class="form-group">
					{!! Form::email('email', null, [
						'class' => 'form-control',
						'placeholder' => 'Email',
						'required' => 'true'
					]) !!}
				</div>


				{{-- password field --}}
				<div class="form-group">
					{!! Form::password('password', [
						'class' => 'form-control',
						'placeholder' => 'Password',
						'required' => 'true'
					]) !!}
				</div>

				{{-- password confimration field --}}
				<div class="form-group">
					{!! Form::password('password_confirmation', [
						'class' => 'form-control',
						'placeholder' => 'Password again',
						'required' => 'true'
					]) !!}
				</div>

				{{-- submit field --}}
				<div class="form-group">
					{!! Form::submit('Register', [
						'class' => 'btn btn-primary block full-width m-b'
					]) !!}
				</div>

				<a href="{{ route('reset.page') }}">
					<small>Forgot password?</small>
				</a>

				<p class="text-muted text-center">
					<small>Already have an account?</small>
				</p>
				<a class="btn btn-sm btn-white btn-block" href="{{ route('login.page') }}">Login</a>

				{!! Form::close() !!}

			</div>
		</div>
	</div>
@endsection

@section('scripts')
	@parent

	<script type="text/javascript">

		$('#register-form').validate({
			rules: {
				first_name: {
					required : true,
					minlength: 4
				},
				last_name: {
					required : true,
					minlength: 4
				},
				email: {
					email   : true,
					required: true
				},
				password: {
					password : true,
					minlength: 6,
					required : true
				},
				password_confirmation: {
					required: true,
					equalTo : '#password'
				}
			}

		})
		;

	</script>

@endsection
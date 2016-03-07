@extends('admin.master')
@section('title', 'Profile')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Personal details</h5>
				</div>
				<div class="ibox-content">

					{!! Form::open(['route' => 'user.edit', 'method' => 'post', 'class' => 'form-horizontal']) !!}


					{{-- First_name Field --}}
					<div class="form-group">
					    {!! Form::label('first_name', 'First name:', ['class' => 'col-sm-2 control-label']) !!}
					    <div class="col-sm-4">
						    {!! Form::text('first_name', $user->first_name, [
						        'class' => 'form-control'
						    ]) !!}
					    </div>
					</div>

					{{-- Last_name Field --}}
					<div class="form-group">
					    {!! Form::label('last_name', 'Last name:', ['class' => 'col-sm-2 control-label']) !!}
					    <div class="col-sm-4">
						    {!! Form::text('last_name', $user->last_name, [
						        'class' => 'form-control'
						    ]) !!}
					    </div>
					</div>

					{{-- Update details Submit --}}
					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
						    {!! Form::submit('update details', [
						        'class' => 'btn btn-primary'
						    ]) !!}
					    </div>
					</div>

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Change email</h5>
				</div>
				<div class="ibox-content">

					{!! Form::open(['route' => 'user.edit.email', 'method' => 'post', 'class' => 'form-horizontal']) !!}


					{{-- Email Field --}}
					<div class="form-group">
					    {!! Form::label('email', 'Email:', ['class' => 'col-sm-2 control-label']) !!}
					    <div class="col-sm-4">
						    {!! Form::email('email', $user->email, [
						        'class' => 'form-control'
						    ]) !!}
					    </div>
					</div>


					{{--  Submit --}}
					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit('change email', [
						        'class' => 'btn btn-primary'
					    ]) !!}
					    </div>
					</div>

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Password change</h5>
				</div>
				<div class="ibox-content">

					{!! Form::open(['route' => 'user.password.change', 'method' => 'post', 'class' => 'form-horizontal']) !!}

					{{-- Password Field --}}
					<div class="form-group">
					    {!! Form::label('password', 'Password:', ['class' => 'col-sm-2 control-label']) !!}
					    <div class="col-sm-4">
						    {!! Form::password('password', [
						        'class' => 'form-control',
						        'placeholder' => 'enter new password'
						    ]) !!}
					    </div>
					</div>

					{{-- Password_confirmation Field --}}
					<div class="form-group">
					    {!! Form::label('password_confirmation', 'Password confirmation:', ['class' => 'col-sm-2 control-label']) !!}
					    <div class="col-sm-4">
						    {!! Form::password('password_confirmation', [
						        'class' => 'form-control',
						        'placeholder' => 'enter new password again'
						    ]) !!}
					    </div>
					</div>

					{{-- Change password Submit --}}
					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
						    {!! Form::submit('change password', [
						        'class' => 'btn btn-primary'
						    ]) !!}
					    </div>
					</div>

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

@endsection
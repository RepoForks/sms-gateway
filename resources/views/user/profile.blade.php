@extends('admin.master')
@section('title', 'Profile')

@section('content')

	<div class="row">

		<!-- TODO add this to modal -->
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Password change</h5>
				</div>
				<div class="ibox-content">

					{!! Form::open(['route' => 'user.password.change', 'method' => 'post']) !!}

					{{-- Password Field --}}
					<div class="form-group">
					    {!! Form::password('password', [
					        'class' => 'form-control',
					        'placeholder' => 'new password'
					    ]) !!}
					</div>

					{{-- Password_confirmation Field --}}
					<div class="form-group">
					    {!! Form::password('password_confirmation', [
					        'class' => 'form-control',
					        'placeholder' => 'password confirmation'
					    ]) !!}
					</div>

					{{-- Change password Submit --}}
					<div class="form-group">
					    {!! Form::submit('change password', [
					        'class' => 'btn btn-primary btn-block'
					    ]) !!}
					</div>

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

@endsection
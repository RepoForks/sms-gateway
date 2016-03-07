@extends('admin.master')
@section('title', 'Profile for user ' . $user->fullName())

@section('action-area')
	<a href="{{ route('user.index') }}" class="btn btn-primary btn-xs">back</a>
@endsection

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>User details</h5>
				</div>
				<div class="ibox-content">

					{!! Form::open(['url' => '', 'method' => 'post', 'class' => 'form-horizontal']) !!}


					{{-- Id Field --}}
					<div class="form-group">
					    {!! Form::label('id', '#ID:', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						    {!! Form::number('id', $user->id, [
						        'class' => 'form-control'
						    ]) !!}
						</div>
					</div>

					{{-- First_name Field --}}
					<div class="form-group">
					    {!! Form::label('first_name', 'First name:', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						    {!! Form::text('first_name', $user->first_name, [
						        'class' => 'form-control'
						    ]) !!}
						</div>
					</div>

					{{-- Last_name Field --}}
					<div class="form-group">
					    {!! Form::label('last_name', 'Last name:', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						    {!! Form::text('last_name', $user->last_name, [
						        'class' => 'form-control'
						    ]) !!}
						</div>
					</div>

					{{-- Email Field --}}
					<div class="form-group">
					    {!! Form::label('email', 'Email:', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						    {!! Form::email('email', $user->email, [
						        'class' => 'form-control'
						    ]) !!}
						</div>
					</div>


					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

@endsection
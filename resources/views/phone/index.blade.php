@extends('admin.master')
@section('title', 'Phone numbers')

@section('action-area')
	@parent

	<div class="title-action">
		<a href=" {{ route('phone.list.index') }}" class="btn btn-primary">manage lists</a>
	</div>

@endsection

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Add phone number</h5>
				</div>
				<div class="ibox-content">
					{!! Form::open(['route' => 'phone.create', 'method' => 'post']) !!}

					{{-- Number Field --}}
					<div class="form-group">
						{!! Form::label('number', 'Number:') !!}
						{!! Form::text('number', null, [
							'class' => 'form-control'
						]) !!}
					</div>

					{{-- User_first_nem Field --}}
					<div class="form-group">
						{!! Form::label('user_first_name', 'User first name:') !!}
						{!! Form::text('user_first_name', null, [
							'class' => 'form-control'
						]) !!}
					</div>

					{{-- User_last_name Field --}}
					<div class="form-group">
						{!! Form::label('user_last_name', 'User last name:') !!}
						{!! Form::text('user_last_name', null, [
							'class' => 'form-control'
						]) !!}
					</div>

					{{-- Add record Submit --}}
					<div class="form-group">
						{!! Form::submit('add record', [
							'class' => 'btn btn-primary'
						]) !!}
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
					<h5>Phone number list</h5>
				</div>
				<div class="ibox-content">

					@if(count($phones) == 0)
						<p>You have no phone numbers created yet.</p>
					@else


					@endif

				</div>
			</div>
		</div>
	</div>

@endsection
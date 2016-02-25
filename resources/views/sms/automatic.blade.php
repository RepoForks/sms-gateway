@extends('admin.master')
@section('title', 'Automatic sending')

@section('links')
	@parent
	<link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('css/plugins/clockpicker/clockpicker.css') }}" rel="stylesheet">
@endsection

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Create new job</h5>
				</div>
				<div class="ibox-content">
					{!! Form::open(['route' => 'sms.automatic.create', 'method' => 'post']) !!}

						{{-- Prepared SMS Field --}}
						<div class="form-group">
						    {!! Form::label('prepared', 'SMS Template:') !!}
							<select name="prepared" id="prepared" class="form-control">
								@foreach($preparedsms as $sms)

									<option value="{{ $sms->id }}"> {{ $sms->description }}</option>

								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for=""></label>
						</div>

						{{-- Create job Submit --}}
						<div class="form-group">
						    {!! Form::submit('Create job', [
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
					<h5>Active jobs</h5>
				</div>
				<div class="ibox-content">

				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
	@parent
	{{--Data picker--}}
	<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
	{{--Clock picker--}}
	<script src="{{ asset('js/plugins/clockpicker/clockpicker.js') }}"></script>
@endsection
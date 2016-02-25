@extends('admin.master')
@section('title', 'Prepared SMS')


@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Create prepared SMS</h5>
				</div>
				<div class="ibox-content">
					
					{!! Form::open(['route' => 'sms.prepared.create', 'method' => 'post']) !!}

					{{-- Description Field --}}
					<div class="form-group">
					    {!! Form::label('Description', 'Description:') !!}
					    {!! Form::text('description', null, [
					        'class' => 'form-control',
					        'placeholder' => 'Enter some info about this SMS message'
					    ]) !!}
					</div>

					{{-- SMS content Field --}}
					<div class="form-group">
					    {!! Form::label('SMS content', 'SMS content:') !!}
					    {!! Form::textarea('content', null, [
					        'class' => 'form-control',
					        'placeholder' => 'Add here SMS text...',
					        'maxlength' => 160
					    ]) !!}
					</div>

					<small>please use <a href="">SMSgw markdown</a> system</small>

					{{-- Create prepared SMS Submit --}}
					<div class="form-group">
					    {!! Form::submit('Create prepared SMS', [
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
					<h5>Prepared SMS list</h5>
				</div>
				<div class="ibox-content">
					@if(count($preparedsms) == 0)
						You haven't any sms created.
					@else

						<table class="table table-striped">
							<thead>
							<tr>
								<th>SMS ID</th>
								<th>Description</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($preparedsms as $sms)
								<tr>
									<td>{{ $sms->sms_id }}</td>
									<td>{{ $sms->description }}</td>
									<td>{{ $sms->created_at }}</td>
									<td>
										<a href="{{ $sms->getEditUrl() }}"><i class="fa fa-edit"></i></a>
										<a href="{{ $sms->getDeleteUrl() }}"><i class="fa fa-close"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>

					@endif
				</div>
			</div>
		</div>
	</div>

@endsection
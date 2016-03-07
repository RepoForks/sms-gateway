@extends('admin.master')
@section('title', 'SMS templates')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Create SMS template</h5>
				</div>
				<div class="ibox-content">
					
					{!! Form::open(['route' => 'sms.template.create', 'method' => 'post', 'class' => 'form-horizontal']) !!}

					{{-- description field --}}
					<div class="form-group">
					    {!! Form::label('Description', 'Description:', ['class' => 'col-sm-2 control-label']) !!}
					    <div class="col-sm-10">
						    {!! Form::text('description', null, [
						        'class' => 'form-control'
						    ]) !!}
					    </div>
					</div>

					{{-- sms content field --}}
					<div class="form-group">
					    {!! Form::label('SMS content', 'SMS content:', ['class' => 'col-sm-2 control-label']) !!}
					    <div class="col-sm-10">
						    {!! Form::textarea('content', null, [
						        'class' => 'form-control',
						        'maxlength' => 160
						    ]) !!}
						    <small>please use <a href="https://github.com/ptrstovka/sms-gateway/wiki" target="_blank">SMSgw markdown</a> system</small>
					    </div>
					</div>


					{{-- submit field --}}
					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
						    {!! Form::submit('Create prepared SMS', [
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
					<h5>Templates</h5>
				</div>
				<div class="ibox-content">
					@if(count($templates) == 0)
						You haven't any sms created.
					@else

						<table class="table table-striped">
							<thead>
							<tr>
								<th>Template #ID</th>
								<th>Description</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($templates as $sms)
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
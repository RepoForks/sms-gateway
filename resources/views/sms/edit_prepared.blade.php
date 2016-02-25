@extends('admin.master')
@section('title', 'Edit prepared SMS template')

@section('action-area')
	@parent
	<div class="title-action">
		<a class="btn btn-primary" href="{{ route('sms.prepared') }}">back</a>
	</div>
@endsection

@section('content')

			<div class="row">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>Edit basic details</h5>
						</div>
						<div class="ibox-content">
							{!! Form::open(['route' => ['sms.prepared.update', $sms->id], 'method' => 'post']) !!}

							{{-- Description Field --}}
							<div class="form-group">
								{!! Form::label('Description', 'Description:') !!}
								{!! Form::text('description', $sms->description, [
									'class' => 'form-control'
								]) !!}
							</div>

							{{-- Content Field --}}
							<div class="form-group">
							    {!! Form::label('Content', 'Content:') !!}
							    {!! Form::textarea('content', $sms->text, [
							        'class' => 'form-control'
							    ]) !!}
							</div>

							{{-- Update Submit --}}
							<div class="form-group">
							    {!! Form::submit('Update', [
							        'class' => 'btn btn-primary btn-block'
							    ]) !!}
							</div>

							{!! Form::close() !!}

						</div>
					</div>
				</div>
			</div>
@endsection
@extends('apis.master')

@section('configuration')

	{!! Form::open(['route' => 'verification.update', 'method' => 'post', 'class' => 'form-horizontal']) !!}

		 {{--Expiration Field--}}
		<div class="form-group">
		    {!! Form::label('expiration', 'Expiration:', ['class' => 'col-sm-2 control-label']) !!}
		    <div class="col-sm-10">
			    {!! Form::number('expiration',  $api->configuration == null ? null : $api->configuration->expiration , [
			        'class' => 'form-control'
			    ]) !!}
		    </div>
		</div>

		 {{--Allowed characters Field--}}
		<div class="form-group">
		    {!! Form::label('allowed_characters', 'Allowed characters:', ['class' => 'col-sm-2 control-label']) !!}
		    <div class="col-sm-10">
			    {!! Form::text('allowed_characters', $api->configuration == null ? null :$api->configuration->allowed_characters, [
			        'class' => 'form-control'
			    ]) !!}
		    </div>
		</div>

		  {{--Field--}}
		<div class="form-group">
		    {!! Form::label('token_length', 'Token length:', ['class' => 'col-sm-2 control-label']) !!}
		    <div class="col-sm-10">
			    {!! Form::number('token_length', $api->configuration == null ? null : $api->configuration->token_length, [
			        'class' => 'form-control'
			    ]) !!}
		    </div>
		</div>

		 {{--Message content Field--}}
		<div class="form-group">
		    {!! Form::label('message_content', 'Message content:', ['class' => 'col-sm-2 control-label']) !!}
		    <div class="col-sm-10">
			    {!! Form::textarea('message_content', $api->configuration == null ? null : $api->configuration->message_content, [
			        'class' => 'form-control'
			    ]) !!}
			    <small>Use SMSgw markdown syntax.</small>
		    </div>
		</div>

		 {{--Update Submit--}}
		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
			    {!! Form::submit('update', [
			        'class' => 'btn btn-primary'
			    ]) !!}
		    </div>
		</div>

	{!! Form::close() !!}

@endsection

@section('api')


@show
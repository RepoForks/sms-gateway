@extends('admin.master')
@section('title', 'API Keys')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>API Key Generator</h5>
				</div>
				<div class="ibox-content">

					{!! Form::open(['route' => 'keys.create', 'method' => 'post', 'class' => 'form-horizontal']) !!}

						{{-- description field --}}
						<div class="form-group">
						    {!! Form::label('description', 'Key description:', ['class' => 'col-sm-2 control-label']) !!}
						    <div class="col-sm-10">
							    {!! Form::text('description', null, [
							        'class' => 'form-control'
							    ]) !!}
						    </div>
						</div>

						{{-- submit field --}}
						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
							    {!! Form::submit('Generate Key', [
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
					<h5>Generated keys</h5>
				</div>
				<div class="ibox-content">

					@if(count($keys) == 0)
						You haven't any keys generated.
					@else

						<table class="table table-striped">
							<thead>
							<tr>
								<th>#ID</th>
								<th>Key</th>
								<th>Active</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($keys as $key)
								<tr>
									<td>{{ $key->id }}</td>
									<td><span tabindex="0" class="" role="button" data-toggle="popover" data-trigger="focus" title="Description" data-content="{{ $key->description }}">{{ $key->key }}</span></td>
									<td>{!!  $key->getStatusBadge()  !!}</td>
									<td>{{ $key->created_at }}</td>
									<td>
										@if($key->isEnabled())
											<a href="{{ route('key.disable', $key->id) }}"><i class="fa fa-close"></i></a>
										@else
											<a href="{{ route('key.enable', $key->id) }}"><i class="fa fa-check"></i></a>
										@endif
											<a href="{{ route('key.remove', $key->id) }}"><i class="fa fa-trash"></i></a>
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


@section('scripts')
	@parent

	<script type="text/javascript">

		$('[data-toggle="popover"]').popover();

	</script>

@endsection
@extends('admin.master')
@section('title', 'Gateways')


@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Create new gateway</h5>
				</div>
				<div class="ibox-content">

					{!! Form::open(['route' => 'gateway.create', 'method' => 'post', 'class' => 'form-horizontal']) !!}

					{{-- Description Field --}}
					<div class="form-group">
					    {!! Form::label('description', 'Description:', ['class' => 'col-sm-2 control-label']) !!}
					    <div class="col-sm-10">
						    {!! Form::text('description', old('description'), [
						        'class' => 'form-control',
						        'placeholder' => 'enter description'
						    ]) !!}
					    </div>
					</div>


					<div class="form-group">
						<label for="operator_id" class="col-sm-2 control-label">Operator:</label>
						<div class="col-sm-10">
							<select name="operator_id" id="operator_id" class="form-control">

								<option value="0">All operators</option>
								@foreach($operators as $operator)
									<option value="{{ $operator->id }}">{{ $operator->selectName() }}</option>
								@endforeach
							</select>
						</div>
					</div>
					
					{{-- Create gateway Submit --}}
					<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
						    {!! Form::submit('create gateway', [
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
					<h5>Gateway list</h5>
				</div>
				<div class="ibox-content">

					@if(count($gateways) == 0)
						<p>You have no gateways configured yet.</p>
					@else
						<table class="table table-striped table-bordered table-hover">

							<thead>
								<tr>
									<th>#ID</th>
									<th>Description</th>
									<th>Access Key</th>
									<th>Operator</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>

							@foreach($gateways as $gateway)

								<tr>
									<td>{{ $gateway->id }}</td>
									<td>{{ $gateway->description }}</td>
									<td>{{ $gateway->access_key }}</td>
									<td>{{ $gateway->getOperatorName() }}</td>
									<td>
										<div class="btn-group">
											<a href="{{ $gateway->getDeleteUrl() }}" class="btn btn-danger btn-xs">remove</a>
										</div>
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
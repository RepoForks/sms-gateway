@extends('admin.master')
@section('title', 'SMS History')

@section('links')
	@parent
	<link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Sent history</h5>
				</div>
				<div class="ibox-content">

					@if(count($sent) == 0)
						<p>You have no SMS sent.</p>
					@else

						<table class="table table-striped table-bordered table-hover" id="history">

							<thead>
								<tr>
									<th>Action</th>
									<th>Content</th>
									<td>Created at</td>
								</tr>
							</thead>

							<tbody>
							@foreach($sent as $sms)

								<tr>
									<td>{{ $sms->action }}</td>
									<td>{{ $sms->content }}</td>
									<td>{{ $sms->created_at }}</td>
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
	<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

	<script type="text/javascript">

		$(document).ready(function(){

			$('#history').DataTable({
				dom: '<"html5buttons"B>lTfgitp',
				buttons: [
					{extend: 'copy'},
					{extend: 'csv'},
					{extend: 'excel', title: 'gw_history'},
					{extend: 'pdf', title: 'gw_history'},

					{extend: 'print',
						customize: function (win){
							$(win.document.body).addClass('white-bg');
							$(win.document.body).css('font-size', '10px');

							$(win.document.body).find('table')
									.addClass('compact')
									.css('font-size', 'inherit');
						}
					}
				]

			});

		});

	</script>

@endsection

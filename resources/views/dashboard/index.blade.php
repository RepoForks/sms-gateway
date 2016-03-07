@extends('admin.master')
@section('title', 'Dashboard')


@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Today</span>
					<h5>Sent</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins"> {{ \Auth::user()->sentCountToday() }}</h1>
					<small>Total sent today.</small>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-info pull-right">Total</span>
					<h5>Total sent</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins"> {{ \Auth::user()->sentCount() }}</h1>
					<small>Total SMS sent.</small>
				</div>
			</div>
		</div>

		 {{--Some stuff --}}
		<div class="col-md-4" style="display: none">
			<div class="flot-chart m-t-lg" style="height: 55px;">
				<div class="flot-chart-content" id="flot-chart1"></div>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div>
                        <h3 class="font-bold no-margins">
							Sending statistics
						</h3>
						<small>Total sent sms.</small>
					</div>

					<div class="m-t-sm">

						<div class="row">
							<div class="col-md-8">
								<div>
									<canvas id="lineChart" height="114"></canvas>
								</div>
							</div>
							<div class="col-md-4">
								<ul class="stat-list m-t-lg">
									<li>
										<h2 class="no-margins">{{ \Auth::user()->sentCountToday() }}</h2>
										<small>Total sent today</small>
										<div class="progress progress-mini">
											<div class="progress-bar" style="width: {{ \Auth::user()->sentPercentToday() }}%;"></div>
										</div>
									</li>
									<li>
										<h2 class="no-margins ">{{ \Auth::user()->sentCount() }}</h2>
										<small>Total sent this month</small>
										<div class="progress progress-mini">
											<div class="progress-bar" style="width: {{ \Auth::user()->sentPercentMonth() }}%;"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-warning pull-right">Stats</span>
					<h5>User activity</h5>
				</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-xs-6">
							<small class="stats-label">API keys / Limit</small>
							<h4>{{ count(\Auth::user()->keys) }} / {{ \Auth::user()->token_limit }}</h4>
						</div>

						<div class="col-xs-6">
							<small class="stats-label">Templates / Limit</small>
							<h4>{{ count(\Auth::user()->smsTemplates ) }} / {{ \Auth::user()->templates_limit }}</h4>
						</div>
					</div>
				</div>


				<div class="ibox-content">
					<div class="row">
						<div class="col-xs-6">
							<small class="stats-label">Sent month/ Limit</small>
							<h4>{{ \Auth::user()->sentCountMonth() }} / {{ \Auth::user()->sent_limit_month }}</h4>
						</div>

						<div class="col-xs-6">
							<small class="stats-label">Sent today / Limit</small>
							<h4>{{ \Auth::user()->sentCountToday() }} / {{ \Auth::user()->sent_limit_today }}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection

@section('scripts')
	@parent

	{{-- Flot --}}
	<script src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
	<script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>

	{{--  ChartJS --}}
	<script src="{{ asset('js/plugins/chartJs/Chart.min.js') }}"></script>

	{{-- Peity --}}
	<script src="{{ asset('js/plugins/peity/jquery.peity.min.js') }}"></script>
	<script src="{{ asset('js/peity-demo.js') }}"></script>


	<script>
		$(document).ready(function () {

			var chartData = JSON.parse('<?php echo $stats ?>');

			var lineData = {
				labels  : ["January", "February", "March", "April", "May", "June", "July"],
				datasets: [
					{
						label               : "Example dataset",
						fillColor           : "rgba(26,179,148,0.5)",
						strokeColor         : "rgba(26,179,148,0.7)",
						pointColor          : "rgba(26,179,148,1)",
						pointStrokeColor    : "#fff",
						pointHighlightFill  : "#fff",
						pointHighlightStroke: "rgba(26,179,148,1)",
						data                : chartData
					}
				]
			};

			var lineOptions = {
				scaleShowGridLines     : true,
				scaleGridLineColor     : "rgba(0,0,0,.05)",
				scaleGridLineWidth     : 1,
				bezierCurve            : true,
				bezierCurveTension     : 0.4,
				pointDot               : true,
				pointDotRadius         : 4,
				pointDotStrokeWidth    : 1,
				pointHitDetectionRadius: 20,
				datasetStroke          : true,
				datasetStrokeWidth     : 2,
				datasetFill            : true,
				responsive             : true,
			};


			var ctx = document.getElementById("lineChart").getContext("2d");
			new Chart(ctx).Line(lineData, lineOptions);

		});
	</script>


@endsection
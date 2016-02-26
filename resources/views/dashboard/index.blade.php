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
					<h1 class="no-margins">0</h1>
					<small>Total sent today.</small>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-info pull-right">Today</span>
					<h5>Received</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">0</h1>
					<small>Total received today.</small>
				</div>
			</div>
		</div>

		{{-- Some stuff --}}
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
                        <span class="pull-right text-right">
                        <small>Average value of sales in the past month in: <strong>United
		                        states</strong></small>
                            <br/>
                            All sales: 162,862
                        </span>

						<h3 class="font-bold no-margins">
							Half-year revenue margin
						</h3>
						<small>Sales marketing.</small>
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
										<h2 class="no-margins">2,346</h2>
										<small>Total orders in period</small>
										<div class="progress progress-mini">
											<div class="progress-bar" style="width: 48%;"></div>
										</div>
									</li>
									<li>
										<h2 class="no-margins ">4,422</h2>
										<small>Orders in last month</small>
										<div class="progress progress-mini">
											<div class="progress-bar" style="width: 60%;"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>

					</div>

					<div class="m-t-md">
						<small class="pull-right">
							<i class="fa fa-clock-o"> </i>
							Update on 16.07.2015
						</small>
						<small>
							<strong>Analysis of sales:</strong> The value has been changed over time, and last month
							reached a level over $50,000.
						</small>
					</div>

				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-warning pull-right">Monthly</span>
					<h5>User activity</h5>
				</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-xs-6">
							<small class="stats-label">Tokens active / Limit</small>
							<h4>0 / 1000</h4>
						</div>

						<div class="col-xs-6">
							<small class="stats-label">Tokens inactive / Limit</small>
							<h4>0 / 1000</h4>
						</div>
					</div>
				</div>

				<div class="ibox-content">
					<div class="row">
						<div class="col-xs-6">
							<small class="stats-label">Automatic sending / Limit</small>
							<h4>0 / 1000</h4>
						</div>

						<div class="col-xs-6">
							<small class="stats-label">Prepared SMS / Limit</small>
							<h4>0 / 1000</h4>
						</div>
					</div>
				</div>

				<div class="ibox-content">
					<div class="row">
						<div class="col-xs-4">
							<small class="stats-label">SMS Sent / Limit</small>
							<h4>0 / 1000</h4>
						</div>

						<div class="col-xs-4">
							<small class="stats-label">SMS Received / Limit</small>
							<h4>0 / 1000</h4>
						</div>
						<div class="col-xs-4">
							<small class="stats-label">SMS Errors</small>
							<h4>0</h4>
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


			var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
			var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

			var data1 = [
				{label: "Data 1", data: d1, color: '#17a084'},
				{label: "Data 2", data: d2, color: '#127e68'}
			];
			$.plot($("#flot-chart1"), data1, {
				xaxis : {
					tickDecimals: 0
				},
				series: {
					lines : {
						show     : true,
						fill     : true,
						fillColor: {
							colors: [{
								opacity: 1
							}, {
								opacity: 1
							}]
						},
					},
					points: {
						width: 0.1,
						show : false
					},
				},
				grid  : {
					show       : false,
					borderWidth: 0
				},
				legend: {
					show: false,
				}
			});

			var lineData = {
				labels  : ["January", "February", "March", "April", "May", "June", "July"],
				datasets: [
					{
						label               : "Example dataset",
						fillColor           : "rgba(220,220,220,0.5)",
						strokeColor         : "rgba(220,220,220,1)",
						pointColor          : "rgba(220,220,220,1)",
						pointStrokeColor    : "#fff",
						pointHighlightFill  : "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						data                : [65, 59, 40, 51, 36, 25, 40]
					},
					{
						label               : "Example dataset",
						fillColor           : "rgba(26,179,148,0.5)",
						strokeColor         : "rgba(26,179,148,0.7)",
						pointColor          : "rgba(26,179,148,1)",
						pointStrokeColor    : "#fff",
						pointHighlightFill  : "#fff",
						pointHighlightStroke: "rgba(26,179,148,1)",
						data                : [48, 48, 60, 39, 56, 37, 30]
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
			var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

		});
	</script>


@endsection
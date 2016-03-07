@extends('admin.master')
@section('title', 'Verification API')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>@if(Auth::user()->hasApiEnabled($api)) {{ $api->name . ' configuration' }} @else {{ $api->name }} @endif</h5>
					<div class="ibox-tools">
						@if(Auth::user()->hasApiEnabled($api))
							<a href="{{ $api->getDisableUrl() }}" class="btn btn-danger btn-xs">disable</a>
						@else
							<a href="{{ $api->getEnableUrl() }}" class="btn btn-primary btn-xs">enable</a>
						@endif
					</div>
				</div>
				<div class="ibox-content">
					@if(Auth::user()->hasApiEnabled($api))
						@yield('configuration')
					@else
						<p>{{ $api->name }} is disabled.</p>
					@endif

				</div>
			</div>
		</div>
	</div>

@endsection

@yield('api')
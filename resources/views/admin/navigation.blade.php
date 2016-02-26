<?php
	use App\Api;
	$segment = Request::segment(1);
	$second  = Request::segment(2);
	$apis    = Api::all();
?>
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('img/default_profile_48.jpg') }}"/>
                             </span>
					<a data-toggle="dropdown" class="dropdown-toggle" href="">
                            <span class="clear"> <span class="block m-t-xs"> <strong
				                            class="font-bold">{{ Auth::user()->fullName() }}</strong>
                             </span> <span
			                            class="text-muted text-xs block"> {{ Auth::user()->getRoleName() }}</span> </span>
					</a>
				</div>
				<div class="logo-element">
					IN+
				</div>
			</li>

			{{-- dashboard --}}
			@if($segment == 'dashboard')
				<li class="active">
			@else
				<li>
					@endif
					<a href="{{ route('dashboard.index') }}"><i class="fa fa-line-chart"></i> <span class="nav-label">Dashboard</span></a>
				</li>

			{{-- api keys --}}
			@if($segment == 'keys')
				<li class="active">
			@else
				<li>
					@endif
					<a href="{{ route('keys.index') }}"><i class="fa fa-key"></i> <span
								class="nav-label">API keys</span></a>
				</li>

			{{-- templates --}}
			@if($segment == 'templates')
				<li class="active">
			@else
				<li>
					@endif
					<a href="{{ route('sms.template') }}"><i class="fa fa-object-group"></i> <span
								class="nav-label">Templates</span></a>
				</li>

			{{-- sms history --}}
			@if($segment == 'history')
				<li class="active">
			@else
				<li>
					@endif
					<a href="{{ route('sms.history')  }}"><i class="fa fa-history"></i> <span class="nav-label">History</span></a>
				</li>

			{{-- apis --}}
			@if(count($apis) != 0)
				@if($segment == 'apis')
					<li class="active">
				@else
					<li>
						@endif
						<a href="#"><i class="fa fa-server"></i> <span class="nav-label">Services</span> <span
									class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">

							@foreach($apis as $api)

							@if($second == $api->api_name)
								<li class="active">
							@else
								<li>
									@endif
									<a href="{{ route($api->api_name . '.index') }}"><i
												class="fa {{ $api->navigation_icon }}"></i> <span class="nav-label">{{ $api->name }}</span></a>
								</li>
							@endforeach

						</ul>
					</li>
			@endif

			{{-- settings --}}
			@if(($segment == 'users' && $second != null)  || $segment == 'plan')
				<li class="active">
			@else
				<li>
					@endif
					<a href="{{ route('user.show', Auth::user()->id) }}"><i class="fa fa-wrench"></i>
						<span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">

					{{-- profile --}}
					@if($segment == 'users')
						<li class="active">
					@else
						<li>
							@endif
							<a href="{{ route('user.show', Auth::user()->id) }}"><i
										class="fa fa-user"></i> <span
										class="nav-label">Profile</span></a>
						</li>
					</ul>
				</li>

			{{-- admin --}}
			@if(($segment == 'users' && $second == null) || $segment == 'stats' || $segment == 'gateways')
				<li class="active">
			@else
				<li>
					@endif
					<a href=""><i class="fa fa-graduation-cap"></i> <span
								class="nav-label">Admin</span> <span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">

					{{-- all users --}}
					@if($segment == 'users')
						<li class="active">
					@else
						<li>
							@endif
							<a href="{{ route('user.index') }}"><i class="fa fa-users"></i>
								<span class="nav-label">Users</span></a>
						</li>

					{{-- stats --}}
					@if($segment == 'stats')
						<li class="active">
					@else
						<li>
							@endif
							<a href="{{ route('dashboard.stats') }}"><i
										class="fa fa-area-chart"></i> <span
										class="nav-label">Statistics</span></a>
						</li>

					<!-- TODO add virtual gateways support -->
					{{-- gateways --}}
					{{--@if($segment == 'gateways')--}}
						{{--<li class="active">--}}
					{{--@else--}}
						{{--<li>--}}
							{{--@endif--}}
							{{--<a href="{{ route('gateway.index') }}"><i--}}
										{{--class="fa fa-plug"></i> <span class="nav-label">Gateways</span></a>--}}
						{{--</li>--}}
					</ul>
				</li>
		</ul>
	</div>
</nav>
<?php $segment = Request::segment(1) ?>
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
                             </span> <span class="text-muted text-xs block"> {{ Auth::user()->getRoleName() }}</span> </span> </a>
				</div>
				<div class="logo-element">
					IN+
				</div>
			</li>

			@if($segment == 'dashboard')
				<li class="active">
			@else
				<li>
			@endif
					<a href="{{ route('dashboard.index') }}"><i class="fa fa-line-chart"></i> <span class="nav-label">Dashboard</span></a>
				</li>



			@if($segment == 'keys')
				<li class="active">
			@else
				<li>
			@endif
					<a href="{{ route('keys.index') }}"><i class="fa fa-key"></i> <span class="nav-label">API keys</span></a>
				</li>

			@if($segment == 'prepared')
				<li class="active">
			@else
				<li>
			@endif
					<a href="{{ route('sms.prepared') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Prepared SMS</span></a>
				</li>

			@if($segment == 'automatic')
				<li class="active">
			@else
				<li>
			@endif
					<a href="{{ route('sms.automatic') }}"><i class="fa fa-send"></i> <span class="nav-label">Automatic sending</span></a>
				</li>

			@if($segment == 'history')
				<li class="active">
			@else
				<li>
			@endif
					<a href="{{ route('sms.history')  }}"><i class="fa fa-history"></i> <span class="nav-label">History</span></a>
				</li>

			@if($segment == 'profile' || $segment == 'plan')
				<li class="active">
			@else
				<li>
			@endif
					<a href="{{ route('profile.show') }}"><i class="fa fa-wrench"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">


						@if($segment == 'profile')
							<li class="active">
						@else
							<li>
						@endif
								<a href="{{ route('profile.show') }}"><i class="fa fa-user"></i> <span class="nav-label">Profile</span></a>
							</li>

						@if($segment == 'plan')
							<li class="active">
						@else
							<li>
						@endif
								<a href="{{ route('plan.index') }}"><i class="fa fa-money"></i> <span class="nav-label">Plans</span></a>
							</li>

					</ul>
				</li>

			@if($segment == 'users' || $segment == 'stats' || $segment == 'gateways')
				<li class="active">
			@else
				<li>
			@endif
				<a href=""><i class="fa fa-graduation-cap"></i> <span class="nav-label">Admin</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">
					@if($segment == 'users')
						<li class="active">
					@else
						<li>
					@endif
							<a href="{{ route('user.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Users</span></a>
						</li>

					@if($segment == 'stats')
						<li class="active">
					@else
						<li>
					@endif
							<a href="{{ route('dashboard.stats') }}"><i class="fa fa-area-chart"></i> <span class="nav-label">Statistics</span></a>
						</li>

					@if($segment == 'gateways')
						<li class="active">
					@else
						<li>
					@endif
							<a href="{{ route('gateway.index') }}"><i class="fa fa-plug"></i> <span class="nav-label">Gateways</span></a>
						</li>

				</ul>
			</li>


		</ul>

	</div>
</nav>
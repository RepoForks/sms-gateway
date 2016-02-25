@extends('admin.master')
@section('title', 'All users')


@section('content')

	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Service users</h5>
				</div>
				<div class="ibox-content">

					<table class="table">

						<thead>
							<tr>
								<th>#ID</th>
								<th>email</th>
								<th>created at</th>
								<th>role</th>
								<th>action</th>
							</tr>
						</thead>

						<tbody>
							@if(count($users) == 0)
								<tr>
									<td colspan="5">No users added yet.</td>
								</tr>
							@else
								@foreach($users as $user)
									<tr>
										<td>{{ $user->id }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->created_at }}</td>
										<td>{{ $user->getRoleName() }}</td>
										<td>
											<a href="{{ $user->getProfileUrl() }}"><i class="fa fa-wrench"></i></a>
											<a href="{{ $user->getDeleteUrl() }}"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>

					</table>

				</div>
			</div>
		</div>
	</div>

@endsection
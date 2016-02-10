<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>SMSgw | Forgot password</title>

	@include('include.ins_header')

</head>

<body class="gray-bg">

<div class="passwordBox animated fadeInDown">
	<div class="row">

		<div class="col-md-12">
			<div class="ibox-content">

				<h2 class="font-bold">Forgot password</h2>

				<p>
					Enter your email address and your password will be reset and emailed to you.
				</p>

				<div class="row">

					<div class="col-lg-12">
						<form class="m-t" role="form" action="http://webapplayers.com/inspinia_admin-v2.4/index.html">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email address" required="">
							</div>

							<button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-6">
			Copyright Example Company
		</div>
		<div class="col-md-6 text-right">
			<small>© 2014-2015</small>
		</div>
	</div>
</div>
@include('include.ins_footer')
</body>
</html>


{{-- Main Content
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

--}}
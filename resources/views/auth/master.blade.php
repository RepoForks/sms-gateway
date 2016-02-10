<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>SMSgw | @yield('title', 'Login')</title>

	@include('include.ins_header')

</head>

<body class="md-skin">

<div class="loginColumns animated fadeInDown">

	@yield('content')

	<hr/>
	<div class="row">
		<div class="col-md-6">
			Copyright <a href="https://www.jasompeter.com" target="_blank">me</a>
		</div>
		<div class="col-md-6 text-right">
			<small>© 2016</small>
		</div>
	</div>
</div>

@include('include.ins_footer')

</body>
</html>

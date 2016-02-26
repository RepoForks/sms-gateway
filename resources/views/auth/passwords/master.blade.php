<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}"/>
	<title>SMSgw | @yield('title')</title>
	@include('include.ins_header')
</head>

<body class="md-skin">
<div class="passwordBox animated fadeInDown">
	<div class="row">
		<div class="col-md-12">
			@include('admin.error')
			@yield('content')
		</div>
	</div>
	<hr/>
	@include('auth.footer')
</div>
</body>
</html>

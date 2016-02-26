<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}"/>

	<title>SMSgw | @yield('title', 'Dashboard')</title>

	@include('include.ins_header')

</head>

<body class="md-skin">

<div id="wrapper">

	@include('admin.navigation')

	<div id="page-wrapper" class="gray-bg">
		@include('admin.header')

		@include('admin.title')

		<div class="wrapper wrapper-content">
			@include('admin.error')
			@yield('content')
		</div>
		@include('admin.footer')

	</div>
</div>

{{-- mainly scripts --}}
@include('include.ins_footer')
</body>


</html>
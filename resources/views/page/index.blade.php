<!DOCTYPE HTML>

<html>
<head>
	<title>SMSgw | Home</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}"/>
	<link rel="stylesheet" href="{{ asset('page/assets/css/main.css') }}" />
</head>
<body id="top">

<header id="header">
	<div class="content">
		<h1>SMSgw</h1>
		<p>open source sms gateway</p>
		<ul class="actions">
			<li><a href="https://github.com/ptrstovka/sms-gateway" target="_blank" class="button special icon fa-github">Github</a></li>
			<li><a href="{{ route('dashboard.index') }}" class="button special icon fa-dashboard">Dashboard</a></li>
		</ul>
	</div>
</header>

<script src="{{ asset('page/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('page/assets/js/jquery.scrolly.min.js') }}"></script>
<script src="{{ asset('page/assets/js/skel.min.js') }}"></script>
<script src="{{ asset('page/assets/js/util.js') }}"></script>
<script src="{{ asset('page/assets/js/main.js') }}"></script>
</body>
</html>
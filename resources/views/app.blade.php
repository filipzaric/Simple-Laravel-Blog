<!DOCTYPE html>
<html lang="en">
<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('/css/jquery-ui-1.9.2.custom.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<head>
	<meta charset="UTF-8">
	<title>Laravel Blog</title>
</head>
<body>

	<div class="content">
		@yield('content')
	</div>
</body>
</html>
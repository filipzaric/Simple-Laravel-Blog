<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    @yield('content')
    @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
</div>
@yield('footer')
</body>
</html>
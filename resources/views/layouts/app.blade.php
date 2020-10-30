<html>
<head>
    <title>{{config('app.name')}} - @yield('title')</title>
    @include('blocks.header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-3">
    @yield('content')
</div>
</body>
</html>

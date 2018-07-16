<html>
<head>
    @include('head')
    <title>
        @yield('title')
    </title>
</head>
<body>

<div>
    @include('navbar')
</div>
    @yield('content')
</body>
</html>
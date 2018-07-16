<html>
<head>
    @include('layouts/head')
    <title>
        @yield('title')
    </title>
</head>
<body>

<div>
    @include('layouts/navbar')
</div>
    @yield('content')
</body>
</html>
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
<div class="content">
    @yield('content')
</div>

</body>
</html>
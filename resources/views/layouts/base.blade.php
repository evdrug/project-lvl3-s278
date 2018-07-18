<html>
<head>
    @include('layouts/head')
    <title>
        @yield('title')
    </title>
</head>
<body class="h-100 w-100 d-flex flex-column">

<div>
    @include('layouts/navbar')
</div>
<div class="content d-flex flex-column justify-content-between h-100 w-100">
    @yield('content')
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    @include('skeleton.head')
</head>
<body>
    <div id="tortle">
        @include('layout.header')
        @yield('app')
    </div>
</body>
</html>

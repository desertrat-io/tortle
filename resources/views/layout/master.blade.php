<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @include('skeleton.head')
</head>
<body class="font-body">
@googlefonts('quicksand')
    <div id="tortle">
        @include('layout.header')
        <section id="tortle-content-area" class="container mx-auto w-auto justify-center flex">
            @yield('app')
        </section>
    </div>
</body>
</html>

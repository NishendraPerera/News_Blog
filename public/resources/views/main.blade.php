<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('partials._head')
</head>
<body>

@include('partials._nav')

<div class="container">

    @include('partials._messages')

    {{ Auth::check() ? "Logged In" : "Logged Out" }}
    @yield('content')
</div>

@include('partials._footer')

@include('partials._javascript')

@yield('scripts')

</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('layouts.partials._head')
@yield('dropzone')
</head>
<body>
    @include('layouts.partials._navigation')

    @yield('content')
    <!-- Scripts -->
   @include('layouts.partials._scripts')
   @yield('scripts')
</body>
</html>

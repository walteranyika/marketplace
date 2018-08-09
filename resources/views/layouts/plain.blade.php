<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('layouts.partials._head')
</head>
<body>
    @yield('content')
    <!-- Scripts -->
   @include('layouts.partials._scripts')
</body>
</html>

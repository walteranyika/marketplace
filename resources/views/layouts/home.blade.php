<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('layouts.partials._head')
</head>
<body>
    <section class="hero is-primary is-large">
        <div class="hero-head">
           @include('layouts.partials._navigation')
        </div>
        @yield('content')
    </section>

    <!-- Scripts -->
   @include('layouts.partials._scripts')
</body>
</html>

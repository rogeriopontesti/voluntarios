<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.default.elements.head')   
    <body>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('layouts.default.elements.footer')   
    </footer>
</body>
</html>
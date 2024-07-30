<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('front.layouts.includes.head')
    <title>
        @stack('title', 'Default Title')  
    </title>
</head>

<body>
    <div class="site-wrapper" id="top">
        <x-front-header-component />
        @yield('content')
    </div>
    <x-front-footer-component />
    @include('front.layouts.includes.foot')
</body>

</html>

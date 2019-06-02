{{--The layout list should be correct order--}}

@include('frontend.layouts.header')
@include('frontend.layouts.nav')
@include('frontend.layouts.footer')

@yield('header')
@yield('nav')
{{--contents are different according to the pages so it's not included like header and footer--}}
@yield('content')
@yield('footer')


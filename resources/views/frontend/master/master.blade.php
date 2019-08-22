
@include('frontend.layouts.header')
@include('frontend.layouts.nav')
{{--@include('frontend.layouts.footer')--}}

{{--yield section is to sort contents in correct order--}}

{{--The layout list should be correct order--}}
@yield('header')
@yield('nav')

{{--slider and sidebar is not needed in every pages so it is not included like header, footer--}}
@yield('slider')
@yield('sidebar')

{{--contents are different according to the pages so it's not included like header and footer--}}
@yield('content')
@yield('footer')


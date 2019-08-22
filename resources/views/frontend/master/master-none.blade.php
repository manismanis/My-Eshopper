@include('frontend.layouts.header')
@include('frontend.layouts.nav')
{{--@include('frontend.layouts.aside')--}}
@include('Frontend.layouts.footer')
@include('Frontend.layouts.userMenu')

@yield('header')
@yield('nav')
<br>
@yield('content')

@yield('footer')

@include('frontend.layouts.header')
@include('frontend.layouts.nav')
@include('Frontend.layouts.footer')
@include('Frontend.layouts.userMenu')

@yield('header')
@yield('nav')
<br>
<section>
    <div class="container">
        <div class="row">
            <!-- SIDE A - Menu -->
            <div class="col-sm-2">
                @yield('userMenu')
            </div>

            <!-- SIDE B - Container -->
            <div class="col-sm-10">
                @yield('content')
            </div>
        </div>
    </div>
</section>

@yield('footer')

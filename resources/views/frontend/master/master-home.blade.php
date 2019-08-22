@include('frontend.layouts.header')
@include('frontend.layouts.nav')
@include('frontend.layouts.sliders')
@include('frontend.layouts.aside')
@include('Frontend/layouts/footer')

@yield('header')
@yield('nav')
@yield('sliders')

<section>
    <div class="container">
        <div class="row">
            <!-- SIDE A - Sidebar -->
            <div class="col-sm-3">
                @yield('aside')
            </div>

        <!-- SIDE B - Container -->
            @yield('content')
        </div>
    </div>
</section>

@yield('footer')

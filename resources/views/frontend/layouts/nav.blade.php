@section('nav')

    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i>9895820395</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> eshoppernepal@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="search_box pull-left">
                            <ul>
                                <li><input type="text" class="form-control" placeholder="Search anything here..."/></li>
                            </ul>
                        </div>
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="images/home/logo.png" alt=""/></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                    <a type="button" class="btn btn-alert dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{empty(\Illuminate\Support\Facades\Auth::user()->image) ? url('uploads/images/extra/default_user.jpg') : url('uploads/images/users/'.\Illuminate\Support\Facades\Auth::user()->image)}}"
                                            height="20px" width="25px" alt="..." class="img-circle profile_img">
                                        {{ Auth::user()->name }} <span
                                                class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="container col-sm-12">
                                            <div><a class="dropdown-item" href="{{ route('manage-account') }}">Manage
                                                    Account</a></div>
                                            <div><a class="dropdown-item"
                                                    href="">Orders</a></div>
                                            <div><a class="dropdown-item"
                                                    href="">Wishlist</a></div>
                                            <div class="dropdown-divider"></div>
                                            <div>
                                                <strong><a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a></strong>
                                                <form id="logout-form" action="{{ route('logout') }}"
                                                      method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a href="<?=url("login")?>" type="button" class="btn btn-alert dropdown-toggle">
                                        <i class="fa fa-lock"></i> Login
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <a type="button" class="btn btn-alert dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"></i> Cart <span
                                            class="badge">{{\Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('cart')->totalQty : ''}}</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu">
                                    @if(\Illuminate\Support\Facades\Session::has('cart'))
                                        <ul>
                                            <li>
                                                <div class="row" style="height: 180px">
                                                    <?php
                                                    $oldCart = \Illuminate\Support\Facades\Session::get('cart');
                                                    $cart = new \App\Cart($oldCart);
                                                    ?>
                                                    @foreach($cart->items as $item)
                                                        <span class="badge"></span>
                                                        <img src="{{url('uploads/images/items/' . $item['item']['image'])}}"
                                                             width="50px" alt=""/> <span
                                                                class="badge">{{$item['qty']}}</span>
                                                        <span class="label label-success">{{$item['price']}}</span><br>
                                                    @endforeach
                                                    <hr>
                                                    <strong>Total : {{$cart->totalPrice}}</strong><br>
                                                    <a href="{{route('shoppingCart')}}" type="button"
                                                       class="btn btn-xs btn-primary"> View</a>
                                                    <a href="" type="button" class="btn btn-xs btn-primary">
                                                        Checkout</a>
                                                </div>
                                            </li>
                                        </ul>
                                    @else
                                        <ul>
                                            <li>
                                                <div>
                                                    <br>
                                                    No Items in Cart
                                                    <hr>
                                                    <a href="" type="button" class="btn btn-primary"> Explore</a>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{route('index')}}" class="active">Home</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

@endsection
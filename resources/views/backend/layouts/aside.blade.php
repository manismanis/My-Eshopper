@section('aside')

    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{route('index')}}" class="site_title"><i class="fa fa-shopping-bag"></i> <span>E-Shopper</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <a href="{{url('/')}}"><img src="{{url('uploads/images/admins/' . \Illuminate\Support\Facades\Auth::guard('admin')->user()->image)}}" alt="..." class="img-circle profile_img"></a>
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->username}}</h2>
                </div>
            </div>
            <!-- /menu profile quick info -->
            <br>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <ul class="nav side-menu">
                        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a><i class="fa fa-users"></i> Admin <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-admin')}}"> Add Admin</a></li>
                                <li><a href="{{route('admin')}}"> Show Admins</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-sliders"></i> Sliders <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-slider')}}"> Create Slider</a></li>
                                <li><a href="{{route('slider')}}"> Show Sliders</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-google-plus"></i> Categories <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-category')}}"> Create Category</a></li>
                                <li><a href="{{route('category')}}"> Show Categories</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-google-plus"></i> Sub-Categories <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-subcategory')}}"> Create Sub-Category</a></li>
                                <li><a href="{{route('subcategory')}}"> Show Sub-Categories</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-tags"></i> Brands <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-brand')}}"> Add Brand</a></li>
                                <li><a href="{{route('brands')}}"> Show Brands</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-tags"></i> Items <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-item')}}"> Add Item</a></li>
                                <li><a href="{{route('items')}}"> Show Items</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
        </div>
    </div>

@endsection
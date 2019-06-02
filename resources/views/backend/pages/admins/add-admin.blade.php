@extends('backend.master.master')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Admins</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('add-admin')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group form-group-sm">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" name="fullname" value="{{old('fullname')}}"
                                                   placeholder="Enter Your Full Name" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('fullname')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="username">User Name</label>
                                            <input type="text" id="username" name="username" value="{{old('username')}}"
                                                   placeholder="Enter User Name" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('username')}}</a>

                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="email">Email</label>
                                            <input type="text" id="email" name="email" value="{{old('email')}}"
                                                   placeholder="Enter Your Email" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('email')}}</a>

                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password"
                                                   placeholder="Enter Your Password" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('password')}}</a>

                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" id="password_confirm" name="password_confirmation"
                                                   placeholder="Confirm Your Password" class="form-control">
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="upload">Profile Picture</label>
                                            <input type="file" id="upload" name="upload" class="btn btn-default btn-sm">
                                            <a href="" style="color: red">{{$errors->first('upload')}}</a>


                                        </div>
                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">Add Records</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->





@endsection
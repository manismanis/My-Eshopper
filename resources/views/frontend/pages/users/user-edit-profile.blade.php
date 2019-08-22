@extends('frontend.master.master-user')

@section('content')
    <div class="left_col scroll-view">
        <div class="col-sm-12 col-md-12">
            <div><strong><a href="{{route('manage-account')}}">Manage Account</a></strong> / Profile</div>
            <hr>
            <div class="row">
                @include('backend.layouts.messages')
                <form action="{{route('user-profile')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-9">
                        {{csrf_field()}}
                        <div class="form-group form-group-sm">
                            <label for="title">Title</label>
                            <input type="text" name="name" id="name" value="{{$viewData->name}}"
                                   placeholder="Enter Name" class="form-control">
                            <label for="title" style="color: red">{{$errors->first('name')}}</label>
                        </div>
                        <div class="row">
                            <div class="form-group form-group-sm col-sm-6">
                                <label for="dob">DOB</label> (M/D/Y)<br>
                                <div class="col-sm-3">
                                    <select name="month[]" id="month" class="form-control" style="width: 70px;">
                                        @for($x = 1; $x <= 12; $x++)
                                            <option value="{{$x}}" {{$x==(int)date("m", strtotime($viewData->dob)) ? 'selected' : ''}}> {{$x}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="day[]" id="day" class="form-control" style="width: 70px;">
                                        @for($x = 1; $x <= 32; $x++)
                                            <option value="{{$x}}" {{$x==(int)date("d", strtotime($viewData->dob)) ? 'selected' : ''}}> {{$x}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <select name="year[]" id="year" class="form-control" style="width: 80px;">
                                        @for($x = 1971; $x <= 2019; $x++)
                                            <option value="{{$x}}" {{$x==(int)date("Y", strtotime($viewData->dob)) ? 'selected' : ''}}> {{$x}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-md-6">
                                <label for="gender">Select Gender</label>
                                <select name="gender[]" id="gender" class="form-control">
                                    <option value=""> ---- Select Gender</option>
                                    <option value="male" {{$viewData->gender=='male' ? 'selected' : ''}}> Male</option>
                                    <option value="female" {{$viewData->gender=='female' ? 'selected' : ''}}> Female
                                    </option>
                                    <option value="other" {{$viewData->gender=='other' ? 'selected' : ''}}> Other
                                    </option>
                                </select>
                                <label for="title" style="color: red">{{$errors->first('gender')}}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group form-group-sm col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" value="{{$viewData->phone_no}}"
                                       placeholder="Enter Phone/Mobile" class="form-control">
                                <label for="title" style="color: red">{{$errors->first('phone')}}</label>
                            </div>
                            <div class="form-group form-group-sm col-md-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="{{$viewData->email}}"
                                       placeholder="Enter Email" class="form-control">
                                <label for="title" style="color: red">{{$errors->first('email')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="form-group form-group-sm">
                            <label for="image">Profile Picture</label><br><br>
                            @if(empty($viewData->image))
                                <img src="{{url('uploads/images/extra/default_user.jpg')}}" width="100" alt=""><br><br>
                            @else
                                <img src="{{url('uploads/images/users/' .  $viewData->image)}}" width="100" alt=""><br>
                                <br>
                            @endif
                            <input type="file" name="upload" class="btn btn-default btn-xs">
                            <label for="title" style="color: red">{{$errors->first('upload')}}</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="ln_solid"></div>
                        <div class="form-group form-group-sm">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp; Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
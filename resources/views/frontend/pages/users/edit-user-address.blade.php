@extends('frontend.master-user')

@section('content')

    <!-- Modal - Edit -->
    <form action="{{route('edit-user-address-action')}}" method="post" enctype="multipart/form-data">
        <div class="row">
            @include('backend.layouts.messages')
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <input type="hidden" name="criteria" value="{{$viewData->id}}">
                        {{csrf_field()}}
                        <div class="form-group form-group-sm">
                            <label for="title">Title</label>
                            <input type="text" name="name" id="name" value="{{$viewData->name}}"
                                   placeholder="Enter Name" class="form-control">
                            <label for="title"
                                   style="color: red">{{$errors->first('name')}}</label>
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-md-6">
                        <div class="form-group form-group-sm">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone"
                                   value="{{$viewData->phone_no}}" placeholder="Enter Phone"
                                   class="form-control">
                            <label for="title"
                                   style="color: red">{{$errors->first('phone')}}</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="form-group form-group-sm">
                            <label for="add1">State</label>
                            <select name="add1[]" id="add1" class="form-control">
                                @for($x = 1; $x <= 12; $x++)
                                    <option value="{{$x}}"> {{$viewData->add1}}</option>
                                @endfor
                            </select>
                            <label for="title"
                                   style="color: red">{{$errors->first('add1')}}</label>
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-md-6">
                        <div class="form-group form-group-sm">
                            <label for="add2">City</label>
                            <select name="add2[]" id="add2" class="form-control">
                                @for($x = 1; $x <= 12; $x++)
                                    <option value="{{$x}}"> {{$viewData->add2}}</option>
                                @endfor
                            </select>
                            <label for="title"
                                   style="color: red">{{$errors->first('add2')}}</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="form-group form-group-sm">
                            <label for="add3">Area</label>
                            <select name="add3[]" id="add3" class="form-control">
                                @for($x = 1; $x <= 12; $x++)
                                    <option value="{{$x}}"> {{$viewData->add3}}</option>
                                @endfor
                            </select>
                            <label for="title"
                                   style="color: red">{{$errors->first('add3')}}</label>
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-md-6">
                        <div class="form-group form-group-sm">
                            <label for="add4">Address</label>
                            <input type="text" name="add4" id="add4" value="{{$viewData->add4}}"
                                   placeholder="Enter Address" class="form-control">
                            <label for="title"
                                   style="color: red">{{$errors->first('add4')}}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group form-group-sm">
                    <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp; Save
                        Changes
                    </button>

                </div>
            </div>
        </div>
        <!-- Body Ends -->
    </form>
    <!-- Modal - Edit Ends -->

@stop
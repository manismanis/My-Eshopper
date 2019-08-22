@extends('frontend.master.master-user')

@section('content')
    <div class="left_col scroll-view">
        <div class="col-sm-12 col-md-12">
            <div><strong><a href="{{route('manage-account')}}">Manage Account</a></strong> / Address</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @include('backend.layouts.messages')
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Address</th>
                            <th>Is Preferred</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th width="65px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($viewData as $key => $value)
                            <tr>
                                <td>
                                    {{++$key}}
                                </td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->phone_no}}</td>
                                <td>{{$value->add1}}</td>
                                <td>{{$value->add2}}</td>
                                <td>{{$value->add3}}</td>
                                <td>{{$value->add4}}</td>
                                <td>
                                    @if($value->isPreferred==1)
                                        <button name="active" class="btn btn-success btn-xs"><i class="fa fa-check"></i>
                                        </button>
                                    @else
                                        <button name="inactive" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-times"></i></button>
                                    @endif
                                </td>
                                <td>{{$value->created_at->diffForHumans()}}</td>
                                <td>{{$value->updated_at->diffForHumans()}}</td>

                                <td>
                                    <a href="" type="button"
                                       class="btn btn-success btn-xs editbtn" data-toggle="modal"
                                       data-target="#edit_Address" title="Edit"><i
                                                class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete ??')"
                                       href="{{route('delete-user-address', ['id' => $value->id])}}"
                                       class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-close"></i>X</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_Address">
                + Add New
            </button>

            <!-- Modal - Add -->
            <form action="{{route('user-address')}}" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="add_Address" tabindex="-1" role="dialog" aria-labelledby="add_AddressLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_AddressLabel">Add User Address</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Body Starts -->
                                <div class="row">
                                    @include('backend.layouts.messages')
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group form-group-sm col-sm-6">
                                                {{csrf_field()}}
                                                <div class="form-group form-group-sm">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="name" value="{{old('name')}}"
                                                           placeholder="Enter Name" class="form-control">
                                                    <label for="title"
                                                           style="color: red">{{$errors->first('name')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" value="{{old('phone')}}"
                                                           placeholder="Enter Phone" class="form-control">
                                                    <label for="title"
                                                           style="color: red">{{$errors->first('phone')}}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group form-group-sm col-sm-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="add1">State</label>
                                                    <select name="add1[]" class="form-control">
                                                        @for($x = 1; $x <= 12; $x++)
                                                            <option value="{{$x}}"> {{$x}}</option>
                                                        @endfor
                                                    </select>
                                                    <label for="title"
                                                           style="color: red">{{$errors->first('add1')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="add2">City</label>
                                                    <select name="add2[]" class="form-control">
                                                        <option selected disabled value="">Select City</option>
                                                        <option value="Kathmandu">Kathmandu</option>
                                                        <option value="Bhaktapur">Bhaktapur</option>
                                                        <option value="Lalitpur">Lalitpur</option>
                                                        <option value="Banepa">Banepa</option>
                                                        {{--@for($x = 1; $x <= 12; $x++)--}}
                                                        {{--<option value="{{$x}}"> {{$x}}</option>--}}
                                                        {{--@endfor--}}
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
                                                    <input name="add3" type="text" placeholder="Put the area you stay"
                                                           class="form-control">
                                                    <label for="title"
                                                           style="color: red">{{$errors->first('add3')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="add4">Address</label>
                                                    <input type="text" name="add4" value="{{old('add4')}}"
                                                           placeholder="Enter Address" class="form-control">
                                                    <label for="title"
                                                           style="color: red">{{$errors->first('add4')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm col-md-6">
                                                <label>
                                                    IS PREFERRED &nbsp;<input name="isPreferred" type="checkbox"
                                                                              class="js-switch" checked/>
                                                </label>
                                                <label for="title"
                                                       style="color: red">{{$errors->first('isPreferred')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Body Ends -->
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp; Save
                                    Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal - Add Ends -->

            <!-- Modal - Edit -->
            <form action="{{route('edit-user-address-action')}}" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="edit_Address" tabindex="-1" role="dialog" aria-labelledby="add_AddressLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_AddressLabel">Edit User Address</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Body Starts -->
                                <div class="row">
                                    @include('backend.layouts.messages')
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group form-group-sm col-sm-6">
                                                <input type="hidden" id="id" name="id">
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <div class="form-group form-group-sm">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="name" id="name" value=""
                                                           placeholder="Enter Name" class="form-control">
                                                    <label for="title"
                                                           style="color: red">{{$errors->first('name')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" id="phone"
                                                           value="" placeholder="Enter Phone"
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
                                                            <option value="{{$x}}"></option>
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
                                                            <option value="{{$x}}"></option>
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
                                                    <input type="text" placeholder="Put your address here"
                                                           class="form-control">
                                                    <label for="title"
                                                           style="color: red">{{$errors->first('add3')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="add4">Address</label>
                                                    <input type="text" name="add4" id="add4" value=""
                                                           placeholder="Enter Address" class="form-control">
                                                    <label for="title"
                                                           style="color: red">{{$errors->first('add4')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp;
                                                Save
                                                Changes
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Body Ends -->
            </form>
            <!-- Modal - Edit Ends -->
        </div>
    </div>

@stop
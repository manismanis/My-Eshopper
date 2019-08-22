@extends('frontend.master.master-user')

@section('content')
    <div class="left_col scroll-view">
        <div class="col-sm-12 col-md-12">
            <div><strong><a href="{{route('manage-account')}}">Manage Account</a></strong> / Payment Options</div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    @include('backend.layouts.messages')
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Options</th>
                            <th>Details</th>
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
                                <td>{{$value->PaymentMethod->title}}</td>
                                <td>
                                    @if($value->payment_method_id==1)
                                        Cash pay On Delivery
                                    @else
                                        <strong>{{$value->payment_method_title}} [{{$value->payment_method_no}}]</strong><br>
                                        {{$value->payment_method_details}}
                                    @endif
                                </td>
                                <td>
                                    @if($value->isPreferred==1)
                                        <button name="active" class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    @else
                                        <button name="inactive" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                                    @endif
                                </td>
                                <td>{{$value->created_at->diffForHumans()}}</td>
                                <td>{{$value->updated_at->diffForHumans()}}</td>

                                <td>
                                    <a type="button" class="btn btn-success btn-xs tooltip-test" title="Edit" data-toggle="modal" data-target="#edit_Address"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete ??')" href="{{route('delete-user-payment-options', ['id' => $value->id])}}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-close"></i>X</a>
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
            <form action="{{route('user-payment-options')}}" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="add_Address" tabindex="-1" role="dialog" aria-labelledby="add_AddressLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="add_AddressLabel">Add User Payment Options</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Body Starts -->
                                <div class="row">
                                    @include('backend.layouts.messages')
                                    <div class="col-md-12">
                                        <div class="form-group form-group-sm">
                                            {{csrf_field()}}
                                            <label for="paymentMethods">Select Payment Methods</label>
                                            <select name="paymentMethods[]" id="paymentMethods" class="form-control">
                                                <option value=""> ---- Select Payment Methods</option>
                                                @foreach(\App\PaymentMethods::all() as $key => $value)
                                                    <option value="{{$value->id}}">{{ucfirst($value->title)}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="form-group form-group-sm col-sm-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="name">Payment Gateway Name</label>
                                                    <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="eg. eSewa, Khalti, Visa Card.." class="form-control">
                                                    <label for="title" style="color: red">{{$errors->first('name')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="no">No</label>
                                                    <input type="text" name="no" id="no" value="{{old('no')}}" placeholder="Name No." class="form-control">
                                                    <label for="title" style="color: red">{{$errors->first('no')}}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="details">Details</label>
                                            <textarea name="details" id="details" cols="30" rows="5" value="{{old('details')}}" placeholder="Details.." class="form-control"></textarea>
                                            <label for="title" style="color: red">{{$errors->first('details')}}</label>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label>
                                                IS PREFERRED &nbsp;<input name="isPreferred" type="checkbox" class="js-switch" checked />
                                            </label>
                                            <label for="title" style="color: red">{{$errors->first('isPreferred')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Body Ends -->
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp; Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal - Add Ends -->

            <!-- Modal - Add -->
            <form action="{{route('user-payment-options')}}" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="edit_Address" tabindex="-1" role="dialog" aria-labelledby="edit_AddressLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit_AddressLabel">Edit User Payment Option</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Body Starts -->
                                <div class="row">
                                    @include('backend.layouts.messages')
                                    <div class="col-md-12">
                                        <div class="form-group form-group-sm">
                                            {{csrf_field()}}
                                            <label for="paymentMethods">Select Payment Methods</label>
                                            <select name="paymentMethods[]" id="paymentMethods" class="form-control">
                                                <option value=""> ---- Select Payment Methods</option>
                                                @foreach(\App\PaymentMethods::all() as $key => $value)
                                                    <option value="{{$value->id}}">{{ucfirst($value->title)}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="form-group form-group-sm col-sm-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="name">Payment Gateway Name</label>
                                                    <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="eg. eSewa, Khalti, Visa Card.." class="form-control">
                                                    <label for="title" style="color: red">{{$errors->first('name')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-sm col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="no">No</label>
                                                    <input type="text" name="no" id="no" value="{{old('no')}}" placeholder="Name No." class="form-control">
                                                    <label for="title" style="color: red">{{$errors->first('no')}}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="details">Details</label>
                                            <textarea name="details" id="details" cols="30" rows="5" value="{{old('details')}}" placeholder="Details.." class="form-control"></textarea>
                                            <label for="title" style="color: red">{{$errors->first('details')}}</label>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label>
                                                IS PREFERRED &nbsp;<input name="isPreferred" type="checkbox" class="js-switch" />
                                            </label>
                                            <label for="title" style="color: red">{{$errors->first('isPreferred')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Body Ends -->
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp; Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal - Edit Ends -->
        </div>
    </div>
@stop
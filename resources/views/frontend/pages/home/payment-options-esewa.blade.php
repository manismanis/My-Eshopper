@extends('frontend.master.master-none')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-1">
                <a href="http://esewa.com.np"><img src="{{url('uploads/images/extra/eSewa.png')}}" alt=""/></a>
                <hr>
                <div class="col-sm-12 col-md-12">
                    <div class="row">
                        @include('backend.layouts.messages')
                        <form action="{{route('payment-options-esewa')}}" method="post" enctype="multipart/form-data">
                            <div class="col-md-9">
                                {{csrf_field()}}
                                <div class="form-group form-group-sm">
                                    <label for="title">Title</label>
                                    <input type="text" name="name" id="name" value="" placeholder="Enter eSewa Name" class="form-control">
                                    <label for="title" style="color: red">{{$errors->first('name')}}</label>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="no">No.</label>
                                    <input type="text" name="no" id="no" value="" placeholder="Enter eSewa No." class="form-control">
                                    <label for="title" style="color: red">{{$errors->first('no')}}</label>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label for="no">Transaction Amount.</label>
                                    <input type="text" name="amount" id="amount" readonly value="{{\Illuminate\Support\Facades\Session::has('cart') ? \Illuminate\Support\Facades\Session::get('cart')->totalPrice : ''}}" class="form-control">
                                    <label for="title" style="color: red">{{$errors->first('amount')}}</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="ln_solid"></div>
                                <div class="form-group form-group-sm">
                                    <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp; Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div class="left_col scroll-view">

    </div>
@stop
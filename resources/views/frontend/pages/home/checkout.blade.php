@extends('frontend.master.master-none')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('cart'))
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h4>Checkout</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7 col-md-7">
                    <!-- Part A Starts -->
                    <ul class="list-group">
                        @foreach($items as $item)
                            <li class="list-group-item">
                                <span class="badge">{{$item['qty']}}</span>
                                <img src="{{url('public/lib/uploads/items/' . $item['item']['image'])}}" width="50px" alt=""/>
                                <strong>{{$item['item']['title']}}</strong>
                                <span class="label label-success">{{$item['price']}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <strong>Total : {{$totalPrice}}</strong><br>
                    <br><br>
                    <!-- Part A Ends -->
                </div>
                <div class="col-sm-5 col-md-5">
                    <!-- Part B Starts -->
                    <form action="{{route('checkout-proceed')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="userAddressId" id="userAddressId" value="{{$viewData_UserAddress->id == null ? '': $viewData_UserAddress->id}}">
                        <input type="hidden" name="userPaymentOptionId" id="userPaymentOptionId" value="{{$viewData_UserPreferredPaymentOption->id == null ? '' : $viewData_UserPreferredPaymentOption->id}}">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div>
                                    <h4>Shipping Details</h4>
                                    <div class="row">
                                        <div class="col-sm-1 pull-left"><i class="fa fa-user"></i></div>
                                        <div class="col-sm-11">
                                            <strong>{{$viewData_UserAddress->name}}</strong><span class="pull-right"><a href="{{route('user-address')}}">Edit</a></span><br>
                                            <span class="text-muted">
                                                {{$viewData_UserAddress->add4 . ', ' . $viewData_UserAddress->add3 . ', ' . $viewData_UserAddress->add2}}<br>
                                                {{$viewData_UserAddress->add1}}<br>
                                                {{$viewData_UserAddress->phone_no}}<br>
                                            </span>
                                        </div>
                                        <!-- Row 2 -->
                                        <div class="col-sm-1 pull-left"><i class="fa fa-phone"></i></div>
                                        <div class="col-sm-11">
                                            {{$viewData_UserProfile->phone_no}}<span class="pull-right"><a href="{{route('user-profile')}}">Edit</a></span><br>
                                        </div>
                                        <!-- Row 3 -->
                                        <div class="col-sm-1 pull-left"><i class="fa fa-envelope"></i></div>
                                        <div class="col-sm-11">
                                            {{$viewData_UserProfile->email}}<span class="pull-right"><a href="{{route('user-profile')}}">Edit</a></span><br>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div>
                                    <textarea name="SpecialNotes" id="SpecialNotes" cols="30" rows="5" placeholder="Notes about your order, Special notes for Delivery"></textarea>
                                    <hr>
                                    <h4>Order Summary</h4>
                                    <?php $shippingCharge = 0 ?>
                                    <span class="text-muted">Subtotal</span> <span class="pull-right">{{$totalPrice}}</span><br>
                                    @if($viewData_UserPreferredPaymentOption != null)
                                        @if($viewData_UserPreferredPaymentOption->payment_method_id==1)
                                            <?php $shippingCharge = 50 ?>
                                            <span class="text-muted">Shipping Charge</span> <span class="pull-right">{{$shippingCharge}}</span><br>
                                        @endif
                                    @endif
                                    <span class="text-warning">Total</span> <span class="pull-right"><strong>{{$totalPrice+=$shippingCharge}}</strong></span><br><br>
                                    <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Place Order</button><br><br>
                                </div>
                            </li>
                        </ul>
                    </form>
                    <!-- Part B Ends -->
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-1">
                <h4>No Items in Cart</h4>
                <hr>
                <div class="logo pull-left">
                    <a href="{{route('index')}}"><img src="{{url('public/lib/home/cart-empty.jpg')}}" alt=""/></a>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-1">
                <br>
                <a href="{{route('products')}}" class="btn btn-default add-to-cart"> Start Shopping</a>
            </div>
        </div>
    @endif
@stop
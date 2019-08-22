@extends('frontend.master.master')
@include('frontend.layouts.footer')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('cart'))
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h4>Cart Details</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7 col-md-7">
                    <!-- Part A Starts -->
                    <ul class="list-group">
                        @foreach($items as $item)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="{{url('uploads/images/items/' . $item['item']['image'])}}"
                                             width="80px" alt=""/>
                                    </div>
                                    <div class="col-sm-7">
                                        <strong>{{$item['item']['title']}}</strong> <br> <span
                                                class="label label-success">{{$item['price']}}</span><br><br>
                                        <a onclick="return confirm('Are you sure to delete Item ??')"
                                           href="" title="Delete Item"
                                           style="text-decoration: none"><span class="label label-danger"><i
                                                        class="fa fa-times-circle"></i> &nbsp;Delete Item</span></a>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="cart_quantity_button pull-right">
                                            <a class="cart_quantity_up"
                                               href=""> <i
                                                        class="fa fa-plus"></i> </a>
                                            <input class="cart_quantity_input" type="text" name="quantity"
                                                   value="{{$item['qty']}}" autocomplete="off" size="2">
                                            <a class="cart_quantity_down"
                                               href=""> <i
                                                        class="fa fa-minus"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                    <strong>Total : {{$totalPrice}}</strong><br>
                    <br><br>
                    <!-- Part A Ends -->
                </div>
                <div class="col-sm-5 col-md-5">
                    <!-- Part B Starts -->
                    <ul class="list-group">
                        <li class="list-group-item">
                            <form action="{{route('checkout')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                    @if(count($viewData_UserAddresses) > 0)
                                        <input type="hidden" name="addId" id="addId"
                                               value="{{$viewData_UserPreferredPaymentOption->id}}">
                                        <div>
                                            <span class="text-muted">Delivery Location</span><br>
                                            <div class="row">
                                                <div class="col-sm-1 pull-left"><i class="fa fa-location-arrow"></i>
                                                </div>
                                                <div class="col-sm-11">
                                                    @foreach(\App\UserAddress::GetUserAddressList(\Illuminate\Support\Facades\Auth::user()->id) as $key => $value)
                                                        <input type="radio" name="UserPaymentAddress"
                                                               id="UserPaymentAddress"
                                                               onchange="document.getElementById('addId').value = '{{$value->id}}'" {{$value->isPreferred ? 'checked' : ''}}>
                                                        {{$value->add1 . ', ' . $value->add2 . ', ' . $value->add3 . ', ' . $value->add4}}
                                                        <span class="pull-right"><a href="{{route('user-address')}}">Change</a></span>
                                                        <br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    @endif
                                @endif
                                <div>
                                    <h4>Summary</h4>
                                    <?php $shippingCharge = 0 ?>
                                    @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                        <span class="text-muted">Subtotal</span> <span
                                                class="pull-right">{{$totalPrice}}</span><br>
                                        @if(count($viewData_UserPaymentOptions) == 0)
                                            <?php $shippingCharge = 0 ?>
                                            <span class="text-muted">No Payment Options Defined</span> <span
                                                    class="pull-right"><a
                                                        href="{{route('user-payment-options')}}">Add</a></span><br>
                                            <br>
                                        @else
                                            <span class="text-muted">Payment Options</span>
                                            <span class="pull-right">
                                                <select name="UserPaymentMethod[]" id="UserPaymentMethod" class=""
                                                        style="width: 150px">
                                                    @foreach($viewData_UserPaymentOptions as $key => $value)
                                                        <option value="{{$value->id}}" {{$value->isPreferred ? 'selected' : ''}}> {{$value->PaymentMethod->title}}</option>
                                                    @endforeach
                                                </select>
                                            </span><br><br>
                                            <?php $shippingCharge = 0 ?>
                                        <!-- 1. Cash in Delivery Only -->
                                            @if($viewData_UserPreferredPaymentOption->payment_method_id == 1)
                                                <?php $shippingCharge = 50 ?>
                                                <span class="text-muted">Shipping Charge</span> <span
                                                        class="pull-right">{{$shippingCharge}}</span><br><br>
                                            @endif
                                        @endif
                                    @endif
                                    <span class="text-warning">Total</span> <span
                                            class="pull-right"><strong>{{$totalPrice+=$shippingCharge}}</strong></span><br><br>
                                    <button class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Checkout</button>
                                    <br><br>
                                </div>
                            </form>
                        </li>
                    </ul>
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
                    <a href="{{route('index')}}"><img src="{{url('uploads/images/extra/cart-empty.jpg')}}" alt=""/></a>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-1">
                <br>
                <a href="" class="btn btn-default add-to-cart"> Start Shopping</a>
            </div>
        </div>
    @endif
@stop
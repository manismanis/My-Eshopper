@extends('frontend.master.master')




@section('content')
    <div class="col-sm-9 padding-right">
        @include('backend.layouts.messages')


        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{url('uploads/images/items/'.$itemDetailData->image)}}" alt=""/>

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    {{--<!-- Wrapper for slides -->--}}
                    {{--<div class="carousel-inner">--}}
                    {{--<div class="item active">--}}
                    {{--<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>--}}
                    {{--<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>--}}
                    {{--<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                    {{--<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>--}}
                    {{--<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>--}}
                    {{--<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                    {{--<a href=""><img src="images/product-details/similar1.jpg" alt=""></a>--}}
                    {{--<a href=""><img src="images/product-details/similar2.jpg" alt=""></a>--}}
                    {{--<a href=""><img src="images/product-details/similar3.jpg" alt=""></a>--}}
                    {{--</div>--}}

                    {{--</div>--}}


                </div>

            </div>
            <div class="col-sm-7">
                <form action="{{route('add-to-cart')}}" name="addtocartForm" id="addtocartForm" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="item_id" value="{{$itemDetailData->id}}">
                    {{--this line of code is useful for those tags where name can not be defined for example price, itemname--}}
                    <input type="hidden" name="itemname" value="{{$itemDetailData->itemname}}">
                    <input type="hidden" name="size" value="{{$itemDetailData->size}}">
                    <input type="hidden" name="price" value="{{$itemDetailData->price}}">

                    <div class="product-information"><!--/product-information-->
                        <h2>Product : {{$itemDetailData->itemname}}</h2>
                        <p>
                            <select name="size" id="size" style="width:auto">
                                <option value="" selected disabled> Select Size</option>
                                @foreach($itemDetailData->ItemAttribute as $attribute)
                                    <option value="{{$attribute->size}}">{{$attribute->size}}</option>
                                @endforeach
                            </select>
                            <a href="" style="color: red">{{$errors->first('size')}}</a>
                        </p>
                        <img src="images/product-details/rating.png" alt=""/>
                        <span>
									<span>RS. {{$itemDetailData->price}}</span>
									<label>Quantity:</label>

									<input type="number" name="quantity" value="1">
                            <a href="" style="color: red">{{$errors->first('quantity')}}</a>

                            @if($total_stock>0)
                                <button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
                            @endif

								</span>
                        <p><b>Availability:</b> @if($total_stock>0)In Stock @else Out Of Stock @endif</p>
                        <p><b>Condition:</b> New</p>
                        <p><b>Brand:</b> E-SHOPPER</p>
                        <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""/></a>
                    </div><!--/product-information-->
                </form>
            </div>
        </div><!--/product-details-->


    </div>






@endsection
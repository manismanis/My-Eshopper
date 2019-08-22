@extends('frontend.master.master')
@include('frontend.layouts.sidebar')

@section('content')
    <div class="col-sm-9 padding-right">
        @include('backend.layouts.messages')


        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{url('uploads/images/items/'.$itemDetailData->image)}}" alt=""
                         class="img-responsive thumbnail" style="height: 350px" width="100px">

                </div>
            </div>
            <div class="col-sm-7">
                <form action="{{route('add-to-cart', ['id' => $itemDetailData->id])}}" name="addtocartForm"
                      id="addtocartForm" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="item_id" value="{{$itemDetailData->id}}">
                    {{--this line of code is useful for those tags where name can not be defined for example price, itemname--}}
                    <input type="hidden" name="itemname" value="{{$itemDetailData->itemname}}">
                    <input type="hidden" name="size" value="{{$itemDetailData->size}}">
                    <input type="hidden" name="price" value="{{$itemDetailData->price}}">

                    <div class="product-information"><!--/product-information-->
                        <h4>Product : {{$itemDetailData->itemname}}</h4>
                        <div class="row">
                            <div class="form-group form-group-sm col-md-2">
                                <p>
                                    <select name="size" id="size" style="width:auto">
                                        <option value="" selected disabled> Select Size</option>
                                        @foreach($itemDetailData->ItemAttribute as $attribute)
                                            <option value="{{$attribute->size}}">{{$attribute->size}}</option>
                                        @endforeach
                                    </select>
                                    <a href="" style="color: red">{{$errors->first('size')}}</a>
                                </p>
                            </div>
                            <div class="form-group form-group-sm col-md-offset-4">

                                <p>
                                    <select name="color" id="color" style="width:auto">
                                        <option value="" selected disabled> Select Color</option>
                                        @foreach($itemDetailData->ItemAttribute as $attribute)
                                            <option value="{{$attribute->size}}">{{$attribute->color}}</option>
                                        @endforeach
                                    </select>
                                    <a href="" style="color: red">{{$errors->first('color')}}</a>
                                </p>

                            </div>
                        </div>

                        <span>
									<span>RS. {{$itemDetailData->price}}</span>
									<label>Quantity:</label>

									<input type="number" name="quantity" value="1">
                            <a href="" style="color: red">{{$errors->first('quantity')}}</a>

								</span>
                        <p><b>Availability:</b> @if($total_stock>0)In Stock @else Out Of Stock @endif</p>
                        <p><b>Condition:</b> New</p>
                        <p><b>Brand:</b> {{$itemDetailData->brand->brandname}}</p>
                        <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""/></a>

                        @if($total_stock>0)
                            <div class="row">
                                <div class="form-group form-group-sm">
                                    <button type="submit" class="btn btn-default cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </div>
                                @endif
                            </div>
                    </div>
                </form>
            </div>
        </div><!--/product-details-->


    </div>






@endsection
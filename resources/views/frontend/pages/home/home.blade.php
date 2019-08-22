<?php

use App\Item;

?>
@extends('frontend.master.master')
@include('frontend.layouts.slider')
@include('frontend.layouts.sidebar')
@include('frontend.layouts.footer')

@section('content')


    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Featured Items</h2>
            @foreach ($itemData as $key => $item)
                @if ($item->isFeatured == 1)
                    <div class="col-sm-4" style="width: 248px">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{url('uploads/images/items/' . $item->image) }}"
                                         alt="" style="margin-top: 23px">
                                    <h2>RS {{$item->price}}</h2>
                                    <p>{{$item->itemname}}</p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <img src="{{url('uploads/images/items/'.$item->image)}}" height="180"
                                             width="212px" alt=""/>
                                        <h4>RS.{{$item->price}}</h4>
                                        <p>{{$item->itemname}}</p>
                                        <a href="{{route('item-detail',$item->id)}}"
                                           class="btn btn-default btn-xs add-to-cart"><i
                                                    class="fa fa-eye"></i>View Item</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div><!--features_items-->
        {{$itemData->links()}}

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach ($itemData as $key => $item)
                            @if ($item->isRecommended == 1)
                                <div class="col-sm-4" style="width: 248px">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{url('uploads/images/items/' . $item->image) }}"
                                                     width="5000" alt=""/>
                                                <h2>RS.{{$item->price}}</h2>
                                                <p>{{$item->itemname}}</p>
                                                <a href="{{route('item-detail',$item->id)}}"
                                                   class="btn btn-default add-to-cart"><i
                                                            class="fa fa-eye"></i>View Item</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel"
                   data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel"
                   data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>


    {{--to keep sidebar in correct position--}}
    </div>
    </div>
    </div>
    </section>






@endsection
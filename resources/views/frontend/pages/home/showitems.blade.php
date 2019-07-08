@extends('frontend.master.master')
@include('frontend.layouts.sidebar')

@section('content')

    {{--displaying the related items--}}
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <?php
            if ($byCategory != "") {
                $itemData = $showItems;
                echo '<h2 class="title text-center">SubCategory : ' . $byCategory->subcat_name . '</h2>';
            }
            ?>
            @foreach($itemData as $item)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{url('uploads/images/items/' . $item->image) }}"
                                     class="img-responsive thumbnail" alt=""/>
                                <h2>RS.{{$item->price}}</h2>
                                <p>{{$item->itemname}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add
                                    to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>RS.{{$item->price}}</h2>
                                    <p>{{$item->itemname}}</p>
                                    <a href="{{route('item-detail',$item->id)}}"
                                       class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Item</a>
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

            @endforeach


        </div>
    </div>

@endsection
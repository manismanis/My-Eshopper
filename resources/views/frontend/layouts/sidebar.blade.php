{{--@section('sidebar')--}}
    {{--<section>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-3">--}}
                    {{--<div class="left-sidebar">--}}
                        {{--<h2>Category</h2>--}}

                        {{--<div class="panel-group category-products" id="accordian"><!--category-productsr-->--}}


                            {{--<div class="panel panel-default">--}}
                                {{--@foreach($catData as $cat)--}}

                                    {{--<div class="panel-heading">--}}
                                        {{--<h4 class="panel-title">--}}
                                            {{--<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">--}}
                                                {{--<span class="badge pull-right"><i class="fa fa-plus"></i></span>--}}
                                                {{--{{$cat->cat_name}}--}}
                                            {{--</a>--}}
                                        {{--</h4>--}}
                                    {{--</div>--}}
                                    {{--<div id="{{$cat->id}}" class="panel-collapse collapse">--}}
                                        {{--<div class="panel-body">--}}
                                            {{--<ul>--}}
                                                {{--@foreach($cat->subcategory as $subcat)--}}
                                                    {{--<li>--}}
                                                        {{--<a href="{{route('showitems',$subcat->subcat_id)}}">{{$subcat->subcat_name}} </a>--}}
                                                    {{--</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div><!--/category-products-->--}}

                        {{--<div class="brands_products"><!--brands_products-->--}}
                            {{--<h2>Brands</h2>--}}
                            {{--<div class="brands-name">--}}
                                {{--@foreach($brandData as $key=>$brand)--}}

                                    {{--<ul class="nav nav-pills nav-stacked">--}}
                                        {{--<li><a href="#"> <span class="pull-right"></span>{{$brand->brandname}}</a>--}}
                                        {{--</li>--}}

                                    {{--</ul>--}}
                                {{--@endforeach--}}

                            {{--</div>--}}
                        {{--</div><!--/brands_products-->--}}

                        {{--<div class="price-range"><!--price-range-->--}}
                            {{--<h2>Price Range</h2>--}}
                            {{--<div class="well text-center">--}}
                                {{--<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"--}}
                                       {{--data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>--}}
                                {{--<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>--}}
                            {{--</div>--}}
                        {{--</div><!--/price-range-->--}}

                        {{--<div class="shipping text-center"><!--shipping-->--}}
                            {{--<img src="images/home/shipping.jpg" alt=""/>--}}
                        {{--</div><!--/shipping-->--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

{{--@endsection--}}
@section('slider')

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">

                            @foreach($sliderData as $key=>$value)
                                @if($key==0)
                                    <li data-target="#slider-carousel" data-slide-to="{{$key}}" class="active"></li>
                                @else
                                    <li data-target="#slider-carousel" data-slide-to="{{$key}}"></li>
                                @endif
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach($sliderData as $key=>$slider)
                                @if($key==0)
                                    <div class="item active">
                                        <div class="col-sm-6">
                                            <h1><span>E</span>-SHOPPER</h1>
                                            <h2>{{ucfirst($slider->title)}}</h2>
                                            <p>
                                                {{string_limit(strip_tags($slider->description),100)}}
                                            </p>
                                            <button type="button" class="btn btn-default get">Get it now</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{url('uploads/images/sliders/'.$slider->image)}}" alt=""
                                                 class="img-responsive" style="margin-top: 0px">
                                        </div>
                                    </div>
                                @else
                                    <div class="item">
                                        <div class="col-sm-6">
                                            <h1><span>E</span>-SHOPPER</h1>
                                            <h2>{{$slider->title}}</h2>
                                            <p>
                                                {{string_limit(strip_tags($slider->description),100)}}

                                            </p>
                                            <button type="button" class="btn btn-default get">Get it now</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{url('uploads/images/sliders/' . $slider->image)}}"
                                                 class="girl img-responsive" alt=""/>
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->
@endsection
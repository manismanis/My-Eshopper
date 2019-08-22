@extends('frontend.master.master-user')

@section('content')
    <div class="left_col scroll-view">
        <div class="col-sm-12 col-md-12">
            <div><strong>Manage Account</strong></div>
            <hr>
            <div class="row">

                <!-- 1 -->
                <div class="col-sm-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div><strong>Profile</strong> | <a href="">Edit</a></div><br>
                            <span>{{Auth::user()->name}}</span><br>
                            <span>{{strtoupper(Auth::user()->gender)}}</span><br>
                            <span>{{Auth::user()->phone_no}}</span><br>
                            <span>{{Auth::user()->email}}</span><br>
                        </li>
                    </ul>
                </div>
                <!-- 2 -->
                <div class="col-sm-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div><strong>Address Book</strong> | <a href="">Edit</a></div><br>
                            <span>Kopundole -1</span><br>
                            <span>Lalitpur</span><br>
                            <span>Kathmandu, Nepal</span><br>
                        </li>
                    </ul>
                </div>
                <!-- 3 -->
                <div class="col-sm-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div><strong>Payment Options</strong> | <a href="">Edit</a></div><br>
                            {{--<ul>--}}
                                {{--@foreach(\App\UserPaymentMethods::GetUserPaymentOptionsList(Auth::user()->id) as $key => $value)--}}
                                    {{--<li>--}}
                                        {{--@if($value->payment_method_id==1)--}}
                                            {{--{{++$key}}. Cash pay On Delivery <strong>{{$value->isPreferred == 1 ? '*' : ''}}</strong>--}}
                                        {{--@else--}}
                                            {{--{{++$key}}. {{$value->payment_method_title}} <strong>{{$value->isPreferred == 1 ? '*' : ''}}</strong>--}}
                                        {{--@endif--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
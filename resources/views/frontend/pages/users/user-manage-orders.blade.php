@extends('frontend.master-user')

@section('content')
    <div class="left_col scroll-view">
        <div class="col-sm-12 col-md-12">
            <div><strong>Orders</strong></div>
            <hr>
            <div class="row">
                <!-- 1 -->
                <div class="col-sm-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div><strong>Orders</strong> | <a href="{{route('user-profile')}}">Cancel</a></div><br>
                            <span>History</span><br>
                        </li>
                    </ul>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
@stop
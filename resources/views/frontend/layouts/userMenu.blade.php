@section('userMenu')
    Hello, <a
            href="{{route('user-profile')}}">{{\Illuminate\Support\Facades\Auth::guard('web')->check() ? \Illuminate\Support\Facades\Auth::user()->name : 'guest'}}</a>
    <br><br>
    <div>
        <p>
            <strong><a data-toggle="collapse" href="#Account">Manage Account</a></strong>
        </p>
        <div class="" id="Account">
            <div class="card card-body">
                <li><a href="{{route('user-profile')}}">Profile</a></li>
                <li><a href="{{route('user-address')}}">Address</a></li>
                <li><a href="{{route('user-payment-options')}}">Payment Options</a></li>
            </div>
        </div>
    </div>
    <br>

    <div>
        <p>
            <strong><a data-toggle="collapse" href="#Orders">Orders</a></strong>
        </p>
        <div class="" id="Orders">
            <div class="card card-body">
                <li><a href="">Orders</a></li>
                <li><a href="#">Cancellations</a></li>
            </div>
        </div>
    </div>
    <br>

    <div>
        <p>
            <strong><a data-toggle="collapse" href="#Reviews">Reviews</a></strong>
        </p>
    </div>

    <div>
        <p>
            <strong><a data-toggle="collapse" href="#Wishlist">Wishlist</a></strong>
        </p>
    </div>
    <br><br>
@endsection
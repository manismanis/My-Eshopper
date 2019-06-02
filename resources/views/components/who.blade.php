
@if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
    <p class="text-success">
        You are Logged in  [<a href="{{ route('admin-logout') }}">logout</a>]
    </p>
@else
    <p class="text-danger">
        You are Logged out  [<a href="{{ route('admin-login') }}">login</a>]
    </p>
@endif

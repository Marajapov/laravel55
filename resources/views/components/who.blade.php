@if (Auth::guard('web')->check())
<p class="text-success">
    You are logged in as User
</p>
@else
<p class="text-danger">
    You are logged out as a User    
</p>
@endif
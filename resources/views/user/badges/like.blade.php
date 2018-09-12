@if($target_user->id!=\Auth::id())
    {{--判断当前用户是否已经被关注，如果被关注则显示'取消关注'，如果没被关注，则显示'关注'--}}
    @if($target_user->hasFan(\Auth::id()))
        <button style="border:none"class="button red" like-value="1" like-user="{{$user->id}}" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">Unfollow </button>
    @else
        <button style="border:none"class="button red" like-value="0" like-user="{{$user->id}}" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">Follow</button>
    @endif
@endif
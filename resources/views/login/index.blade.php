@extends("layout.public");

@section('title')
    注册页面
@endsection

@section('sidebar')
@show

@section('container')
    <div class="white-wrap clearfix">
        <div class="col col-4" style="height: 330px"></div>
        <div class="col col-4">
            <div>
                <div>
                    <h3 class="">Please to login</h3>
                </div>
                <div class="form-wrap">
                    <form action="/login" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="" for="">Email address</label>
                            <div class="clearfix"></div>
                            <input style="width:370px;" type="email" name="email" required="" placeholder="Enter email"
                                   value="{{old('email')}}">
                        </div>
                        <br/>
                        <div class="form-group">
                            <label class="" for="">Password</label>
                            <div class="clearfix"></div>
                            <input style="width:370px;" type="password" name="password" required=""
                                   placeholder="Enter pwd">
                        </div>
                        <br/>
                        <div class="form-group">
                            <div>
                                <input id="checkbox" required="" type="checkbox" name="is_remember" value="1" checked>
                                <label for="checkbox"> Keep me logged in</label>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <br/>
                        @include('layout.error')
                        <div style="text-align: center">
                            <button type="submit" class="button purple" style="border:none;margin-right: 30px">Sign in
                            </button>
                            <a href="/register" class="button orange">To register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

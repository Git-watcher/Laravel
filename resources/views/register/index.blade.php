@extends("layout.public")

@section('title')
    注册页面
@endsection

@section('sidebar')
@endsection

@section('container')
    <div class="white-wrap clearfix">
        <div class="col col-4" style="height: 330px"></div>
        <div class="col col-4">
            <div>
                <div>
                    <h3 class="">Please to register</h3>
                </div>
                <div class="form-wrap">
                    <form action="/register" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="" for="">Name</label>
                            <div class="clearfix"></div>
                            <input style="width:370px;" type="text" name="name" required="" id="" placeholder="Name"
                                   value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label class="" for="">Email address</label>
                            <div class="clearfix"></div>
                            <input style="width:370px;" type="email" name="email" required="" id=""
                                   placeholder="Enter email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label class="" for="">Password</label>
                            <div class="clearfix"></div>
                            <input style="width:370px;" type="password" name="password" required="" id=""
                                   placeholder="Enter pwd">
                        </div>
                        <div class="form-group">
                            <label class="" for="">Confirm Password</label>
                            <div class="clearfix"></div>
                            <input style="width:370px;" type="password" name="password_confirmation" required="" id=""
                                   placeholder="Enter pwd">
                        </div>
                        <br/>
                        <div class="form-group">
                            <div>
                                <input id="checkbox_2" required="" type="checkbox">
                                <label for="checkbox_2"> Keep me logged in</label>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <br/>
                        @include('layout.error')
                        <div style="text-align: center">
                            <button type="submit" class="button orange" style="border:none;">register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends("layout.public")

@section('title')
    Setting
@endsection

@section('css')
    <style>#fileinp {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        button {
            border: none;
            height: 30px;
            padding: 0 22px;
            font-size: 14px;
            line-height: 30px;
            vertical-align: middle;
            background-color: #3385FF;
            color: #FFFFFF;
            cursor: pointer;
        }</style>
@endsection
@section('container')
    <div class="white-wrap col col-8 clearfix">
        <div class="col-sm-8 blog-main">
            <form class="form-horizontal" action="/user/{{Auth::id()}}/setting" method="POST"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>User Name</label>
                    <div>
                        <input name="name" type="text" value="{{Auth::user()->name}}" readonly>
                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <label>Email</label>
                    <div>
                        <input name="email" type="email" value="{{Auth::user()->email}}" readonly>
                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <img class="preview_img"
                         src="{{empty(\Auth::user()->photo) ? '/hom/image/init.png'  : \Auth::user()->photo}}" alt=""
                         style="border-radius:50%;">
                </div>
                <label for="fileinp" style="position: relative;">
                    <button type="button">upload</button>
                    <span id="text"
                          style="vertical-align: -2px;font-size: 14px;">Please upload the picture(80*80)</span>
                    <input type="file" id="fileinp" name="photo">
                </label><br/> <br/>
                <button id="Go" type="submit" style="background-color: #CCCCCC;">Save</button>
            </form>
            <br>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $("#fileinp").change(function () {
            $("#text").html($("#fileinp").val());
            if ($("#fileinp").val() != "") {
                $('#Go').css({
                    "background": "#3385FF"
                })
            }
        })
        $('#Go').click(function (ev) {
            if ($("#fileinp").val() == "") {
                ev.preventDefault();//拦截提交
            }
        })
    </script>
@endsection

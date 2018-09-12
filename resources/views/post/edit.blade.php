@extends("layout.public")

@section('title')
    创作园区
@endsection

@section('container')
    <div class="white-wrap col col-8 clearfix">
        <div id="content">
            <form action="/posts/{{$post->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    Title: <br/>
                    <input id="Title" name="title" type="text" placeholder="" size="70" value="{{$post->title}}">
                    <br/>
                    <input id="textarea" name="content" type="hidden">
                </div>
                <br/>
                <div class="form-group">
                    Content: <br/>
                    <div id="editor"></div>
                </div>
                <br/>
                @include("layout.error")
                <button id="submit" type="submit" class="button purple" style="border: none;">Submit</button>
            </form>
            <br/>
        </div>
    </div><!-- /.blog-main -->
@endsection

@section('script')
    <script type="text/javascript" src="/hom/js/wangEditor.min.js"></script>
    <script>
        var E = window.wangEditor;
        var editor = new E('#editor');
        var $content = $('#textarea');
        editor.customConfig.onchange = function (html) {
            $content.val(html)
        };
        editor.create();
        editor.txt.html("{{$post->content}}");
    </script>
@endsection
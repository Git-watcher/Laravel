<!DOCTYPE html>
<html>
<head>

    <title>Josephine - @yield('title')</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="favicon.png.css">
    <link rel="apple-touch-icon" href="apple-touch-icon.png.css">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png.css">
    <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/hom/css/font-awesome.css">
    <link rel="stylesheet" href="/hom/css/plugins.css">
    <link rel="stylesheet" href="/hom/css/main.css">
    <link href="/hom/css/css-family=Roboto-400,300,500,700,900-Montserrat-400,700-Lora-400,400italic,700,700italic.css"
          rel='stylesheet' type='text/css'>
    @yield('css')
    <style>button {
            cursor: pointer;
        }</style>
</head>
<body>

{{--Nav--}}
@include("layout/nav")

@yield('featured')

<div id="main">
    <div class="wrapper clearfix">
        {{--Yield--}}
        @yield('container')
        {{--RIGHT--}}
        @section('sidebar')
            @include("layout/sidebar")
        @show

    </div><!-- .wrapper -->

</div><!-- #main -->

@include("layout/footer")
{{--Footer--}}

<!-- JavaScript -->
<script type="text/javascript" src="/hom/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/hom/js/plugins.js"></script>
<script type="text/javascript" src="/hom/js/main.js"></script>
<script type="text/javascript" src="/hom/js/checkFan.js"></script>
<script>
    setTimeout(function(){
        $('#success').fadeOut();
    },3000)
</script>
@yield('script')
</body>
</html>

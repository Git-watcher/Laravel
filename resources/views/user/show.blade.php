@extends("layout.public")

@section('title')
    个人中心页面
@endsection

@section('container')
    <div class="white-wrap col col-8 clearfix">
        <blockquote>
            <p style="color: #CCCCCC;"><img
                        src="{{empty(\Auth::user()->photo) ? '/hom/image/init.png'  : \Auth::user()->photo}}" alt=""
                        class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}
            </p>
            <footer style="color: #CCCCCC;">Follow：{{$user->stars_count}}｜Fans：{{$user->fans_count}}
                ｜Article：{{$user->posts_count}}</footer>
            @include('user.badges.like',['target_user'=>$user])
        </blockquote>
        <div class="tabs blue">

            <div class="tabs-nav" style="text-align: center">

                <a href="#" class="tab-nav col col-3">Article</a>
                <a href="#" class="tab-nav col col-3">Follow</a>
                <a href="#" class="tab-nav col col-3">Fans</a>

            </div><!-- .tabs-nav -->
            <br/>
            <div class="tabs-content">

                <div class="tab-content">
                    @foreach($posts as $post)
                        <div class="blog-post"
                             style="margin-top: 30px;box-shadow: 0 3px 4px rgba(0,0,0,0.18);padding: 15px; ">
                            <p class=""><a
                                        href="/user/{{$user->id}}/show">{{$post->user->name}}</a> {{$post->created_at}}
                            </p>
                            <p class=""><a href="/posts/{{$post->id}}"> {{$post->title}}</a></p>
                            <p>{!! str_limit( $post->content, 100, '...') !!}</p>
                        </div>
                    @endforeach
                </div><!-- .tab-content -->

                <div class="tab-content">
                    @foreach($susers as $user)
                        <div class="blog-post"
                             style="margin-top: 30px;box-shadow: 0 3px 4px rgba(0,0,0,0.18);padding: 15px;">
                            <p class="">{{$user->name}}</p>
                            <p class="">Follow：{{$user->stars_count}}| Fans：{{$user->fans_count}}｜
                                Article： {{$user->posts_count}}</p>
                            <div>
                                @include('user.badges.like',['target_user'=>$user])
                            </div>
                        </div>
                    @endforeach
                </div><!-- .tab-content -->

                <div class="tab-content">
                    @foreach($fusers as $user)
                        <div class="blog-post"
                             style="margin-top: 30px;box-shadow: 0 3px 4px rgba(0,0,0,0.18);padding: 15px;">
                            <p class="">{{$user->name}}</p>
                            <p class="">Follow：{{$user->stars_count}}| Fans：{{$user->fans_count}}｜
                                Article： {{$user->posts_count}}</p>
                            <div>
                                @include('user.badges.like',['target_user'=>$user])
                            </div>
                        </div>
                    @endforeach
                </div><!-- .tab-content -->

            </div><!-- .tabs-content -->

        </div><!-- .tabs -->
    </div>
@endsection
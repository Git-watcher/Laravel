@extends("layout.public")

@section('title')
    创作园区
@endsection

@section('container')
    <div id="content" class="col col-8">

        <div class="blog-post blog-post-single">

            <div class="blog-post-thumb">
                <img src="/hom/image/placeholder.jpg" alt=""/>
            </div><!-- .blog-post-thumb -->

            <div class="blog-post-main clearfix">

                <div class="blog-post-info">

                    <div class="blog-post-info-inner">

                        <div class="blog-post-title">
                            <h1>{{$post->title}}</h1>
                        </div><!-- .blog-post-title -->
                        {{--添加策略类判断 无权限将不显示编辑--}}
                        @can('update',$post)
                            <a href="/posts/{{$post->id}}/edit">
                                <span class="fa fa-fw fa-edit"></span>
                            </a>
                        @endcan
                        @can('destroy',$post)
                            <a id="delete" href="javascript:;">
                                <span class="fa fa-fw fa-cut"></span>
                            </a>
                        @endcan
                        <div class="blog-post-meta">
                            {{$post->created_at->toFormattedDateString()}} <a href="#"> by {{$post->user->name}}</a>
                        </div><!-- .blog-post-meta -->

                        <div class="blog-post-content">

                            {!!$post->content!!}

                        </div><!-- .dslc-blog-post-content -->
                        <br/>
                        <div>
                            @empty(!\Auth::id())
                                <a id="{{$post->zan(\Auth::id())->exists() ? 'unzan':'zan'}}" href="javascript:;"
                                   type="button"
                                   class="button {{$post->zan(\Auth::id())->exists() ? 'red':'blue'}}">{{$post->zan(\Auth::id())->exists() ? 'Not like':'LIKE'}}</a>
                            @endempty
                        </div>

                    </div><!-- .blog-post-info-inner -->

                </div><!-- .blog-post-info -->

            </div><!-- .blog-post-main -->

        </div><!-- .blog-post -->

        <div class="related-posts white-wrap">

            <div class="section-heading">
                <span class="section-heading-line"></span>
                <span class="section-heading-text">You might also like</span>
            </div><!-- .section-heading -->

            <div class="blog-posts-alt blog-posts-alt-diagonal-effect-enabled clearfix">

                <div class="blog-post-alt carousel-item col col-4">

                    <div class="blog-post-alt-thumb">

                        <div class="blog-post-alt-thumb-inner">
                            <a href="javascript:;"><img src="/hom/image/featured-{{rand(1,6)}}.png" alt=""/></a>
                        </div><!-- .blog-post-alt-thumb-inner -->
                        <div class="blog-post-alt-thumb-cover"></div>

                    </div><!-- .blog-post-alt-thumb -->

                    <div class="blog-post-alt-main">

                        <div class="blog-post-alt-main-inner">

                            <div class="blog-post-alt-date">
                                October 12th, 2015
                            </div><!-- .blog-post-alt-date -->

                            <div class="blog-post-alt-title">
                                <h2><a href="javascript:;">Blog Post Title</a></h2>
                            </div><!-- .blog-post-alt-title -->

                            <div class="blog-post-alt-cat">
                                <a href="javascript:;">Category</a>
                            </div><!-- .blog-post-alt-cat -->

                            <div class="blog-post-alt-read-more">
                                <a href="javascript:;">READ ARTICLE</a>
                            </div><!-- .blog-post-alt-read-more -->

                        </div><!-- .blog-post-alt-main-inner -->

                    </div><!-- .blog-post-alt-main -->

                </div><!-- .blog-post-alt -->

                <div class="blog-post-alt carousel-item col col-4">

                    <div class="blog-post-alt-thumb">

                        <div class="blog-post-alt-thumb-inner">
                            <a href="javascript:;"><img src="/hom/image/featured-{{rand(1,6)}}.png" alt=""/></a>
                        </div><!-- .blog-post-alt-thumb-inner -->
                        <div class="blog-post-alt-thumb-cover"></div>

                    </div><!-- .blog-post-alt-thumb -->

                    <div class="blog-post-alt-main">

                        <div class="blog-post-alt-main-inner">

                            <div class="blog-post-alt-date">
                                October 12th, 2015
                            </div><!-- .blog-post-alt-date -->

                            <div class="blog-post-alt-title">
                                <h2><a href="javascript:;">Blog Post Title</a></h2>
                            </div><!-- .blog-post-alt-title -->

                            <div class="blog-post-alt-cat">
                                <a href="javascript:;">Category</a>
                            </div><!-- .blog-post-alt-cat -->

                            <div class="blog-post-alt-read-more">
                                <a href="javascript:;">READ ARTICLE</a>
                            </div><!-- .blog-post-alt-read-more -->

                        </div><!-- .blog-post-alt-main-inner -->

                    </div><!-- .blog-post-alt-main -->

                </div><!-- .blog-post-alt -->

                <div class="blog-post-alt carousel-item col col-4 col-last">

                    <div class="blog-post-alt-thumb">

                        <div class="blog-post-alt-thumb-inner">
                            <a href="javascript:;"><img src="/hom/image/featured-{{rand(1,6)}}.png" alt=""/></a>
                        </div><!-- .blog-post-alt-thumb-inner -->
                        <div class="blog-post-alt-thumb-cover"></div>

                    </div><!-- .blog-post-alt-thumb -->

                    <div class="blog-post-alt-main">

                        <div class="blog-post-alt-main-inner">

                            <div class="blog-post-alt-date">
                                October 12th, 2015
                            </div><!-- .blog-post-alt-date -->

                            <div class="blog-post-alt-title">
                                <h2><a href="javascript:;">Blog Post Title</a></h2>
                            </div><!-- .blog-post-alt-title -->

                            <div class="blog-post-alt-cat">
                                <a href="javascript:;">Category</a>
                            </div><!-- .blog-post-alt-cat -->

                            <div class="blog-post-alt-read-more">
                                <a href="javascript:;">READ ARTICLE</a>
                            </div><!-- .blog-post-alt-read-more -->

                        </div><!-- .blog-post-alt-main-inner -->

                    </div><!-- .blog-post-alt-main -->

                </div><!-- .blog-post-alt -->

            </div><!-- .blog-posts-alt -->

        </div><!-- .related-posts -->

        <div id="comments">

            <div class="white-wrap">

                <ol class="comments">
                    @foreach($post->comments as $comment)
                        <li class="comment">

                            <span class="comment-author-avatar"><img src="/hom/image/init.png" alt=""/></span>

                            <div class="comment-inner">

                                <div class="comment-info clearfix">

                                    <div class="comment-meta">
                                        <span class="comment-meta-author">{{$comment->user->name}}</span>
                                        <span class="comment-meta-date">{{$comment->created_at}}</span>
                                    </div><!-- .comment-meta -->

                                    <span class="comment-reply">
											<a rel="nofollow" href="#" class="button small red">like</a>
                                </span>

                                </div><!-- .comment-info -->

                                <div class="comment-main">

                                    <p>{{$comment->content}}</p>

                                </div><!-- .comment-main -->

                            </div><!-- .comment-inner -->

                        </li><!-- .comment -->
                    @endforeach
                </ol>

            </div><!-- .white-wrap -->

        </div><!-- #comments -->

        <div id="leave-comment">

            <div class="white-wrap">

                <div class="section-heading">
                    <span class="section-heading-line"></span>
                    <span class="section-heading-text">Leave a comment</span>
                </div><!-- .section-heading -->

                <form form action="/posts/{{$post->id}}/comment" method="post">
                    {{csrf_field()}}
                    <div class="leave-comment-message">
                        <textarea name="content" placeholder="COMMENT" required="" style="resize:none"></textarea>
                    </div><!-- .leave-comment-message -->
                    @include('layout.error')
                    <div class="leave-comment-submit">
                        <input type="submit" id="submit" class="submit" value="SUBMIT YOUR COMMENT"/>
                    </div><!-- .leave-comment-submit -->

                </form>

            </div><!-- .white-wrap -->

        </div><!-- #leave-comment -->

    </div><!-- #content -->
@endsection

@section('script')
    <script>
        $('#delete').click(function () {
            $.post("/posts/{{$post->id}}", {'_token': '{{ csrf_token() }}', '_method': 'DELETE'}, function (data) {
                if (data) {
                    alert('Congratulations');
                    location.href = '{{url('posts')}}'
                }
            })
        })
        $('#zan').click(function () {
            $.get("/posts/{{$post->id}}/zan", (data) => {
                $(this).prop('id', 'unzan').html('Not like').removeClass('blue').addClass('red');
            })
        });
        $('#unzan').click(function () {
            $.get("/posts/{{$post->id}}/unzan", (data) => {
                $(this).prop('id', 'zan').html('LIKE').removeClass('red').addClass('blue');
            })
        });

    </script>
@endsection
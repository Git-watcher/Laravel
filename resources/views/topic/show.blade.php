@extends("layout.public")

@section('title')
    创作园区
@endsection

@section('container')
    <div class="white-wrap col col-8 clearfix">
        <div class="col-sm-8">
            <blockquote>
                <p style="color: #666;">{{$topic->name}}</p>
                <footer style="color: #666;">Article：{{$topic->post_topics_count}}</footer>
            </blockquote>
        </div>
        <div class="tabs blue">

            <div class="tabs-nav" style="text-align: center">

                <a href="#" class="tab-nav col col-4">Article List</a>
                <a href="#" class="tab-nav col col-4">My List</a>

            </div><!-- .tabs-nav -->
            <br/>
            <div class="tabs-content">

                <div class="tab-content">
                    @foreach($posts as $post)
                        <div class="blog-post"
                             style="margin-top: 30px;box-shadow: 0 3px 4px rgba(0,0,0,0.18);padding: 15px; ">
                            <p class=""><a
                                        href="/user/{{$post->user->id}}">{{$post->user->name}}</a> {{$post->created_at}}
                            </p>
                            <p class=""><a href="/posts/{{$post->id}}">{{$post->title}}</a></p>
                            <p>{{$post->content}}</p>
                        </div>
                    @endforeach
                </div><!-- .tab-content -->

                <div class="tab-content">
                    <form action="/topic/{{$topic->id}}/submit" method="post">
                        {{csrf_field()}}
                        @foreach($myposts as $mypost)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="post_ids[]" value="{{$mypost->id}}">
                                    {{$mypost->title}}
                                </label>
                            </div>
                        @endforeach
                        <button style="border:none" type="submit" class="button orange">Contribute Articles</button>
                    </form>
                </div><!-- .tab-content -->
            </div>


        </div>
    </div>
@endsection

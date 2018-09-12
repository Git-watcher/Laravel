<div id="sidebar" class="col col-4 col-last">

    <div class="widget">

        <div class="about-author-widget">

            <div class="about-author-widget-banner">
                <img src="/hom/image/banner.png" alt=""/>
            </div>

            <div class="about-author-widget-avatar">
                <img src="{{empty(\Auth::user()->photo) ? '/hom/image/init.png'  : \Auth::user()->photo}}" alt=""/>
            </div>

            <h2 class="about-author-widget-name">{{Auth::user()->name ?? 'Join in us!'}}</h2>
            <h3 class="about-author-widget-position"></h3>

            <div class="blog-post-tags">
                @if(!empty(\Auth::id()))
                    <a href="/user/{{Auth::id()}}/show">Home</a>
                    <a href="/user/{{Auth::id()}}/setting">Setting</a>
                    <a href="/logout">logout</a>
                @else
                    <a href="/login">login</a>
                @endif
            </div>
            <div class="about-author-widget-text">
                Cras mauris tellus, ultricies quis hendrerit imperdiet, faucibus non nulla cras ex dolor aliquet eget.
            </div>

        </div><!-- .about-author-widget -->

    </div><!-- .widget -->

    <div class="widget">

        <h3 class="widget-title">
            <span class="widget-title-line"></span>
            <span class="widget-title-text">Topics</span>
        </h3>

        <div class="widget-content">
            <div class="tags-cloud-widget">
                @foreach($topics as $topic)
                    <a href="/topic/{{$topic->id}}">{{$topic->name}}</a>
                @endforeach
            </div><!-- .tags-cloud-widget -->
        </div><!-- .widget-content -->

    </div><!-- .widget -->

    <div class="widget">

        <h3 class="widget-title">
            <span class="widget-title-line"></span>
            <span class="widget-title-text">Textual</span>
        </h3>

        <div class="widget-content">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
        </div><!-- .widget-content -->

    </div><!-- .widget -->

    <div class="widget">

        <h3 class="widget-title">
            <span class="widget-title-line"></span>
            <span class="widget-title-text">Recent Posts</span>
        </h3>

        <div class="widget-content">

            <div class="recent-posts-widget">

                <div class="recent-posts-widget-post">

                    <div class="recent-posts-widget-thumb">
                        <a href="javascript:;"><img src="/hom/image/post-1-1.jpg" alt=""/></a>
                    </div><!-- .recent-posts-widget-thumb -->

                    <div class="recent-posts-widget-main">

                        <div class="recent-posts-widget-date">October 7th, 2018</div>
                        <div class="recent-posts-widget-title"><a href="javascript:;">Qui laboriosam est</a></div>
                        <div class="recent-posts-widget-category"><a href="javascript:;">Food</a></div>

                    </div><!-- .recent-posts-widget-main -->

                </div><!-- .recent-posts-widget-post -->

                <div class="recent-posts-widget-post">

                    <div class="recent-posts-widget-thumb">
                        <a href="javascript:;"><img src="/hom/image/post-2-1.jpg" alt=""/></a>
                    </div><!-- .recent-posts-widget-thumb -->

                    <div class="recent-posts-widget-main">

                        <div class="recent-posts-widget-date">October 7th, 2018</div>
                        <div class="recent-posts-widget-title"><a href="javascript:;">Modi accusantium tenetur </a></div>
                        <div class="recent-posts-widget-category"><a href="javascript:;">Photography</a></div>

                    </div><!-- .recent-posts-widget-main -->

                </div><!-- .recent-posts-widget-post -->

                <div class="recent-posts-widget-post">

                    <div class="recent-posts-widget-thumb">
                        <a href="javascript:;"><img src="/hom/image/post-3-1.jpg" alt=""/></a>
                    </div><!-- .recent-posts-widget-thumb -->

                    <div class="recent-posts-widget-main">

                        <div class="recent-posts-widget-date">October 7th, 2018</div>
                        <div class="recent-posts-widget-title"><a href="javascript:;">Dolor cum ratione</a></div>
                        <div class="recent-posts-widget-category"><a href="javascript:;">Fashion</a></div>

                    </div><!-- .recent-posts-widget-main -->

                </div><!-- .recent-posts-widget-post -->

            </div><!-- .recent-posts-widget -->

        </div><!-- .widget-content -->

    </div><!-- .widget -->

</div><!-- #sidebar -->
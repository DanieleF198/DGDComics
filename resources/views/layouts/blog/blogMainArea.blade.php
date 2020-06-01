<!-- blog-main-area-start -->
<div class="blog-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2 mt-sm-50">
                <div class="single-blog mb-50">
                    <div class="blog-left-title">
                        <h3>Search</h3>
                    </div>
                    <div class="side-form">
                        <form action="#">
                            <input type="text" placeholder="Search...." />
                            <a href="#"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                </div>
                <div class="single-blog mb-50">
                    <div class="blog-left-title">
                        <h3>Categories</h3>
                    </div>
                    <div class="blog-side-menu">
                        <ul>
                            <li><a href="#">Creative (2)</a></li>
                            <li><a href="#">Fashion (1)</a></li>
                            <li><a href="#">Image (1) </a></li>
                            <li><a href="#">Photography (1) </a></li>
                            <li><a href="#">Travel (4) </a></li>
                            <li><a href="#">Videos (2) </a></li>
                            <li><a href="#">Economic (2) </a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-blog mb-50">
                    <div class="blog-left-title">
                        <h3>Recent Posts</h3>
                    </div>
                    <div class="blog-side-menu">
                        <ul>
                            <li><a href="#">Blog image post</a></li>
                            <li><a href="#">Post with Gallery</a></li>
                            <li><a href="#">Post with audio</a></li>
                            <li><a href="#">Post with vedio</a></li>
                            <li><a href="#">Post with image</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-blog mb-50">
                    <div class="blog-left-title">
                        <h3>Recent Comments</h3>
                    </div>
                    <div class="blog-side-menu">
                        <ul>
                            <li><a href="#">admin on Maecenas ultricies</a></li>
                            <li><a href="#">admin on Tincidunt malesuada</a></li>
                            <li><a href="#">admin on Rhoncus eleifend</a></li>
                            <li><a href="#">admin on Quisque fringilla</a></li>
                            <li><a href="#">admin on Pellentesque posuere</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-blog mb-50">
                    <div class="blog-left-title">
                        <h3>Archive</h3>
                    </div>
                    <div class="blog-side-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar-o"></i>March 2016 (1)</a></li>
                            <li><a href="#"><i class="fa fa-calendar-o"></i>April 2016 (2)</a></li>
                            <li><a href="#"><i class="fa fa-calendar-o"></i>May 2016 (3)</a></li>
                            <li><a href="#"><i class="fa fa-calendar-o"></i>June 2016 (4)</a></li>
                            <li><a href="#"><i class="fa fa-calendar-o"></i>July 2016 (5)</a></li>
                            <li><a href="#"><i class="fa fa-calendar-o"></i>August 2016 (6)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-blog mb-50">
                    <div class="blog-left-title">
                        <h3>Blog Archive</h3>
                    </div>
                    <div class="catagory-menu" id="cate-toggle">
                        <ul>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Image</a></li>
                            <li><a href="#">Class Master</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Video</a></li>
                            <li><a href="#">Wordpress</a></li>
                        </ul>
                    </div>
                </div>
                <div class="single-blog">
                    <div class="blog-left-title">
                        <h3>Tags</h3>
                    </div>
                    <div class="blog-tag">
                        <ul>
                            <li><a href="#">Asian</a></li>
                            <li><a href="#">Brown</a></li>
                            <li><a href="#">Euro</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Franch</a></li>
                            <li><a href="#">Hat</a></li>
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Teen</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">White</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @php($articles = \App\Http\Controllers\ArticleController::getArticles())
            @if($articles->count() < 1)
                <h4>non ci sono articoli nel blog :(</h4>
            @endif
            @if($articles->count() > 0)
                @foreach($articles as $article)
                    @php($articleAuth = \App\Http\Controllers\UserController::getUserId($article->user_id))
                    @php($articleComments = \App\Http\Controllers\CommentController::getcommentsByArticleId($article->id))
                    <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                        <div class="blog-main-wrapper">
                            <div class="single-blog-post">
                                <div class="author-destils mb-30">
                                    <div class="author-left">
                                        <div class="author-img">
                                            <a href="#"><img src="img/author/1.jpg" alt="man" /></a>
                                        </div>
                                        <div class="author-description">
                                            <p>Pubblicato da:
                                                <a href="#"><span>{{ $articleAuth->username }}</span>in</a>
                                            </p>
                                            <span>{{ substr($article->date, 0,10) }}</span>
                                        </div>
                                    </div>
                                    <div class="author-right">
                                        <span>Condividi: </span>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-img mb-30">
                                    <a href="#"><img src="img/blog/1.jpg" alt="blog" /></a>
                                </div>
                                <div class="single-blog-content">
                                    <div class="single-blog-title">
                                        <h3><a href="#">{{ $article->title }}</a></h3>
                                    </div>
                                    <div class="blog-single-content">
                                        <p>{{ $article->article_text }}</p>
                                    </div>
                                </div>
                                <div class="blog-comment-readmore">
                                    <div class="blog-readmore">
                                        <a href="#">Leggi di più<i class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                    <div class="blog-com">

                                        <a href="#">{{ $articleComments->count() }} commenti</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- blog-main-area-end -->
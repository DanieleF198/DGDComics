<!-- product-main-area-start -->
<div class="product-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-12 order-lg-1 order-1">
                <!-- product-main-area-start -->
                <div class="product-main-area">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="img/thum-2/1.jpg">
                                        @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))
                                        <img src="{{asset('img/comicsImages/' . $image->image_name) }}" alt="woman" />
                                    </li>
                                    <li data-thumb="img/thum-2/4.jpg">
                                        <img src="img/flex/5.jpg" alt="woman" /> <!-- IMMAGINI DA FARE, CI PENSO IO DF-->
                                    </li>
                                    <li data-thumb="img/thum-2/2.jpg">
                                        <img src="img/flex/2.jpg" alt="woman" />
                                    </li>
                                    <li data-thumb="img/thum-2/5.jpg">
                                        <img src="img/flex/5.jpg" alt="woman" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="product-info-main">
                                <div class="page-title">
                                    <h1>{{ $comic->comic_name }}</h1>
                                </div>
                                <div class="product-info-stock-sku">
                                    <span>In stock</span>
                                    <div class="product-attribute">
                                        <span>KSU</span> <!--VENDITORE DA FARE-->
                                        <span class="value">24-WB05</span> <!--NON SO COSA SIA-->
                                    </div>
                                </div>
                                <div class="product-reviews-summary">
                                    <div class="rating-summary">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                    <div class="reviews-actions">
                                        <a href="#">3 Reviews</a>
                                        <a href="#" class="view">Add Your Review</a>
                                    </div>
                                </div>
                                <div class="product-info-price">
                                    <div class="price-final">
                                        <span>$34.00</span>
                                        <span class="old-price">$40.00</span> <!--PREZZO DA FARE-->
                                    </div>
                                </div>
                                <div class="product-add-form">
                                    <form action="#">
                                        <div class="quality-button">
                                            <input class="qty" type="number" value="1">
                                        </div>
                                        <a href="#">Add to cart</a>
                                    </form>
                                </div>
                                <div class="product-social-links">
                                    <div class="product-addto-links">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-pie-chart"></i></a>
                                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                                    </div>
                                    <div class="product-addto-links-text">
                                        <p>{{ $comic->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('layouts.relatedProduct')
        <!-- product-main-area-end -->
        </div>
    </div>
</div>
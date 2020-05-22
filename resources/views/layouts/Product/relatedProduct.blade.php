<!-- new-book-area-start -->

<div class="col-lg-3 col-md-12 col-12 order-lg-2 order-2">
    <div class="shop-left">
        @if($related->count() == 0)
            <div class="left-title mb-20">
                <h4>Non ci sono Correlati</h4>
            </div>
        @else
            <div class="left-title mb-20">
                <h4>Correlati</h4>
            </div>
        <div class="random-area mb-30">
            @foreach($related as $comic)
                @php($image = \App\Http\Controllers\ImageController::getCover($comic->id))
            <div class="product-active-2 owl-carousel">
                <div class="product-total-2">
                    <div class="single-most-product bd mb-18">
                        <div class="most-product-img">
                            <a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $image->image_name) }}" alt="book" /></a>
                        </div>
                        <div class="most-product-content">
                            <div class="product-rating">
                                @php($id = $comic->id)
                                @php($avgstar = \App\Review::where('comic_id','=',$id)->avg('stars'))
                                    @foreach(range(1,5) as $i)
                                        @if($avgstar >0)
                                            @if($avgstar >0.5)
                                                <a><i class="fa fa-star"></i></a>
                                            @else
                                                <a><i class="fa fa-star-half-o"></i></a>
                                            @endif
                                        @else
                                            <a><i class="fa  fa-star-o"></i></a>
                                        @endif
                                        <?php $avgstar--; ?>
                                    @endforeach
                            </div>
                            <h4><a href="{{ url('/comic_detail/'.$comic->id) }}">{{ $comic->comic_name }}</a></h4>
                            <div class="product-price">
                                <ul>
                                    @if( $comic->discount != 0 )
                                        @php($valoreSconto = (($comic->price * $comic->discount) / 100))
                                        @php($newPrice = ($comic->price - $valoreSconto))
                                        <li>€{{ $newPrice }}</li>
                                        <li class="old-price">€{{$comic->price}}</li>
                                    @else
                                        <li>€{{$comic->price}}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

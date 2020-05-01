 <div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2 mt-sm-50 mt-xs-40">
                <div class="shop-left">
                    <div class="section-title-5 mb-30">
                        <h2>Opzioni</h2>
                    </div>
                    <div class="left-title mb-20">
                        <h4>Categoria</h4>
                    </div>
                    @php
                        $text1 = \App\Http\Controllers\ComicController::countByType('shonen');
                        $text2 = \App\Http\Controllers\ComicController::countByType('seinen');
                        $text3 = \App\Http\Controllers\ComicController::countByType('shojo');
                        $text4 = \App\Http\Controllers\ComicController::countByType('josei');
                        $text5 = \App\Http\Controllers\ComicController::countByType('dc');
                        $text6 = \App\Http\Controllers\ComicController::countByType('marvel');
                        $text7 = \App\Http\Controllers\ComicController::countByType('italiano');
                        $text8 = \App\Http\Controllers\ComicController::countByType('other');

                    @endphp
                    <div class="left-menu mb-30">
                        <ul>
                            <li><a href="{{ url('/shoplist/shonen')}}">Shonen<span>({{$text1}})</span></a></li>
                            <li><a href="{{ url('/shoplist/seinen')}}">Seinen<span>({{$text2}})</span></a></li>
                            <li><a href="{{ url('/shoplist/shojo')}}">Shojo<span>({{$text3}})</span></a></li>
                            <li><a href="{{ url('/shoplist/josei')}}">Josei<span>({{$text4}})</span></a></li>
                            <li><a href="{{ url('/shoplist/dc')}}">Dc<span>({{$text5}})</span></a></li>
                            <li><a href="{{ url('/shoplist/marvel')}}">Marvel<span>({{$text6}})</span></a></li>
                            <li><a href="{{ url('/shoplist/italiano')}}">Italiano<span>({{$text7}})</span></a></li>
                            <li><a href="{{ url('/shoplist/other')}}">Other<span>({{$text8}})</span></a></li>
                        </ul>
                    </div>
                    <div class="left-title mb-20">
                        <h4>Genere</h4>
                    </div>
                    <div class="left-menu mb-30">
                        <ul>
                            @foreach($genres as $genre)
                            @php
                            $numOfOcc = App\Http\Controllers\GenreController::countComics($genre->id);
                            @endphp
                                <li><a href="{{url('/shoplist/'.$genre->id)}}">{{$genre->name_genre}}<span>({{$numOfOcc}})</span></a></li> <!-- Da finire -->
                            @endforeach
                        </ul>
                    </div>
                    <div class="left-title mb-20"e>
                        <h4>Prezzo</h4>
                    </div>
                    @php
                    $integer1 = \App\Http\Controllers\ComicController::countByPrice(0,2.50);
                    $integer2 = \App\Http\Controllers\ComicController::countByPrice(2.49,5.00);
                    $integer3 = \App\Http\Controllers\ComicController::countByPrice(4.99,7.50);
                    $integer4 = \App\Http\Controllers\ComicController::countByPrice(7.49,10);
                    $integer5 = \App\Http\Controllers\ComicController::countByPrice(9.99,1000);
                    @endphp
                    <div class="left-menu mb-30">
                        <ul>
                            <li><a href="#">€0.00-€2.49<span>({{$integer1}})</span></a></li>
                            <li><a href="#">€2.50-€4.99<span>({{$integer2}})</span></a></li>
                            <li><a href="#">€5.00-€7.49<span>({{$integer3}})</span></a></li>
                            <li><a href="#">€7.50-€9.99<span>({{$integer4}})</span></a></li>
                            <li><a href="#">€10.00 +<span>({{$integer5}})</span></a></li>
                        </ul>
                    </div>
                </div>
 </div>
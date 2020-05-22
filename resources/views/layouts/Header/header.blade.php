<!-- header-area-start -->
<!-- header-mid-area-start -->
<div class="header-mid-area ptb-40 " style="background-image: url('{{ asset('img/immaginiNostre/headerImage.jpg')}}'); background-size: cover; background-repeat: no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5 col-12"></div>
            <div class="col-lg-5 col-md-4 col-12">
                <div class="logo-area text-center logo-xs-mrg">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/logo/VersionePennello/red2.png') }}" width="250px" height="250px" alt="logo" /></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12"> <!-- la parte del carrello è ancora da fare, quindi non la tocco per ora-->
                <div class="row">
                    <div class="my-cart">
                        <ul>
                            @if(\Illuminate\Support\Facades\Auth::user()!=null)
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i>Carrello</a>
                                    @php($quantityCart = 0)
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            @php($user = \Illuminate\Support\Facades\Auth::user())
                                            @if($details['user'] == $user->id)
                                                @php($quantityCart++)
                                            @endif
                                        @endforeach
                                    @endif
                                    @if($quantityCart > 0)
                                        @php($total = 0)
                                        <span>{{ $quantityCart }}</span>
                                        <div class="mini-cart-sub">
                                            <div class="cart-product">
                                                @php($tmp =0)
                                                @php($user = \Illuminate\Support\Facades\Auth::user())
                                                @foreach(session('cart') as $id => $details)
                                                    @if ($tmp++ < 5)
                                                        @if($details['user'] == $user->id)
                                                        @php($comic = \App\Http\Controllers\ComicController::getByID($id))
                                                        @php($total += $details['price'] * $details['quantity'])
                                                        <div class="single-cart">
                                                            <div class="cart-img">
                                                                <a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/' . $details['image']) }}" alt="man" /></a>
                                                            </div>
                                                            <div class="cart-info">
                                                                <h5><a href="{{ url('/comic_detail/'.$comic->id) }}">{{ $details['name']}}</a></h5>
                                                                <p>{{ $details['quantity'] }} x {{ $details['price'] }}</p>
                                                            </div>
                                                            <div class="cart-icon">
                                                                <a href="{{url('remove-from-cart-logo/'.$id) }}"><i class="fa fa-remove"></i></a>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endif
                                                    @if($tmp > 5)
                                                        <div class="mb-2"></div>
                                                        <div class="text-center font-weight-bold">.<br/>.<br/>.</div>
                                                        <div class="mb-3"></div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="cart-totals">
                                                <h5>Total <span>{{ $total }}</span></h5>
                                            </div>
                                            <div class="cart-bottom">
                                                <a class="view-cart" href="cart.html">vedi carrello</a>
                                                <a href="checkout.html">effettua l'ordine</a>
                                            </div>
                                        </div>
                            @endif
                            @else
                                <li><a href="{{url('/login')}}"><i class="fa fa-shopping-cart"></i>Carrello</a>
                                    @endif
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
                <div class="row">
                    <div class="my-cart"> <!--uso la stessa classe perché non ho voglia di rifa, semplicemente dovrei rifare una cosa uguale con nome diverso-->
                        <ul>
                            <li>
                                @if (Route::has('login'))
                                    @auth
                                        <a class="notification" href="{{url('/accountArea')}}">
                                            <img src="{{ asset('img/immaginiNostre/notifica.png') }}" width="30%", height="30%">
                                            @php($user = \Illuminate\Support\Facades\Auth::user())
                                            @php($number = \App\Http\Controllers\NotificationController::getNumber($user->id))

                                            @if($number > 0)
                                                <span>{{ $number }}</span>
                                            Notifiche
                                                <div class="mini-cart-sub">
                                                    <div class="cart-product">
                                                        @php($tmp =0)
                                                        @php($notifications = \App\Http\Controllers\NotificationController::getNotification($user->id))
                                                        @foreach($notifications as $notification)
                                                            @if ($tmp++ < 5)
                                                                <div class="single-cart">
                                                                    @if(strlen($notification->notification_text) > 33 )
                                                                        @php($subnotification = substr($notification->notification_text, 0, 33))
                                                                        <div class="cart-info">
                                                                            <h5><a href="{{ url('/accountArea') }}">{{ $subnotification}}...</a></h5>
                                                                        </div>
                                                                    @else
                                                                        <div class="cart-info">
                                                                            <h5><a href="{{ url('/accountArea') }}">{{ $notification->notification_text}}</a></h5>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            @if($tmp > 5)
                                                                <div class="mb-2"></div>
                                                                <div class="text-center font-weight-bold">.<br/>.<br/>.</div>
                                                                <div class="mb-3"></div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                Notifiche
                                            @endif
                                        </a>
                                    @endauth
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- header-mid-area-end -->
<!-- main-menu-area-start -->
<div class="main-menu-area d-md-none d-none d-lg-block sticky-header-1" id="header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <div class="menu-area">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="menu-area">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Sconti</a>
                        </li>
                    </ul>
                </div>
            </div>
            @if (Route::has('login'))
                @auth
                    <div class="col-lg-1">
                        <div class="menu-area">
                            <ul>
                                <li>
                                    <a href="{{ url('/accountArea') }}">Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pl-10"></div>
                    <div class="col-lg-1">
                        <div class="menu-area">
                            <ul>
                                <li>
                                    <a href="{{ url('/logout') }}">logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pl-20"></div>
                @else
                    <div class="col-lg-1">
                        <div class="menu-area">
                            <ul>
                                <li>
                                    <a href="{{ route('login') }}">Accesso</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if (Route::has('register'))
                        <div class="col-lg-1">
                            <div class="menu-area">
                                <ul>
                                    <li>
                                        <a href="{{ route('register') }}">Registrazione</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pl-40"></div>
                        <div class="pl-40"></div>
                    @endif
                @endauth
            @endif
            <div class="col-lg-5">
                <div id="search" class="header-search">
                    <ul>
                        <li>
                            <form action="{{ route('searchroute') }}">
                                <input type="text" name="search" placeholder="Cerca nello store..." />
                                <a  href="javascript:;" onclick="parentNode.submit();"><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-menu-area-end -->
<!-- header-area-end -->
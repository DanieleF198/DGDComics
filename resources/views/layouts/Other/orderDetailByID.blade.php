<!-- succes-area-start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-info">
                @foreach($order as $orderDetail) <!-- è un for ma in realta order contiene solo un elemento -->
                    @php($paymentMethod = \App\Http\Controllers\PaymentMethodController::getPaymentMethodByOrderId($orderDetail->payment_method_id))
                    @php($shippingAddress = \App\Http\Controllers\ShippingAddressController::getShippingAddressByOrderId($orderDetail->shipping_address_id))

                    <div class="myaccount-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class=" col-lg-3">
                                        <div><h4><b>Ordine numero:</b> {{ $orderDetail->id  }} </h4></div>
                                    </div>
                                    <div class=" col-lg-3">
                                        <div><h4><b>Stato:</b> {{ $orderDetail->state }}</h4></div>
                                    </div>
                                    <div class=" col-lg-3">
                                        <div><h4><b>Data: </b> {{ substr($orderDetail->date, 0, 10) }}</h4></div>
                                    </div>
                                    <div class=" col-lg-3">
                                        <div><h4><b>totale:</b> € {{ $orderDetail->total }}</h4></div>
                                    </div>
                                </div>
                                <br/>
                                <div><b>indirizzo di spedizione:</b> {{ $shippingAddress->via }} {{ $shippingAddress->civico }}, {{ $shippingAddress->città }} ({{ $shippingAddress->post_code }})</div>
                                <br/>
                                @php($last_four_digits = substr($paymentMethod->cardNumber, 12, 16))
                                <div><b>metodo di pagamento:</b> {{ $paymentMethod->payment_type }}, ****-****-****-{{ $last_four_digits }}, {{ substr($paymentMethod->data_scadenza, 0,7) }}, {{ $paymentMethod->intestatario }}</div>
                            </div>
                        </div>
                        <div class="mb-5"></div>
                        <div class="row">
                            <div class="table-cart table-responsive mb-15">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">immagine</th>
                                    <th class="product-name">nome fumetto</th>
                                    <th class="product-seller">venditore</th>
                                    <th class="product-price">prezzo</th>
                                    <th class="product-quantity">quantità</th>
                                    <th class="product-subtotal">totale</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($boughtComicCollection = \App\Http\Controllers\ComicBoughtController::getComicsIdByOrderId($orderDetail->id))
                                @foreach($boughtComicCollection as $boughtComic)
                                    @php($comicOrderDetail = \App\Http\Controllers\ComicBoughtController::getComicBoughtDetailById($boughtComic->id))
                                    @php($comic = \App\Http\Controllers\ComicController::getByID($comicOrderDetail->comic_id))
                                    @php($seller = \App\Http\Controllers\ComicController::getSeller($comic->id))
                                    @php($cover = \App\Http\Controllers\ImageController::getCover($comic->id))
                                    <tr>
                                        <td class="product-thumbnail"><a href="{{ url('/comic_detail/'.$comic->id) }}"><img src="{{asset('img/comicsImages/'.$cover->image_name) }}" alt="man" /></a></td>
                                        <td class="product-name">{{ $comic->comic_name}}</td>
                                        <td class="product-seller">{{ $seller->name }} {{ $seller->surname }}</td>
                                        <td class="product-price"><span class="amount">€ {{ $comicOrderDetail->price }}</span></td>
                                        <td class="product-price">{{ $comicOrderDetail->quantity }}</td>
                                        <td class="product-subtotal">€ {{ $comicOrderDetail->price * $comicOrderDetail->quantity }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<!-- succes-area-end -->
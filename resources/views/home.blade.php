@extends('layout.site')
<!-- new collection section start -->

@section('content')
    <div class="collection_section layout_padding">
        <div class="container">
            <h1 class="new_text"><strong>Sản Phẩm Mới</strong></h1>
            <p class="consectetur_text"></p>
        </div>
    </div>
    <!-- new collection section end -->
    <!-- New Arrivals section start -->
    <div class="layout_padding gallery_section">
        <div class="container">
            <div class="row">
                @foreach ($list_product as $key => $item)
                    <div class="col-sm-4">
                        <div class="best_shoes">
                            <p class="best_text">{{ $item->product_name }}</p>
                            <div class="shoes_icon"><a id="shoes_icon"
                                    href="{{ route('infoProduct', ['id' => $item->id]) }}"><img
                                        style="max-width:200px; height: auto;" src="assets/images/{{ $item->image }}"></a>
                            </div>
                            <div class="star_text">
                                <div class="left_part">
                                    <ul>

                                        @for ($i = 0; $i < $item->avg_star; $i++)
                                            <li><a href="#"><img src="{{ asset('assets/images/star-icon.png') }}"></a>
                                            </li>
                                        @endfor

                                    </ul>
                                </div>
                                <div class="right_part">
                                    <div class="shoes_price">$<span
                                            style="color: #ff4e5b; font-size: 22px">{{ $item->price }}</span> </div>
                                    <div class="shoes_price"><a href="{{ route('infoProduct', ['id' => $item->id]) }}"
                                            style="padding-left: 30px; padding-right: 30px;"
                                            class="btn btn-warning btn-sm">Buy</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="buy_now_bt">
                <button class="buy_text">Buy Now</button>
            </div>
        </div>
    </div>
    <!-- New Arrivals section end -->
    <!-- contact section start -->
    <div class="layout_padding contact_section">
        <div class="container">
            <h1 class="new_text"><strong>Contact Now</strong></h1>
        </div>
        <div class="container-fluid ram">
            <div class="row">
                <div class="col-md-6">
                    <div class="email_box">
                        <div class="input_main">
                            <div class="container">
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Name" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Phone Number" name="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="email-bt" placeholder="Email" name="Email">
                                    </div>

                                    <div class="form-group">
                                        <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="send_btn">
                                <button class="main_bt">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shop_banner">
                        <div class="our_shop">
                            <button class="out_shop_bt">Our Shop</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- contact section end -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title -->
    <title>Thông tin sản phẩm</title>


    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/info_product/img/favicon.png') }}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/info_product/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/info_product/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/info_product/css/aowl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/info_product/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/info_product/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/info_product/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/info_product/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/info_product/css/responsive.css') }}">

</head>

<body>
    <style>
        .list_start i:hover {
            cursor: pointer;
        }

        .list_text {
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }

        .list_text:after {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: "";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82, 184, 88, 0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }

        .list_start .rating_active {
            color: #ff9705;
        }

        .hide {
            display: none;
            opacity: 0;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            max-width: 500px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: left;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="{{ route('index') }}">
                                <h2>Material</h2>
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>

                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="#"><i class="fas fa-shopping-cart"></i></a>

                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->



    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>See more Details</p>
                        <h1>Thông tin sản phẩm</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                @foreach ($list_product_id as $key => $item)
                    @php
                        $img = $item->image;
                        $id = $item->id;
                        $price = $item->price;
                    @endphp
                    <div class="col-md-4">
                        <div class="single-product-img">
                            <img style="min-width: 120px; min-height: 220px;"
                                src="{{ asset('assets/images/' . $img . '') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="single-product-content">
                            <h3>{{ $item->product_name }}</h3>
                            <p class="single-product-pricing"><span></span>${{ $item->price }}</p>
                            <p>{{ $item->mota }}</p>
                            <div class="single-product-form">
                                <form action="{{ route('infoProduct', ['id' => $item->id]) }}" method="POST">
                                    <input type="hidden" name="size" value="{{ $id_sanpham = $item->id }}"
                                        id="">
                                    <label for="">Size:</label>
                                    <input type="text" name="size" value="{{ $item->size }}" id="">
                                    <input type="number" value="1" name="soluong">
                                    <input type="hidden" name="product_name" value="{{ $item->product_name }}">
                                    <input type="hidden" name="image" value="{{ $item->image }}">
                                    <input type="hidden" name="price" value="{{ $item->price }}">
                                    {{-- <input type="hidden" value="{{$id}}" class="form-control" name="id" id="id"> --}}

                                        @if ($item->soluongtonkho > 0)
                                            <button class="btn cart-btn" type="submit" name="submit"><i
                                                class="fas fa-shopping-cart"></i> Thêm giỏ hàng</button>
                                        @else

                                        @endif
                                    @csrf
                                </form>
                                <p>Số lượng trong kho: {{ $item->soluongtonkho }}</p>
                                @if ($item->soluongtonkho > 0)
                                    <a href="" data-toggle="modal" data-target="#mua" class="cart-btn"><i
                                            class="fas fa-shopping-basket"></i></i>Mua</a>
                                @else
                                    <a style="background-color: red" href="" data-toggle="modal"
                                        class="cart-btn"><i class="fas fa-shopping-basket"></i></i>Hết hàng</a>
                                @endif
                                {{-- <form action="{{route('CreateOrder')}}" method="GET">
								<input type="hidden" name="soluong_sanpham_mua">
								<a href="" type="submit" name="mua"  class="cart-btn"><i class="fas fa-shopping-basket"></i></i>Mua</a>
							@csrf
							</form> --}}


                            </div>

                            <h4>Share:</h4>
                            <ul class="product-share">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- đánh giá product -->

    <div class="component_rating" style="display: center">
        <h3> Đánh giá sản Phẩm</h3>
        @foreach ($list_product_id as $key => $item)
            <div class="component_rating_content"
                style="display: flex; align-items: center; border: 1px solid;border-radius: 5px">
                <div class="rating_item" style="width: 20%; position: relative">
                    <input type="hidden" value="{{ $a = $item->pro_total_number / $item->pro_total_rating }}">
                    <span class="fa fa-star"
                        style="font-size: 100px; display:block; color: #ff9705;margin: 0 auto;text-align: center;"></span>
                    <b
                        style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%);color: white; font-size: 20px;">{{ $avg_rating }}</b>
                </div>
                <div class="list_rating" style="width:60% ; padding: 20px">
                    <input type="hidden" value="{{ $motsao = 0 }}">
                    <input type="hidden" value="{{ $haisao = 0 }}">
                    <input type="hidden" value="{{ $basao = 0 }}">
                    <input type="hidden" value="{{ $bonsao = 0 }}">
                    <input type="hidden" value="{{ $namsao = 0 }}">

                    @foreach ($list_getratings as $danhgia)
                        @if ($danhgia->ra_number == 1)
                            <input type="hidden" value="{{ $motsao += 1 }}">
                        @elseif ($danhgia->ra_number == 2)
                            <input type="hidden" value="{{ $haisao += 1 }}">
                        @elseif ($danhgia->ra_number == 3)
                            <input type="hidden" value="{{ $basao += 1 }}">
                        @elseif ($danhgia->ra_number == 4)
                            <input type="hidden" value="{{ $bonsao += 1 }}">
                        @elseif ($danhgia->ra_number == 5)
                            <input type="hidden" value="{{ $namsao += 1 }}">
                        @endif
                    @endforeach
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="item_rating" style="display: flex ; align-items: center">
                            <div style="width: 10%; font-size: 14px">
                                {{ $i }}<span class="fa fa-star"> </span>
                            </div>
                            <div style="width: 70% ; margin: 0 20px">
                                <span
                                    style="width:100%; height: 8px; display: block;border:1px solid #dedede; boder-radius: 5px; background_color: #dedede"><b
                                        style="width: {{ $ratingPercentages[$i] }}%; background-color: #f25800; display: block; border-radius: 5px; height: 100%"></b>
                                </span>
                            </div>
                            <div style="width: 20%">
                                @if ($i == 1)
                                    <a href="#"
                                        onclick="openModal(event,'{{ $id_sanpham }}','{{ $i }}')">
                                        {{ $motsao }} đánh giá </a>
                                @elseif ($i == 2)
                                    <a href="#"
                                        onclick="openModal(event,'{{ $id_sanpham }}','{{ $i }}')">
                                        {{ $haisao }} đánh giá </a>
                                @elseif ($i == 3)
                                    <a href="#"
                                        onclick="openModal(event,'{{ $id_sanpham }}','{{ $i }}')">
                                        {{ $basao }} đánh giá </a>
                                @elseif ($i == 4)
                                    <a href="#"
                                        onclick="openModal(event,'{{ $id_sanpham }}','{{ $i }}')">
                                        {{ $bonsao }} đánh giá </a>
                                @elseif ($i == 5)
                                    <a href="#"
                                        onclick="openModal(event,'{{ $id_sanpham }}','{{ $i }}')">
                                        {{ $namsao }} đánh giá </a>
                                @endif
                            </div>
                        </div>
                    @endfor

                </div>

                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>

                        <div id="rate">

                        </div>
                    </div>
                </div>

                <div>
                    <p>Tổng số lần đánh giá: {{ $item->pro_total_rating - 1 }}</p>

                </div>
                <div style="width: 20%">
                    <a href="" class="js_rating_action"
                        style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px;"> Gửi
                        đánh giá của bạn </a>
                </div>
            </div>
        @endforeach
        <?php
        $listRatingText = [
            1 => 'Không Thích',
            2 => 'Tạm Được',
            3 => 'Bình Thường',
            4 => 'Tốt',
            5 => 'Rất Tuyệt Vời',
        ];
        ?>
        <div class="form_rating hide">
            <div style="display: flex; margin-top: 15px; font-size:15px">
                <p style="margin-bottom:0"> Chọn đánh giá của bạn</p>
                <span style="margin: 0 15px" class="list_start">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa fa-star" data-key="{{ $i }}"> </i>
                    @endfor
                </span>
                <span class="list_text"></span>
                <input type="hidden" value="" class="number_rating" name="number_rating">
            </div>
            <div style="margin-top: 15px">
                <textarea name="ra_content" class="form-control" id="ra_content" cols="30" rows="3"></textarea>
            </div>
            <div style="margin-top: 15px">
                <a href="{{ route('post.rating.product', $id_sanpham) }}" class="js_rating_product"
                    style="width: 200px;background: #288ad6;padding: 5px 10px;color: white;border-radius: 5px;">Gửi
                    Đánh Giá </a>
            </div>
        </div>

    </div>

    {{--  <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product_id }}">
        <div>
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" rows="4" required></textarea>
        </div>
        <div>
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required>
        </div>
        <div>
            <button type="submit">Submit Review</button>
        </div>
    </form>  --}}


    @section('script')
        <script>
            function openModal(event, id, star) {
                event.preventDefault();
                var modal = document.getElementById("myModal");
                modal.style.display = "block";

                // Điều chỉnh vị trí modal
                modal.style.transform = "translate(-50%, -50%)";
                modal.style.top = "50%";
                modal.style.left = "50%";



                // Gửi yêu cầu API
                fetch("/Web_TMDT/shop_onlinevlxd/public/ratings/" + id + "/" + star, {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error("Error: " + response.status);
                        }
                    })
                    .then(data => {
                        var modalText = document.getElementById("rate");
                        modalText.innerHTML = ""; // Clear previous content


                        data.forEach(rating => {
                            var ratingDiv = document.createElement("div");

                            var authorElement = document.createElement("div");
                            var ratingElement = document.createElement("div");
                            authorElement.innerHTML = "Tác giả: " + rating.username;
                            ratingElement.innerHTML = "Nhận xét: " + rating.ra_content;
                            ratingDiv.appendChild(authorElement);
                            ratingDiv.appendChild(ratingElement);
                            ratingDiv.style.marginBottom = "10px"


                            modalText.appendChild(ratingDiv);
                        });
                    })
                    .catch(error => {
                        // Handle the error
                        // ...
                    });

            }

            var closeBtn = document.getElementsByClassName("close")[0];
            closeBtn.onclick = function() {
                var modal = document.getElementById("myModal");
                modal.style.display = "none";
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(function() {

                let listStart = $(".list_start .fa");

                listRatingText = {
                    1: 'Không Thích',
                    2: 'Tạm Được',
                    3: 'Bình Thường',
                    4: 'Tốt',
                    5: 'Rất Tuyệt Vời',

                }

                listStart.mouseover(function() {
                    let $this = $(this);
                    let number = $this.attr('data-key')
                    listStart.removeClass('rating_active')

                    $(".number_rating").val(number);
                    $.each(listStart, function(key, value) {
                        if (key + 1 <= number) {
                            $(this).addClass('rating_active')
                        }
                    });

                    $(".list_text").text('').text(listRatingText[number]).show();

                });

                $(".js_rating_action").click(function(event) {
                    event.preventDefault();
                    if ($(".form_rating").hasClass('hide')) {
                        $(".form_rating").addClass('active').removeClass('hide')
                    } else {
                        $(".form_rating").addClass('hide').removeClass('active')
                    }
                })

                $(".js_rating_product").click(function(e) {
                    e.preventDefault();
                    let content = $("#ra_content").val();
                    let number = $(".number_rating").val();
                    let url = $(this).attr('href');
                    if (content && number) {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                number: number,
                                ra_content: content
                            },
                            success: function(result) {
                                alert("Đánh giá sản phẩm thành công")
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                });


            });
        </script>
    @stop



    <!-- end đánh gía product -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                {{--  <div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">

						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>  --}}
            </div>
        </div>
    </div>
    <!-- end logo carousel -->

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">Quy chế hoạt động</h2>
                        <p>Materials shop sẽ hỗ trợ khách hàng một cách tốt nhất.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Liên Hệ</h2>
                        <ul>
                            <li>Sư phạm Kỹ thuật Vĩnh Long</li>
                            <li>Email: 19004023@st.vlute.edu.vn</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Chính sách</h2>
                        <ul>
                            <li><a href="index.html">Chính sách bảo mật</a></li>
                            <li><a href="about.html">Chính sách vận chuyển</a></li>
                            <li><a href="services.html">Chính sách trả hàng và hoàn tiền</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Chăm sóc khách hàng</h2>
                        <p>Ý kiến và góp ý của khác hàng</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->
    <div id="mua" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="text-align:left; font-weight:900;font-size:26px ;color:#f26522;" class="modal-title">
                        Thông tin người mua hàng
                    </h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="{{ route('CreateOrder') }}" method="GET">
                        <div class="form-group">
                            <label for="hoten">Họ tên:</label>
                            <input type="text" class="form-control" name="hoten" id="hoten" required>
                        </div>
                        <div class="form-group">
                            <label for="diachi">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="diachi">Địa chỉ:</label>
                            <input type="text" class="form-control" name="diachi" id="diachi" required>
                        </div>
                        <div class="form-group">
                            <label for="sdt">Số điện thoại:</label>
                            <input type="text" class="form-control" name="sdt" id="sdt" required
                                pattern="(\+84|0)\d{9,10}" title="Nhập số điện thoại từ 10 đến 11 số">
                        </div>
                        <div class="form-group">
                            <label for="soluong">Số Lượng:</label>
                            <input type="number" value='1' class="form-control" name="soluong"
                                id="soluong">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="method_payment" value="shipcod"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <div class="form-check">
                                <input style="margin-top:18px;" class="form-check-input" type="radio"
                                    name="method_payment" value="paypal">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <img style="max-width: 50px;" src="{{ asset('assets/images/paypal.png') }}"
                                        alt="">
                                </label>
                            </div>
                            <input type="hidden" name="id_product" value="{{ $id }}">
                            <input type="hidden" name="price" value="{{ $price }}">
                        </div>
                        {{-- <div><img name="img" style="max-wight:50x; max-height:150px;margin-top:10px;" src="images/" alt=""></div> --}}
                        <input name="submit" type="submit" value="Xác Nhận Mua" class="btn btn-warning ">
                    </form>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </div>

        </div>

    </div>
    <script>
        function checkGioHang() {
            soluong = document.getElementById("soluongsanpham").value;
            if (soluong <= 0) {
                alert("Số lượng phải lớn hơn 0");
            }

        }

        function checkDatHang() {
            hoten = document.getElementById("hoten").value;
            diachi = document.getElementById("diachi").value;
            sdt = document.getElementById("sdt").value;
            soluong = document.getElementById("soluong").value;
            if (soluong > 0) {
                alert("Đặt hàng thành công");
            } else {
                alert("Đặt hàng thất bại");

            }
        }
    </script>

    <!-- jquery -->
    <script src="{{ asset('assets/info_product/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/info_product/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('assets/info_product/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/info_product/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('assets/info_product/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/info_product/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/info_product/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('assets/info_product/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('assets/info_product/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/info_product/js/main.js') }}"></script>


    @yield('script')

</body>

</html>

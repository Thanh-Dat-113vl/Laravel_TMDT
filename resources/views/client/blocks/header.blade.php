
<div class="header_section">
    <div class="container">
      
        <div class="row">
            <div class="col-sm-1">
                <div class="logo"><a href="#"><img src="{{asset('assets/images/img/logo-bulding.png')}}"></a></div>
            </div>
            <div class="col-sm-11">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                       <a class="nav-item nav-link" href="{{route('index')}}">Trang Chủ</a>
                       <a class="nav-item nav-link" href="{{route('collection')}}">Tin Tức</a>
                       <a class="nav-item nav-link" href="{{route('shoes')}}">Sản Phẩm</a>
                       {{-- <a class="nav-item nav-link" href="racing boots.html">Racing Boots</a> --}}
                       <a class="nav-item nav-link" href="contact.html">Contact</a>
                       
                       <a class="nav-item nav-link last" href="{{route('Cart')}}"><img src="{{asset('assets/images/shop_icon.png')}}"></a>
                       <a class="nav-item nav-link last" href="{{route('ListOder')}}"><img style="max-width: 30px" src="{{asset('assets/icon/cargo.png')}}"></a>
                       @if(session('username_login_sussces'))
                            <a style="text-decoration: none" href="{{route('infoUser')}}"><p style="color: #fff">Xin chào {{session('username_login_sussces')}}</p></a>  
                       @else
                            <a class="nav-item nav-link last" href="{{route('login')}}"><img style="max-height: 30px;background-image:#fff"  src="{{asset('assets/images/loginuser.png')}}"></a>
                            
                       @endif
                    </div>
                </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="banner_section">
        <div class="container-fluid">
            <section class="slide-wrapper">
<div class="container-fluid">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                <div class="col-sm-2 padding_0">
                    {{-- <p class="mens_taital">Men </p>
                    <div class="page_no">0/2</div>
                    <p class="mens_taital_2">Men Shoes</p> --}}
                </div>
                <div class="col-sm-5">
                    <div class="banner_taital">
                        <h1 class="banner_text">Vật Liệu Xây Dựng Tốt Nhất </h1>
                        <h1 class="mens_text"><strong>BULDING MATERIALS</strong></h1>
                        <p class="lorem_text">.</p>
                        <button class="buy_bt"><a href="shoes">Mua Ngay</a></button>
                        <button class="more_bt"><a href="shoes">Xem Thêm</a></button>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shoes_img"><img src="{{asset('assets/images/img/logo-building-materials.jpg')}}"></div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                <div class="col-sm-2 padding_0">
                    <p class="mens_taital">Men Shoes</p>
                    <div class="page_no">0/2</div>
                    <p class="mens_taital_2">Men Shoes</p>
                </div>
                <div class="col-sm-5">
                    <div class="banner_taital">
                        <h1 class="banner_text">New Materials </h1>
                        <h1 class="mens_text"><strong>Vật Liệu Tốt nhất</strong></h1>
                        <p class="lorem_text">Hàng Việt Nam Chất lượng Cao</p>
                        <button class="buy_bt">Buy Now</button>
                        <button class="more_bt">See More</button>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shoes_img"><img src="{{asset('assets/images/shoes-img1.png')}}"></div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                <div class="col-sm-2 padding_0">
                    <p class="mens_taital">Men Shoes</p>
                    <div class="page_no">0/2</div>
                    <p class="mens_taital_2">Men Shoes</p>
                </div>
                <div class="col-sm-5">
                    <div class="banner_taital">
                        <h1 class="banner_text">New Running Shoes </h1>
                        <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                        <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <button class="buy_bt">Buy Now</button>
                        <button class="more_bt">See More</button>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shoes_img"><img src="{{asset('assets/images/running-shoes.png')}}"></div>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                <div class="col-sm-2 padding_0">
                    <p class="mens_taital">Men Shoes</p>
                    <div class="page_no">0/2</div>
                    <p class="mens_taital_2">Men Shoes</p>
                </div>
                <div class="col-sm-5">
                    <div class="banner_taital">
                        <h1 class="banner_text">New Running Shoes </h1>
                        <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                        <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <button class="buy_bt">Buy Now</button>
                        <button class="more_bt">See More</button>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="shoes_img"><img src="{{asset('assets/images/running-shoes.png')}}"></div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</section>			
        </div>
    </div>
</div>
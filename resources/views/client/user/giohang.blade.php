<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- bootstrap css -->
     <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
     <!-- style css -->
     <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
     <!-- Responsive-->
     <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
     <!-- fevicon -->
     <link rel="icon" href="images/fevicon.png" type="image/gif" />
     <!-- Scrollbar Custom CSS -->
     <link rel="stylesheet" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
     <!-- Tweaks for older IEs-->
     <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

     <!-- owl stylesheets -->
     <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <title>Giỏ hàng</title>
</head>
<body>
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-8">
                      <div class="p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                          <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                        </div>

                        {{-- start_product --}}
                        @if (!empty($list_data_cart))
                            @php
                                $totalprice = 0;
                                $id_user = session('id_login_sussces');
                            @endphp
                            @foreach ($list_data_cart as $key => $item)
                              @php
                                  $totalprice += $item->soluong * $item->price;
                              @endphp
                            <hr class="my-4">

                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                              <div class="col-md-2 col-lg-2 col-xl-2">
                                <img style="max-width: 100px; max-height:100px"
                                  src="assets/images/{{$item->image}}"
                                  class="img-fluid rounded-3" alt="Image Error">
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-3">
                                <h6 class="text-muted">{{$item->product_name}}</h6>
                                <h6 class="text-black mb-0">{{$item->size}}</h6>
                              </div>
                              <div class="col-md-2 col-lg-2 col-xl-2 d-flex">
                                <div class="number-input">

                                  <input
                                    onchange="check()"
                                    id="soluong"
                                    class="quantity tank"
                                    min="1"
                                    name="soluong"
                                    value="{{$item->soluong}}"
                                    type="number"
                                    max="10"
                                  />

                            </div>
                              </div>
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">$ {{$item->price}}</h6>
                              </div>
                              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="{{route('DelectCart',['id'=>$item->id])}}" class="text-muted"><img src="{{asset('assets/icon/bin.png')}}" alt=""></a>

                              </div>
                              <div class="col-md-1 col-lg-1 col-xl-1 text-end">

                                  <a type="submit" href="{{route('UpdateNumberCart',['id'=>$item->id,'soluong'=>$item->soluong])}}"><img src="{{asset('assets/icon/updated.png')}}"></a>


                              </div>
                            </div>
                            @endforeach
                        @else
                            <h1>Giỏ hảng trống</h1>
                        @endif
                        {{-- end-product --}}


                        <hr class="my-4">

                        <div class="pt-5">
                          <h6 class="mb-0"><a href="{{route('index')}}" class="text-body"><i
                                class="fas fa-long-arrow-alt-left me-2" ></i>Quay lại</a></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 bg-grey">
                      <div class="p-5">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Thông tin đơn hàng</h3>
                        <hr class="my-4">

                        {{--  <div class="d-flex justify-content-between mb-4">
                          <h5 class="text-uppercase">items 3</h5>
                          <h5> </h5>
                        </div>  --}}

                        <h5 class="text-uppercase mb-3">Vận Chuyển</h5>

                        <div class="mb-4 pb-2">
                          <select class="select">
                            <option value="1">Giao Hàng</option>
                            {{--  <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>  --}}
                          </select>
                        </div>

                        <h5 class="text-uppercase mb-3">Mã code</h5>

                        <div class="mb-5">
                          <div class="form-outline">
                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Examplea2">Nhập Mã CODE</label>
                          </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-5">
                          <h5 class="text-uppercase">Tổng tiền</h5>
                          <h5>$ {{$totalprice}}</h5>
                        </div>

                        <a href="{{route('Pay')}}"><button type="button" class="btn btn-dark btn-block btn-lg"
                          data-mdb-ripple-color="dark" >Thanh Toán</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- Modal -->

      </section>
</body>
<script>

</script>

<script type="text/javascript">
   function check() {
      var soluong = document.getElementById('soluong').value;

      var str = '<?php echo 1+1;?>';
      alert(str);
    }

  </script>
</html>

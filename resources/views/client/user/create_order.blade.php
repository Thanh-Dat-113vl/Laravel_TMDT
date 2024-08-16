<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đơn Hàng</title>
    <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://www.paypal.com/sdk/js?client-id=AbJceCG-SnLMPymCxWPQlidOZd3oKe-s70H5oKE7nK-ed1wfB7WYAbHqZajeYtCOXAMMgjngrEvNL7HR&currency=USD"></script>

	<!-- Demo CSS (No need to include it into your project) -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
  <style>
    input[type=button], input[type=submit], input[type=reset] {
      background-color: #04AA6D;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
    }
    </style>
  </head>
  <body>

 <main>

     <!-- DEMO HTML -->
     <div class="container">
  <div class="py-5 text-center">

    <h2>Thanh Toán Đơn Hàng</h2>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Đơn hàng</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        @php
          $fullname ="";
          $diachi = "";
          $total_price = 0;
          $i = 0;
          $count_list = count($list_data_cart);
          $arr_product_name = array();
          $arr_soluong = array();
        @endphp
        @foreach ($list_data_cart as $key => $itemcart)
        @php
          $total_price += $itemcart->total;
          $product_name = $itemcart->product_name;
          $soluong = $itemcart->soluong;
          if($i < $count_list){
            $arr_product_name[$i] = $product_name;
            $arr_soluong[$i] = $soluong;
          }
          $i++;
        @endphp
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0" style="font-size: 15px">{{$itemcart->product_name}}</h6>
            <small class="text-muted">Giá: {{$itemcart->price}}</small>
            <small class="text-muted" style="margin-left: 50px;">Số lượng: {{$itemcart->soluong}}</small>
          </div>

          <span class="text-muted">${{$itemcart->total}}</span>
        </li>
        @endforeach

        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Giảm giá</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total</span>
          <strong>${{$total_price}}</strong>
          <input type="hidden" value="{{$total_price}}" id="total">
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Mã giảm giá">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-7 order-md-2">
      <h4 class="mb-3">Thông tin người mua hàng</h4>





      <form class="needs-validation" action="" method="POST" id="myform">
        <div class="row">
          <div class="col-md-12">
            <label for="firstName">Họ và Tên người nhận</label>

            <input id="fullname" type="text" class="form-control" name="fullname" placeholder="Nhận họ và tên" value="" required>

          </div>

        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">

        </div>
        <div class="mb-3">
          <label for="address">Địa chỉ giao hàng </label>
          <input type="text" class="form-control" id="diachi" name="diachi"  placeholder="Địa chỉ người nhận" required>

        </div>

        <div class="mb-3">
          <label for="address2">Số điện thoại </label>
          <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại">
        </div>
        {{-- <input type="hidden" name="total_price" value="{{$total_price}}">
        <input type="hidden" name="product_name" value="{{$product_name}}">
        <input type="hidden" name="arr_product_name" value="{{serialize($arr_product_name)}}">
        <input type="hidden" name="arr_soluong" value="{{serialize($arr_soluong)}}"> --}}


        <hr class="mb-4">

        <h4 class="mb-3">Hình Thức Thanh Toán</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">

              <input id="shipcod"   name="paymentMethod" type="radio" class="custom-control-input" value="shipcod" checked required>
              <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label><br>
              <input id="paypal"   name="paymentMethod" type="radio" class="custom-control-input" value="paypal">
              <label class="custom-control-label" for="credit"><img style="max-width: 50px" src="{{asset('assets/images/paypal.png')}}" alt=""></label>

        </div>

        <hr class="mb-4">
        <input  style="width: 100%;"  type="submit" name="submit" value="Hoàn Thành Thanh Toán" >

        {{-- <div  id="paypal-button-container"></div> --}}
        @csrf
      </form>

    </div>
  </div>

</div>
     <!-- End Demo HTML -->

 </main>


<!-- Bootstrap 5 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


  </body>
</html>

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
          <span>Total (USD)</span>
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

      @if (isset($list_data_infouser))
          @foreach ($list_data_infouser as $key => $item)
              @php
               
                  $fullname = $item->fullname;
                  $email = $item->email;
                  $diachi = $item->diachi;
                  $sdt= $item->sdt;
              @endphp
          @endforeach
      @endif
       
      
    
      <form class="needs-validation" action="" method="POST" id="myform">
        <div class="row">
          <div class="col-md-12">
            <label for="firstName">Họ và Tên người nhận</label>
         
            <input id="fullname" type="text" class="form-control" name="fullname" placeholder="Nhận họ và tên"
            @if (isset($fullname))
              value="{{$fullname}}"
            @endif
            value=""
            required >
     
          </div>

        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" name="email"
          @if (isset($email))
            value="{{$email}}"
          @endif
          placeholder="you@example.com">
      
        </div>
        <div class="mb-3">
          <label for="address">Địa chỉ giao hàng </label>
          <input type="text" class="form-control" id="diachi" name="diachi" 
          @if (isset($diachi))
            value="{{$diachi}}"
          @endif
          value="" placeholder="Địa chỉ người nhận" required>
     
        </div>

        <div class="mb-3">
          <label for="address2">Số điện thoại </label>
          <input type="text" class="form-control" id="sdt" name="sdt"
          @if (isset($sdt))
            value="{{$sdt}}"
          @endif placeholder="Nhập số điện thoại" required title="Nhập số điện thoại từ 10 đến 11 số" pattern="(\+84|0)\d{9,10}">
        </div>
        <input type="hidden" name="total_price" value="{{$total_price}}">
        <input type="hidden" name="product_name" value="{{$product_name}}">
        <input type="hidden" name="arr_product_name" value="{{serialize($arr_product_name)}}">
        <input type="hidden" name="arr_soluong" value="{{serialize($arr_soluong)}}">
        
        
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
   <!-- Replace "test" with your own sandbox Business account app client ID -->

   <!-- Set up a container element for the button -->
 
   {{-- <script>
   
     paypal.Buttons({
       // Sets up the transaction when a payment button is clicked
       createOrder: (data, actions) => {
         var total  = document.getElementById('total').value;
         return actions.order.create({
           purchase_units: [{
             amount: {
               value: 0.1 // Can also reference a variable or function
             }
           }]
         });
       },
       // Finalize the transaction after payer approval
       onApprove: (data, actions) => {
      
         return actions.order.capture().then(function(orderData) {
           // Successful capture! For dev/demo purposes:
           console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
           const transaction = orderData.purchase_units[0].payments.captures[0];
           alert(`Thanh toán thành công  ${transaction.status}: ${transaction.id}\n\nVui lòng kiểm tra đơn hàng`);
           //window.location.replace(url);
           window.location.href ="{{route('postPay')}}";
           
          //  window.location.replace();
          //  When ready to go live, remove the alert and show a success message within this page. For example:
          //  const element = document.getElementById('paypal-button-container');
          //  element.innerHTML = '<h3>Thank you for your payment!</h3>';
          //  Or go to another URL:  actions.redirect('thank_you.html');
         });
       },
      //  onCancel:function(data) {
      //        window.location.replace('http://127.0.0.1:8000/pay');
      //  }
     }).render('#paypal-button-container');
   </script> --}}

  </body>
</html>
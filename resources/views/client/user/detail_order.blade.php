<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://www.paypal.com/sdk/js?client-id=AbJceCG-SnLMPymCxWPQlidOZd3oKe-s70H5oKE7nK-ed1wfB7WYAbHqZajeYtCOXAMMgjngrEvNL7HR&currency=USD"></script>

	<!-- Demo CSS (No need to include it into your project) -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
</head>
<style>
    .gradient-custom {
/* fallback for old browsers */
background: #cd9cf2;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1))
}
</style>
<body>
    @foreach ($list_detail_order as $key => $item)
        @php
            $id_donhang = $item->id_donhang;
        @endphp
    @endforeach
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-8">
          <div class="card" style="border-radius: 10px;">
            <div class="card-header px-4 py-5">
              <a class="nav-item nav-link last" style="color: #333" href="{{route('ListOder')}}"><img style="max-width: 30px" src="{{asset('assets/icon/back.png')}}"></a>
            </div>


            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0" style="color: #a8729a;">Chi Tiết Đơn Hàng</p>
                <p class="lead fw-normal mb-0" >Mã Đơn Hàng:#{{$item->id_donhang}}</p>
              </div>
              @foreach ($list_detail_order as $key => $item)
              <div class="card shadow-0 border mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="../assets/images/{{$item->image}}"
                        class="img-fluid" alt="Phone">
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0">{{$item->product_name}}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">White</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">Capacity: 64GB</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">Số lượng: x{{$item->soluong}}</p>
                    </div>
                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                      <p class="text-muted mb-0 small">${{$item->price}}</p>
                    </div>
                  </div>
                  {{-- <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                  <div class="row d-flex align-items-center">
                    <div class="col-md-2">
                      <p class="text-muted mb-0 small">Track Order</p>
                    </div>
                    <div class="col-md-10">
                      <div class="progress" style="height: 6px; border-radius: 16px;">
                        <div class="progress-bar" role="progressbar"
                          style="width: 65%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="65"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="d-flex justify-content-around mb-1">
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                        <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                      </div>
                    </div>
                  </div> --}}
                </div>
              </div>
              @endforeach


              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">Order Details</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> ${{$item->total}}</p>
              </div>

              <div class="d-flex justify-content-between pt-2">
                <p class="text-muted mb-0">Invoice Number : 788152</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span></p>
              </div>

              {{-- <div class="d-flex justify-content-between">
                <p class="text-muted mb-0">Invoice Date : 22 Dec,2019</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">GST 18%</span> 123</p>
              </div>

              <div class="d-flex justify-content-between mb-5">
                <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p>
                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
              </div> --}}
            </div>
            <div class="card-footer border-0 px-4 py-5"
              style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
              <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                paid: <span class="h2 mb-0 ms-2">${{$item->total}}</span></h5>

              <a data-toggle="modal" data-target="#exampleModal" class=" justify-content-start text-white text-uppercase mb-0 btn btn-danger" href="">Hủy Đơn Hàng</a>
            </div>

          </div>
        </div>
      </div>
    </div>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hủy Đơn Hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn hủy đơn #{{$id_donhang}}
      </div>
      <div class="modal-footer">
        <button style="padding: 10px" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-susscess" style="    background-color: #2cac71;color: #fff;" href="{{route('HuyDon',['id'=>$item->id_donhang])}}">Xác Nhận Hủy Đơn</a>
      </div>
    </div>
  </div>
</div>
  </section>
</body>
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('assets/vendor/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/plugin.js')}}"></script>
<script src="{{asset('assets/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets/js/custom_shop.js')}}"></script>
</html>

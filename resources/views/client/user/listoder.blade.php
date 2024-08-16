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
    <title>Đơn Hàng</title>
</head>
<body>
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-12">
                      <div class="p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                          <h1 class="fw-bold mb-0 text-black">Order</h1>
                        </div>
                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                       @endif
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>Mã đơn hàng</th>
                                  <th>Tên Người Nhận</th>
                                  <th>Email</th>
                                  <th>Địa chỉ</th>
                                  <th>Phone</th>
                                  <th>Trạng thái</th>
                                  <th>Trạng thái đơn hàng</th>
                                  <th>Create Date</th>
                                  <th></th>
                               
                              </tr>
                          </thead>
                          <tbody>
                            @if (isset($list_order))
                                  
                                @foreach ($list_order as $key => $item)
                                  
                            <tr>
                                <td>#{{$item->id_donhang}}</td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->diachi}}</td>
                                <td>{{$item->sdt}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->trangthaidonhang}}</td>
                                <td>{{$item->create_at}}</td>
                                {{-- <td><a href="{{route('getEditUser',['id'=>$item->id_donhang])}}" class="btn btn-warning btn-circle">Xem Chi Tiết</a></td> --}}
                                <td><a href="{{route('DetailOrder',['id'=>$item->id_donhang])}}" class="btn btn-warning btn-circle">Xem Chi Tiết</a></td>
                            </tr>
                              
                               @endforeach
                               
                            @else
                                <tr>
                                    <td colspan="9">Không có người dùng</td>
                                </tr>
                            @endif
                        </tbody>
                        </table>
                        <hr class="my-4">
      
                        <div class="pt-5">
                          <h6 class="mb-0"><a href="{{route('index')}}" class="text-body"><i
                                class="fas fa-long-arrow-alt-left me-2" ></i>Quay lại</a></h6>
                        </div>
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
</html>
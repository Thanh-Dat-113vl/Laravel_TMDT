@extends('layout.site_admin')

@section('content')
<div class="container">
    <h2>Gửi Gmail Xin Lỗi</h2>
   
        <form class="form-horizontal" action="{{route('postDeleteOrder')}}" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-4" for="caterogy">Lý Do</label>
                <div class="col-sm-8">
                    <div class="form-check">
                        <input class="form-check-input" name="cb1" type="checkbox" value="Hết Hàng" >
                        <label class="form-check-label" for="flexCheckDefault">
                          Hết Hàng
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="cb2" type="checkbox" value="Mẫu mã khách hàng yêu cầu tạm hết">
                        <label class="form-check-label" for="flexCheckChecked">
                            Mẫu mã khách hàng yêu cầu tạm hết
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="cb3" type="checkbox" value="Một số chính sách không hợp lệ" >
                        <label class="form-check-label" for="flexCheckChecked">
                            Một số chính sách không hợp lệ
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="cb4" type="checkbox" value="Shipper Không Lấy Hàng Được" >
                        <label class="form-check-label" for="flexCheckChecked">
                            Shipper Không Lấy Hàng Được
                        </label>
                      </div>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="caterogy">Nhập Lý Do</label>
                <div class="col-sm-8">
                 
                    <textarea class="form-control" name="lydo" id="exampleFormControlTextarea1" rows="3"></textarea>

                </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-6 col-sm-6">
                <input type="hidden" name="id_donhang" value="{{$id_donhang}}">
                <button type="submit" class="btn btn-success btn-lg" name="submit">Xác nhận hủy đơn</button>
                <a href="{{route('adminOrder')}}"><button class="btn btn-danger btn-lg" name="edit_product">Trở lại</button></a>
            </div>
            </div>
            @csrf
          </form>
     
     

    

  </div>
@endsection
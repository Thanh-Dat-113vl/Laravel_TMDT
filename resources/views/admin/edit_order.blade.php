@extends('layout.site_admin')

@section('content')
<div class="container">
    <h2>Sửa Thông Tin Đơn Hàng</h2>
    @if (isset($list_order))
        @foreach ($list_order as $key => $item)
        @php
              $status = $item->status;
        @endphp
        <form class="form-horizontal" action="{{route('postEditOrder')}}" method="POST">
      <div class="form-group">
              <label class="control-label col-sm-2" for="fullname">Tên Người Nhận</label>
              <div class="col-sm-10">
                <input type="hidden" name="id_donhang" value="{{$item->id_donhang}}">
                <input type="text" class="form-control" value="{{$item->fullname}}"  name="fullname">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="enail">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->email}}"  name="email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="diachi">Địa Chỉ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->diachi}}"  name="diachi">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="sdt">Số điện thoại</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->sdt}}"  name="sdt">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="total">Đơn Giá</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->total}}"  name="total">
              </div>
            </div>
            @if ($status =='Đã thanh toán')
              <div class="form-group">
                <div class="col-sm-10">
                <label class="control-label col-sm-3" for="exampleFormControlSelect1">Trạng Thái Thanh Toán</label>
                <select class="form-control" id="exampleFormControlSelect1" name="status">
                  <option>Đã thanh toán</option>
                  <option>Chưa thanh toán</option>
                </select>
                </div>
              </div>
            @else 
            <div class="form-group">
              <label class="control-label col-sm-2" for="exampleFormControlSelect1">Trạng Thái Thanh Toán</label>
              <div class="col-sm-10">
                <select class="form-control" id="exampleFormControlSelect1" name="status">
                  <option >Chưa thanh toán</option>
                  <option >Đã thanh toán</option>
            
                </select>
              </div>
            </div>
            @endif
            
            {{-- <div class="form-group">
              <label class="control-label col-sm-2" for="name_caterogy">Trạng thái thanh toán</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->status}}"  name="name_caterogy">
              </div>
            </div> --}}
            
            <div class="form-group">
              <label class="control-label col-sm-6" for="exampleFormControlSelect1">Trạng Thái Đơn Hàng Hiện Tại: {{$item->trangthaidonhang}} </label>
              <div class="col-sm-10">
                <select class="form-control" id="exampleFormControlSelect1" name="trangthaidonhang">
                  <option >Chờ xác nhận</option>
                  <option >Đã xác nhận</option>
                  <option >Chuẩn bị giao hàng</option>
                  <option >Đang giao hàng</option>
                  <option >Đã giao hàng</option>
                </select>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-6 col-sm-6">
                <button type="submit" class="btn btn-success btn-lg" name="edit_order">Cập Nhật</button>
              </div>
            </div>
            @csrf
          </form>
        @endforeach
        <div class="" style="margin-left: 1000px">
          <a href="{{route('adminOrder')}}"><button class="btn btn-danger btn-lg" name="edit_order">Trở lại</button></a>
        </div>
        @else
        <h1 class="btn btn-danger">Lỗi kết nối dữ liệu</h1> 
    @endif
    

  </div>
@endsection
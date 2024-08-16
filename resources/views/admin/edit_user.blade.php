@extends('layout.site_admin')

@section('content')
<div class="container">
    <h2>Sửa thông tin thành viên</h2>
    @if (isset($list_user_by_id))
        @foreach ($list_user_by_id as $key => $item)
        <form class="form-horizontal" action="{{route('postEditUser')}}" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-2" for="taikhoan">UserName:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->username}}" placeholder="Nhập tài khoản" name="username">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="matkhau">Password</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->password}}"  placeholder="Nhập mật khẩu" name="password" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->email}}"  placeholder="Nhập email" name="email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="sdt">Số điện thoại</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->sdt}}"  placeholder="Nhập số điện thoại" name="sdt">
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="admin">Phân Quyền</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{$item->admin}}"  name="admin" >
                  <input type="hidden" name="id" value="{{$item->id}}">
                </div>
            </div>



            <div class="form-group">
              <div class="col-sm-offset-6 col-sm-6">
                <button type="submit" class="btn btn-success btn-lg" name="edit_user">Cập Nhật</button>
              </div>
            </div>
            @csrf
          </form>
        @endforeach
        <div class="" style="margin-left: 1000px">
          <a href="{{route('getAdmin')}}"><button class="btn btn-danger btn-lg" name="edit_user">Trở lại</button></a>
        </div>
        @else
        <h1 class="btn btn-danger">Lỗi kết nối dữ liệu</h1>
    @endif


  </div>
@endsection

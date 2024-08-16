@extends('layout.site_admin')

@section('content')
<div class="container">
    <h2>Sửa Thông Tin Danh Mục</h2>
    @if (isset($list_caterogy_id))
        @foreach ($list_caterogy_id as $key => $item)
        <form class="form-horizontal" action="{{route('postEditCaterogy')}}" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-2" for="name_caterogy">Tên Danh Mục:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->name_caterogy}}"  name="name_caterogy">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="status">Trạng thái</label>
              <div class="col-sm-10">

                <input type="number"  min="0" max="1" class="form-control" value="{{$item->status}}"   name="status"  >
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
          <a href="{{route('Caterogy')}}"><button class="btn btn-danger btn-lg" name="edit_user">Trở lại</button></a>
        </div>
        @else
        <h1 class="btn btn-danger">Lỗi kết nối dữ liệu</h1>
    @endif


  </div>
@endsection

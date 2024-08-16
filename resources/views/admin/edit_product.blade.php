@extends('layout.site_admin')

@section('content')
<div class="container">
    <h2>Sửa thông tin sản phẩm</h2>
    @if (isset($list_product))
        @foreach ($list_product as $key => $item)
        <form class="form-horizontal" action="{{route('postEditProduct')}}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-4" for="caterogy">Danh mục:</label>
                <div class="col-sm-8">
                    <select class="form-control" name="caterogy"  required>
                        <option value="{{$item->id_caterogy}}">{{$item->caterogy_name}} </option>
                        @if (isset($list_caterogy))
                            @foreach ($list_caterogy as $key => $value)

                                @if ($value->name_caterogy == $item->caterogy_name)
                                    @continue
                                 @endif
                                <option value="{{$value->id}}">{{$value->name_caterogy}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="product_name">Tên sản phẩm</label>
              <div class="col-sm-10">
                <input type="hidden" value="{{$item->id}}" name="id">
                <input type="text" class="form-control" value="{{$item->product_name}}"  placeholder="Nhập tên sản phẩm" name="product_name">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="image">Hình ảnh</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="image">
                <input type="hidden" name="image_old" value="{{$item->image}}">
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-2" for="price">Giá</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" value="{{$item->price}}"  name="price">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="sltk">Số lượng tồn kho</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$item->soluongtonkho}}"  placeholder="Nhập số lượng tồn kho" name="sltk">
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="mota">Mô tả sản phẩm</label>
                <div class="form-outline col-sm-10">
                    <textarea class="form-control" name="mota" rows="4">{{$item->mota}}</textarea>
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
                <button type="submit" class="btn btn-success btn-lg" name="edit_product">Cập Nhật</button>
                <a href="{{route('adminProduct')}}"><button class="btn btn-danger btn-lg" name="edit_product">Trở lại</button></a>
            </div>
            </div>
            @csrf
          </form>
        @endforeach
        <div class="col-sm-offset-6 col-sm-6" style="margin-left: 1000px">
          <a href="{{route('adminProduct')}}"><button class="btn btn-danger btn-lg" name="edit_product">Trở lại</button></a>
        </div>
        @else
        <h1 class="btn btn-danger">Lỗi kết nối dữ liệu</h1>
    @endif


  </div>
@endsection

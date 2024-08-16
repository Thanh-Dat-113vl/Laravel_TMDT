@extends('layout.site_admin')

@section('content')
    <!-- Content Wrapper -->


    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#them">Thêm sản phẩm</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Danh mục</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Size</th>
                                <th>Số lượng tồn kho</th>
                                <th>Mô tả</th>
                                <th>Trạng Thái</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>


                        <tbody>
                            @if (isset($list_product))
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($list_product as $key => $item)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $item->caterogy_name }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td><img height="90" src="assets/images/{{ $item->image }}" alt="Ảnh Lỗi"></td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->soluongtonkho }}</td>
                                        <td>{{ $item->mota }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->create_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td><a href="{{ route('EditProduct', ['id' => $item->id]) }}"
                                                class="btn btn-warning btn-circle"><i class="fas fa-pen"></i></a></td>
                                        <td><a onclick="return confirm('Bạn có chắn chắn muốn xóa không?')"
                                                href="{{ route('DeleteProduct', ['id' => $item->id]) }}"
                                                class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>

                                    </tr>
                                    @php
                                        $stt++;
                                    @endphp
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12">Không có sản phẩm</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!--modal-->
    <div id="them" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="color:blue" class="modal-title">Thêm Sản Phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('addproduct_byadmin') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="name_product">Danh mục:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="caterogy">
                                    <option selected disabled>Chọn danh mục</option>
                                    @if (isset($list_caterogy))
                                        @foreach ($list_caterogy as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->name_caterogy }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="name_product">Tên sản phẩm:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm"
                                        name="name_product" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="image">Hình ảnh:</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="price">Giá: </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" placeholder="Nhập giá" name="price"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="size">Size: </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Nhập size" name="size"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="sltk">Số lượng tồn kho: </label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" placeholder="Nhập số lượng tồn kho"
                                        name="sltk">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="mota">Mô tả sản phẩm: </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="mota" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-6" for="status">Trạng Thái:</label>
                                <div class="col-sm-12">
                                    <input type="number" value="1" class="form-control"
                                        placeholder="Nhập trạng thái" name="status" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Thêm</button>
                                </div>
                            </div>
                            @csrf
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

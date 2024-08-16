@extends('layout.site_admin')

@section('content')
     <!-- Content Wrapper -->

         
            <!-- Begin Page Content -->
            <div class="container-fluid">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Danh sách Đơn đặt hàng</h1>
                

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
      
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Mã Đơn</th>
                                        <th>ID User</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Địa Chỉ</th>
                                        <th>Đơn Giá</th>
                                        <th>Người nhận</th>
                                        <th>Loại Thanh Toán</th>
                                        <th>Trạng thái Thanh Toán</th>
                                        <th>Create Date</th>
                                        <th>Trạng thái đơn</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>

                     
                                <tbody>
                                    @if (isset($list_order))
                                          
                                        @foreach ($list_order as $key => $item)
                                          
                                    <tr>
                                        <td>#{{$item->id_donhang}}</td>
                                        <td>{{$item->id_user}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->sdt}}</td>
                                        <td>{{$item->diachi}}</td>
                                        <td>${{$item->total}}</td>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{$item->loaithanhtoan}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->create_at}}</td>
                                        <td>{{$item->trangthaidonhang}}</td>
                                        
                                        <td><a href="{{route('DetailOrder',['id'=>$item->id_donhang])}}" class="btn btn-warning">Xem Chi Tiết</a></td>
                                        <td><a href="{{route('EditOrder',['id'=>$item->id_donhang])}}" class="btn btn-success">Cập nhật</a></td>
                                        <td><a href="{{route('DeleteOrder',['id'=>$item->id_donhang])}}" class="btn btn-danger">Hủy Đơn Hàng</i></a></td>
                                        {{-- <td><a onclick="return confirm('Bạn có chắn chắn muốn xóa không?')" href="{{route('getDeleteUser',['id'=>$item->id])}}" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td> --}}
                                      
                                    </tr>
                                        
                                       @endforeach
                                       
                                    @else
                                        <tr>
                                            <td colspan="7">Không có người dùng</td>
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
                    <h4 style="color:blue" class="modal-title">Thêm Người Dùng</h4>
                    <button  type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                <form class="form-horizontal" action="{{route('adduser_byadmin')}}" method="POST">
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="username">UserName:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  placeholder="Nhập username" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                            <div class="col-sm-10">          
                                <input type="password"   class="form-control"  placeholder="Nhập password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="repassword">Repassword</label>
                            <div class="col-sm-10">          
                                <input type="password"  class="form-control" placeholder="Nhập lại password" name="repassword" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email: </label>
                                <div class="col-sm-10">          
                                    <input type="email"  class="form-control"  placeholder="Nhập email" name="email" required>
                                </div>
                            </div>
                        <div class="form-group">
                                <label class="control-label col-sm-2" for="sdt">Phone: </label>
                                    <div class="col-sm-10">          
                                        <input type="number"  class="form-control"  placeholder="Nhập số điện thoại" name="sdt" required>
                                    </div>
                                </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sdt">Admin: </label>
                                <div class="col-sm-10">          
                                    <input type="number" value="0" class="form-control"  placeholder="1-Admin/0-User" name="admin" >
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

@endsection

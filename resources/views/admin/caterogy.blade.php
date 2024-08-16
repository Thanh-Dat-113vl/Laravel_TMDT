@extends('layout.site_admin')

@section('content')


        <!-- Topbar -->
        
        {{-- End topbar --}}
        <!-- Begin Page Content -->

        <!-- Main Content -->
        <div class="container-fluid">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Danh Sách Danh Mục</h1>
            

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <button class="btn btn-success" data-toggle="modal" data-target="#themdanhmuc">Thêm Danh Mục</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Trạng Thái</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                 
                            <tbody>
                                @if (isset($list_caterogy))
                                        @php
                                            $stt = 1;
                                        @endphp
                                    @foreach ($list_caterogy as $key => $item)
                                      
                                <tr>
                                    <td>{{$stt}}</td>
                                    <td>{{$item->name_caterogy}}</td>
                                    <td>{{$item->status}}</td>
                                    <td><a href="{{route('edit_Caterogy',['id'=>$item->id])}}" class="btn btn-warning btn-circle"><i class="fas fa-pen"></i></a></td>
                                    <td><a onclick="return confirm('Bạn có chắn chắn muốn xóa không?')" href="{{route('DeleteCaterogy',['id'=>$item->id])}}" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>
                                  
                                </tr>
                                    @php
                                        $stt++;
                                    @endphp
                                   @endforeach
                                   
                                @else
                                    <tr>
                                        <td colspan="7">Không có danh mục</td>
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
<div id="themdanhmuc" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="color:blue" class="modal-title">Thêm Danh Mục</h4>
                <button  type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="{{route('add_Caterogy')}}" method="POST">
                    <div class="form-group">
                    <label class="control-label col-sm-6" for="name_caterogy">Tên Danh Mục:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"  placeholder="Nhập danh mục" name="name_caterogy" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-6" for="status">Trạng Thái:</label>
                        <div class="col-sm-12">          
                            <input type="number" value="1"   class="form-control"  placeholder="Nhập trạng thái" name="status" required>
                        </div>
                    </div>
    
                    <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Thêm danh mục</button>
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
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
        <h1 class="h3 mb-2 text-gray-800">Danh sách người dùng</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#them">Thêm người dùng</button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Phone</th>

                                <th>Admin</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                                <th>Update</th>
                                <th>Trạng thái</th>
                                <th>Delete</th>
                            </tr>
                        </thead>


                        <tbody>
                            @if (isset($list_users))
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($list_users as $key => $item)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->sdt }}</td>

                                        <td>{{ $item->admin }}</td>
                                        <td>{{ $item->create_at }}</td>
                                        <td>{{ $item->update_at }}</td>
                                        @if (session('phanquyen') == 2)
                                            <td></td>
                                            <td></td>
                                        @else
                                            <td><a href="{{ route('getEditUser', ['id' => $item->id]) }}"
                                                    class="btn btn-warning btn-circle"><i class="fas fa-pen"></i></a></td>
                                            {!! $item->isLocked
                                                ? '<td><a onclick="return confirm(\'Bạn có chắc chắn muốn mở khóa tài khoản này không?\')" href="' .
                                                    route('getUnLock', ['username' => $item->username, 'isLocked' => 0]) .
                                                    '" class="btn btn-success btn-circle"><i class="fas fa-lock-open"></i></a></td>'
                                                : '<td><a onclick="return confirm(\'Bạn có chắc chắn muốn khóa tài khoản này không?\')" href="' .
                                                    route('getLock', ['username' => $item->username, 'isLocked' => 1]) .
                                                    '" class="btn btn-danger btn-circle"><i class="fas fa-lock"></i></a></td>' !!}




                                            <td><a onclick="return confirm('Bạn có chắn chắn muốn xóa không?')"
                                                    href="{{ route('getDeleteUser', ['id' => $item->id]) }}"
                                                    class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>
                                        @endif

                                    </tr>
                                    @php
                                        $stt++;
                                    @endphp
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('adduser_byadmin') }}" method="POST">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">UserName:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập username" name="username"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Nhập password" name="password"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="repassword">Repassword</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="Nhập lại password"
                                    name="repassword" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email: </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="Nhập email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sdt">Phone: </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="Nhập số điện thoại" name="sdt"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sdt">Admin: </label>
                            <div class="col-sm-10">
                                <input type="number" value="0" class="form-control" placeholder="1-Admin/0-User"
                                    name="admin">
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

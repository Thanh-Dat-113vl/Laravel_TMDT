@extends('layout.site_admin')

@section('content')


    <!-- Topbar -->

    {{-- End topbar --}}
    <!-- Begin Page Content -->

    <!-- Main Content -->
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh Sách đánh giá</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người đánh giá</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
                                <th>Delete</th>
                            </tr>
                        </thead>


                        <tbody>
                            @if (isset($list_ratings))
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach ($list_ratings as $key => $item)
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $item->username }}</td>

                                        <td>{{ $item->ra_content }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td><a onclick="return confirm('Bạn có chắn chắn muốn xóa không?')"
                                                href="{{ route('DeleteRating', ['id' => $item->id]) }}"
                                                class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>

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

@endsection

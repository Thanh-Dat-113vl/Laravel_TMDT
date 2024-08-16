<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/main_info_user')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <title>User</title>
</head>

<body>
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img style="max-height: 200px" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                
                                @if (isset($list_info_user))
                                    @foreach ($list_info_user as $key => $item)
                                        <h5 class="user-name">{{$item->username }}</h5>
                                        <h6 class="user-email">{{$item->email }}</h6>
                                    @endforeach
                                @else
                                    <h5 class="user-name">UserName</h5>
                                    <h6 class="user-email">Email</h6>
                                @endif
                                
                            </div>
                            <div class="about">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        @if(session()->has('fail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('fail') }}
                        </div>
                        @endif
                        <form action="" method="POST">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Thông tin cá nhân</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        @if (isset($list_info_user))
                                            @foreach ($list_info_user as $key => $item)
                                                <label for="username">User Name</label>
                                                <input type="text" class="form-control" name="username" value="{{$item->username}}" placeholder="Enter Username" disabled>
                                            @endforeach
    
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        @if (!empty($list_info_user))
                                            @foreach ($list_info_user as $key => $item)
                                                <label for="eMail">Email</label>
                                                <input type="email" class="form-control"  name="email" value="{{$item->email}}" placeholder="Enter email ID">
                                            @endforeach
                                        @else
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control"  name="email" value=" " placeholder="Enter email ID">
                                        @endif
                                       
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                    @if (!empty($list_info_user))
                                        @foreach ($list_info_user as $key => $item)
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control"  name="sdt" value="{{$item->sdt}}" placeholder="Enter phone number">
                                        @endforeach
                                    @else
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control"  name="sdt" value=" " placeholder="Enter phone number">
                                    @endif
                                       
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                    @if (!empty($list_info_user))
                                        @foreach ($list_info_user as $key => $item)
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" value="{{$item->fullname}}" placeholder="Enter full name">
                                        @endforeach
                                    @else
                                        <label for="fullName">Full Name</label>
                                        <input type="text" class="form-control" name="fullname" value=" "  placeholder="Enter full name">
                                    @endif
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Địa chỉ</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        @if (!empty($list_info_user))
                                            @foreach ($list_info_user as $key => $item)
                                                <input type="name" class="form-control" name="diachi" value="{{$item->diachi}}"> 
                                            @endforeach
                                        @else
                                                <input type="name" class="form-control" name="diachi" value=" "> 
                                        @endif
                                
                                    </div>

                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <button type="button"  class="btn btn-secondary"><a style="color: #fff; text-decoration: none;"; href="{{route('index')}}">Cancel</a></button>
                                                <button type="submit"  name="submit_update" value="submit_update" class="btn btn-primary">Update</button>
                                               
                                            </div>
                                            <div class="text-left">
                                                <button  type="submit"   class="btn btn-danger"><a style="color: #fff; text-decoration: none" href="{{route('LogOut')}}">Đăng Xuất</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-9 col-md-12 col-sm-12 col-9">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Đổi mật khẩu</h6>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">                       
                                        <label for="username">Mật khẩu hiện tại</label>
                                        <input type="password" class="form-control" name="password_present" value="" placeholder="Nhập mật khẩu hiện tại" >
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="newpassword">Mật khẩu mới</label>
                                        <input type="password" class="form-control"  name="new_pasword" value="" placeholder="Nhập mật khẩu mới">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="re_new_password">Nhập lại mật khẩu mới</label>
                                        <input type="password" class="form-control"  name="re_new_password"  placeholder="Nhập lại mật khẩu mới">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <button type="submit"  name="submit_password" value="submit_password" class="btn btn-primary">Đổi mật khẩu</button>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
</body>

</html>
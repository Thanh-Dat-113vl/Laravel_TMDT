<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng ký</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('assets/css/styleform.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		@if (session('msg'))
			<div class="alert alert-success">{{session('msg')}}</div>
		@endif
		@if ($errors->any())
			<div class="alert alert-danger">Dữ liệu không hợp lẹ</div>
		@endif
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sign Up User</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset('assets/images/signup.jpg')}});"></div>
                        <h3 class="text-center mb-0">Mời Bạn Đăng ký tài khoản</h3>
						<form action="" class="login-form" method="POST">
		      		        <div class="form-group">
		      			    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			    <input name="username" type="text" class="form-control" value="{{old('username')}}" placeholder="Username" required>
							@error('username')
                 				<span style="color: red">{{$message}}</span>
           				 	@enderror
		      		        </div>
	                <div class="form-group">
	            	    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	                    <input name="password" type="password" class="form-control" placeholder="Password" required>
	                </div>

                    <div class="form-group">
	            	    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	                    <input name="password_confirmation" type="password" class="form-control" placeholder="Re-Password" required>
	                </div>
							@error('password')
                 				<span style="color: red">{{$message}}</span>
           				 	@enderror
                    <div class="form-group">
	            	    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-envelope"></span></div>
	                    <input name="email" type="email" class="form-control" value="{{old('email')}}" placeholder="Email" required>
	                </div>
							@error('email')
                 				<span style="color: red">{{$message}}</span>
           				 	@enderror
                    <div class="form-group">
	            	    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-phone"></span></div>
	                    <input name="sdt" type="number" class="form-control" value="{{old('sdt')}}" placeholder="Phone Number" required pattern="(\+84|0)\d{9,10}" title="Nhập số điện thoại từ 10 đến 11 số">
	                </div>
							@error('sdt')
                 				<span style="color: red">{{$message}}</span>
           				 	@enderror

	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3">Sign Up</button>
	            </div>
				@csrf
	          </form>
	          <div class="w-100 text-center mt-4 text">
		          <a href="{{route('login')}}">Login</a>
	          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('assets/client/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/client/js/popper.js')}}"></script>
    <script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/client/js/main.js')}}"></script>

	</body>
</html>


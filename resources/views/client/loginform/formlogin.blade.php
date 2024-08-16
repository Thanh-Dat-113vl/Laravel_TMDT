<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('assets/css/styleform.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		@if(session()->has('fail'))
		<div class="alert alert-dark" role="alert">
			{{ session()->get('fail') }}
			</div>
		@endif
		@if(session()->has('success'))
		<div class="alert alert-success" role="alert">
			{{ session()->get('success') }}
			</div>
		@endif
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login info user</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset('assets/images/login.jpg')}});"></div>
		      	<h3 class="text-center mb-0">Xin Chào, Mời Bạn Đăng Nhập</h3>

				<form action="" method="POST" class="login-form">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input name="username" type="text" class="form-control" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input name="password" type="password" class="form-control" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
								<div class="w-100 text-md-left">
									<a href="{{route('index')}}">Home</a>
								</div>
								<div class="w-100 text-md-right">
									<a href="{{route('ForgotPass')}}">Quên Mật Khẩu</a>
								</div>
	            </div>
				<div class="form-group d-md-flex">

				</div>
	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3">Get Started</button>
	            </div>
				@csrf
	          </form>
	          <div class="w-100 text-center mt-4 text">
	          	<p class="mb-0">Don't have an account?</p>
		          <a href="{{route('signup')}}">Sign Up</a>
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


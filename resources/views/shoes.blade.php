@extends('layout.site')

@section('content')
<div id="shoes" class="collection_text">Sản Phẩm</div>
<div class="layout_padding gallery_section">

    <div class="container">

		<div class="main">
			<!-- Another variation with a button -->
			<form action="" method="GET">
			<div class="input-group">

				<input type="search" class="form-control" name="keyword" value="{{request()->keyword}}" placeholder="Từ khóa tìm kiếm...">
				<div class="input-group-append">
					<button class="btn btn-secondary"  type="submit" style="background-color: #f26522; border-color:#f26522 ">
					<i class="fa fa-search"></i>
					</button>

				</div>

			</div>

			</form>
		</div>
		<div  class="container">
			<h1>Danh mục sản phẩm</h1>
			<nav class="navbar navbar-expand-sm bg-light">

				<div class="container-fluid">
				  <!-- Links -->
				  <ul class="navbar-nav">
					<li class="nav-item">
						<a style="font-size:20px" class="nav-link" href="{{route('shoes')}}">Tất cả</a>
					  </li>
					@if (isset($list_caterogy))
						@foreach ($list_caterogy as $key => $item)
						  <li class="nav-item">
							<a style="font-size:20px"  class="nav-link" href="{{route('shoes_by_caterogy',['id_caterogy'=>$item->id])}}">{{$item->name_caterogy}}</a>
						  </li>
						@endforeach
					@else
						<li class="nav-item">
						<a class="nav-link" href="#">Không có danh mục</a>
					  </li>
					@endif
				  </ul>
				</div>

			  </nav>
		</div>
        <div class="row">
            @foreach ($list_product as $key => $item)
			<div class="col-sm-4">
				<div class="best_shoes">
					<p class="best_text">{{$item->product_name}}</p>
					<div class="shoes_icon"><a id="shoes_icon" href="{{route('infoProduct',['id'=>$item->id])}}"><img style="max-width:200px; height: auto;" src="assets/images/{{$item->image}}"></a></div>
					<div class="star_text">
						<div class="left_part">
							<ul>
								<li><a href="#"><img src="{{asset('assets/images/star-icon.png')}}"></a></li>
								<li><a href="#"><img src="{{asset('assets/images/star-icon.png')}}"></a></li>
								<li><a href="#"><img src="{{asset('assets/images/star-icon.png')}}"></a></li>
								<li><a href="#"><img src="{{asset('assets/images/star-icon.png')}}"></a></li>
								<li><a href="#"><img src="{{asset('assets/images/star-icon.png')}}"></a></li>
							</ul>
						</div>
					<div class="right_part">
							<div class="shoes_price">$<span style="color: #ff4e5b; font-size: 22px">{{$item->price}}</span> </div>
						</div>
					</div>
					</div>
			</div>
			@endforeach
        </div>
        <div class="buy_now_bt">
            <button class="buy_text">See More</button>
        </div>
    </div>
</div>
<script>
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>
@endsection



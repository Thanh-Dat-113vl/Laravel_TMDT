<div  class="container">
    <h1>Danh mục sản phẩm</h1>
    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container-fluid">
          <!-- Links -->
          <ul class="navbar-nav">
            @if (isset($list_caterogy))
                @foreach ($list_caterogy as $key => $item)
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('shoes_by_caterogy',['id_caterogy'=>$item->id])}}">{{$item->name_caterogy}}</a>
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
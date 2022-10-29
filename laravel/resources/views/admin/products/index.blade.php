<x-admin>
<!--   @if (session('msg'))
  <div id="formSentMsgSc" class="alert alert-success">
    {{session('msg')}}
  </div>
  @endif

  @if (session('error'))
  <div id="formSentMsgEr" class="alert alert-danger">
    {{session('error')}}
  </div>
  @endif -->
	<div class="card-body">
        <div class="card-tools float-right mb-2">
            <form method="get" class="row g-3">
                @csrf
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="key" value="{{request('key')}}" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">STT</th>
              <th>Tên Sản Phẩm</th>
              <th>Số Lượng Còn</th>
              <th>Số Lượng Đã Bán</th>
              <th>Giảm Giá</th>
              <th style="width: 110px">Chức Năng</th>
            </tr>
          </thead>
          <tbody>
          	 @foreach($products as $product)
            <tr>
              <td>{{ ($loop->index+1)+($products->currentPage()-1)*$products->perPage()  }}</td>
              <td>
              	<a href="{{route('admin.products.show', ['product' => $product -> id])}}">
              		{{ $product->product_name }}
              	</a>
              </td>
              <td>
                <div class="quantity">
                  <div><h3>{{$product->quantity}}</h3></div>
                </div>
              </td>
              <td>
                <div class="sold_quantity">
                  <div><h3>{{$product->sold_quantity}}</h3></div>
                </div>
              </td>
              <td>
                <div class="sale_off">
                  <div><h3>{{$product->sale_off}}%</h3></div>
                </div>
              </td>
              <td>
                <div class="row">
                    <div class="col-6">
                        <button type="button"
                            class="btn btn-danger btn-sm confirm-delete"
                            data-toggle="modal"
                            data-target="#modal-delete"
                            data-url="{{ route('admin.products.destroy', ['product' => $product->id]) }}"
                            style="margin-top:8px" >
                            Xóa
                        </button>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-warning btn-sm" style="margin-top:8px">
                            Sửa
                        </a>
                    </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
<!--     <script>
      $("#formSentMsgSc").delay(500).fadeOut(1000);
      $("#formSentMsgEr").delay(500).fadeOut(1000);
    </script> -->
    <div class="row">
        <div class="col-6 mb-3">
            <div class="row">
                <div class=" ml-3 col-2">
                    <form method="GET" action="">
                        <select onchange="this.form.submit()" class="custom-select-md form-control form-control-md" name="perpage">
                            <option
                            @if (request('perpage') == 5) selected @endif value="5">5
                            </option>
                            <option
                            @if (request('perpage') == 10) selected @endif value="10">10
                            </option>
                            <option
                            @if (request('perpage') == 20) selected @endif value="20">20
                            </option>
                            <option
                            @if (request('perpage') == 30) selected @endif value="30">30
                            </option>
                            <option
                            @if (request('perpage') == 50) selected @endif value="50">50
                            </option>
                        </select>
                    </form>
                </div>
                <div class="col-3 mt-1">Trên một trang</div>
            </div>
        </div>
        <div class="col-6">
            {{ $products->links('includes.pagination-admin') }}
        </div>
    </div>

    <!-- /.card-body -->
  @include('includes-admin.delete')
</x-admin>

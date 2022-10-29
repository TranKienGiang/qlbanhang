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
                  <th>Tên Loại Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th style="width: 110px">Chức Năng</th>
                </tr>
              </thead>
              <tbody>
                   @foreach($categories as $category)
                <tr>
                  <td>{{ ($loop->index+1)+($categories->currentPage()-1)*$categories->perPage()  }}</td>
                  <td>
                      <a href="{{route('admin.categories.show', ['category' => $category -> id])}}">
                          {{ $category->name }}
                      </a>
                  </td>
                  <td>
                    <div class="sale_off">
                      <div><h3>{{$category->quantity}}</h3></div>
                    </div>
                  </td>
                  <td>
                      <!-- <a href="" class="btn btn-block btn-info btn-sm" target="_blank">
                          Demo
                      </a> -->
                    <div class="row">
                        <div class="col-6">
                        <button type="button"
                            class="btn btn-danger btn-sm confirm-delete"
                            data-toggle="modal"
                            data-target="#modal-delete"
                            data-url="{{ route('admin.categories.destroy', ['category' => $category->id]) }}"
                            style="margin-top:8px" >
                            Xóa
                        </button>
                        </div>
                        <div class="col-6">
                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-warning btn-sm" style="margin-top:8px">
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
        <div class="row">
            <div class="col-6 mb-3">
                <div class="row">
                    <div class="col-2 ml-3">
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
                {{ $categories->links('includes.pagination-admin') }}
            </div>
        </div>
    <!--     <script>
          $("#formSentMsgSc").delay(500).fadeOut(1000);
          $("#formSentMsgEr").delay(500).fadeOut(1000);
        </script> -->

        <!-- /.card-body -->
      @include('includes-admin.delete')
    </x-admin>

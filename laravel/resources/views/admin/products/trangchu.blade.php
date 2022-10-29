<x-admin>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $product_count }}</h3>
                            <p>Sản Phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.products.index') }}" class="small-box-footer">Thêm thông tin <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $category_count }}</h3>
                            <p>Loại Sản Phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.categories.index') }}" class="small-box-footer">Thêm thông tin <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $order_count }}<sup style="font-size: 20px"></sup></h3>
                            <p>Đơn Hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('admin.order-list') }}" class="small-box-footer">Thêm thông tin <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $user_count }}</h3>
                            <p>Đăng Ký Người Dùng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Thêm thông tin <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh Sách Đánh Giá</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-bordered table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Đánh Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newmail as $newmails)
                                        <tr>
                                            <td>{{ $newmails->id }}</td>
                                            <td>{{ $newmails->name }}</td>
                                            <td>{{ $newmails->email }}</td>
                                            <td>{{ $newmails->message }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Top Sản Phẩm Ban Chạy</h3>
                        </div>

                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-bordered table-hover table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="align-top" style="width: 10px;">Top</th>
                                        <th class="align-top">Tên Sản Phẩm</th>
                                        <th class="align-top">Số Lượng Bán</th>
                                        <th class="align-top">Số Lượng Còn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sold_product as $sold_products)
                                    <tr>
                                        <td class="stt text-center"></td>
                                        <td>{{$sold_products->product_name}}</td>
                                        <td class="text-center">
                                            <span style="font-size: 16px" class="text-center font-weight-bold text-success">{{$sold_products->sold_quantity}}</span>
                                        </td>
                                        <td class="text-center">
                                            <span style="font-size: 16px" class="text-center font-weight-bold text-warning">{{$sold_products->quantity}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin>

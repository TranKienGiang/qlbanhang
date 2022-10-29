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
                        <a href="{{ route('admin.order-products-list') }}" class="small-box-footer">Thêm thông tin <i
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
                <div class="col-lg-12">
                    <div class="card" id="container-day" data-list-year="{{ $listYear }}"
                        data-list-money-y="{{ $arrStatisticalYear }}"
                        data-list-order-y="{{ $arrStatisticalYearOrder }}">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Doanh Thu Cửa Hàng</h3>
                                <a href="javascript:void(0);">Xem Báo Cáo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg"></span>
                                    <span></span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i>
                                    </span>
                                    <span class="text-muted"></span>
                                </p>
                            </div>
                            <div class="row">
                                <div style="width:50% !important" class="position-relative mb-4">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="myChart2" width="400" height="200"></canvas>
                                    <div class="mt-5 justify-content-start">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-info"></i> Biểu đồ doanh thu theo 3 năm gần đây
                                        </span>
                                    </div>
                                </div>

                                <div style="width:50% !important" class="position-relative mb-4">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="myChart3" width="400" height="200"></canvas>
                                    <div class="d-flex flex-row mt-5 justify-content-start">
                                        <span class="mr-2">
                                            <i class="fas fa-square text-success"></i> Biểu đồ số lượng đơn hàng theo 3 năm gần đây
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin>

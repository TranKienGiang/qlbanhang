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
                        <a href="{{route('admin.products.index')}}" class="small-box-footer">Thêm thông tin <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="{{route('admin.categories.index')}}" class="small-box-footer">Thêm thông tin <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$order_count}}<sup style="font-size: 20px"></sup></h3>
							<p>Đơn Hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('admin.order-products-list')}}" class="small-box-footer">Thêm thông tin <i
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
					<div class="card" id="container-day" data-list-day="{{$listDay}}" data-list-money="{{$arrTransactionMonth}}" data-list-order="{{$arrTransactionMonthOrder}}">
						<div class="card-header border-0">
							<div class="d-flex justify-content-between">
								<h3 class="card-title">Doanh Thu Cửa Hàng</h3>
								<a href="javascript:void(0);">Xem Báo Cáo</a>
							</div>
						</div>
						<div class="card-body">
							<div class="d-flex">
								<p class="d-flex flex-column">
									<span class="text-bold text-lg">820</span>
									<span>Visitors Over Time</span>
								</p>
								<p class="ml-auto d-flex flex-column text-right">
									<span class="text-success">
										<i class="fas fa-arrow-up"></i> 12.5%
									</span>
									<span class="text-muted">Since last week</span>
								</p>
							</div>

							<div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
							<canvas id="myChart" width="500" height="300"></canvas>
						</div>
						<div class="d-flex flex-row justify-content-end">
							<span class="mr-2">
								<i class="fas fa-square text-warning"></i> Biểu đồ doanh thu tháng 6 năm 2022
							</span>
							{{-- <span>
								<i class="fas fa-square text-gray"></i> Last Week
							</span> --}}
						</div>
					</div>
				</div>

				{{-- <div class="card">
					<div class="card-header border-0">
						<h3 class="card-title">Products</h3>
						<div class="card-tools">
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-download"></i>
							</a>
							<a href="#" class="btn btn-tool btn-sm">
								<i class="fas fa-bars"></i>
							</a>
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead>
								<tr>
									<th>Product</th>
									<th>Price</th>
									<th>Sales</th>
									<th>More</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<img src="/Admin/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
										Some Product
									</td>
									<td>$13 USD</td>
									<td>
										<small class="text-success mr-1">
											<i class="fas fa-arrow-up"></i>
											12%
										</small>
										12,000 Sold
									</td>
									<td>
										<a href="#" class="text-muted">
											<i class="fas fa-search"></i>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<img src="/Admin/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
										Another Product
									</td>
									<td>$29 USD</td>
									<td>
										<small class="text-warning mr-1">
											<i class="fas fa-arrow-down"></i>
											0.5%
										</small>
										123,234 Sold
									</td>
									<td>
										<a href="#" class="text-muted">
											<i class="fas fa-search"></i>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<img src="/Admin/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
										Amazing Product
									</td>
									<td>$1,230 USD</td>
									<td>
										<small class="text-danger mr-1">
											<i class="fas fa-arrow-down"></i>
											3%
										</small>
										198 Sold
									</td>
									<td>
										<a href="#" class="text-muted">
											<i class="fas fa-search"></i>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<img src="/Admin/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
										Perfect Item
										<span class="badge bg-danger">NEW</span>
									</td>
									<td>$199 USD</td>
									<td>
										<small class="text-success mr-1">
											<i class="fas fa-arrow-up"></i>
											63%
										</small>
										87 Sold
									</td>
									<td>
										<a href="#" class="text-muted">
											<i class="fas fa-search"></i>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div> --}}
			</div>
			{{-- <div class="card">
				<canvas id="myChart" width="400" height="400"></canvas>
			</div> --}}
		</div>
	</div>
</div>
</div>
</x-admin>

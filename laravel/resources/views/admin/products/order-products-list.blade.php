<x-admin>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Danh Sách Sản Phẩm Đặt</h3>
					<div class="card-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
							<div class="input-group-append">
								<button type="submit" class="btn btn-default">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="card-body table-responsive p-0" style="height: 300px;">
					<table class="table table-head-fixed text-nowrap">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên Sản Phẩm</th>
								<th>ID Đặt Hàng</th>
								<th>Số Lượng</th>
								<th>Giá</th>
								<th>Giảm Giá</th>
							</tr>
						</thead>
						<tbody>
							@foreach($Orderproducts as $Orderproduct)
							<tr>
								<td>{{$Orderproduct->id}}</td>
								<td>
                                    @foreach ($products as $product)
                                    @if ($product->id == $Orderproduct->product_id)
                                        {{$product->product_name}}
                                    @endif
                                    @endforeach
                                </td>
								<td>{{$Orderproduct->order_id}}</td>
								<td>{{$Orderproduct->quantity}}</td>
								<td>{{number_format($Orderproduct->price, 0, '', ',')}} ₫</td>
								<td>{{$Orderproduct->sale_off}} %</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<a href="{{route('orderProduct.export')}}" style="width: 10%;margin-left: 90%;" type="button" class="btn btn-block btn-outline-success">Xuất Excell</a>
</x-admin>

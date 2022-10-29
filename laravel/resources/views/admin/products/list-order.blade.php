<x-admin>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Danh Sách Đơn</h3>
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
								<th>Họ Tên</th>
								<th>Điện Thoại</th>
								<th>Địa Chỉ</th>
								<th>Lưu Ý</th>
								<th>Trạng Thái</th>
								<th>Chức Năng</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td>{{$order->id}}</td>
								<td>{{$order->name}}</td>
								<td>{{$order->phone}}</td>
								<td>{{$order->address}}</td>
								<td>{{$order->note}}</td>
								<td>
									@if($order->status_order == 1)Chuẩn Bị @endif
									@if($order->status_order == 2)Đang Giao @endif
									@if($order->status_order == 3)Đã Giao @endif
								</td>
								<td>
									<a class="btn btn-success" href="{{ route('admin.orders.edit', ['order' => $order->id]) }}">
										<i class="fas fa-edit"></i>
									</a>
								</form></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</x-admin>

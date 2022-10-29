<x-admin>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Danh Sách Đơn Hàng</h3>
					<div class="card-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
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
					</div>
				</div>

				<div class="card-body table-responsive p-0" style="height: 300px;">
					<table class="table table-head-fixed text-nowrap">
						<thead  class="table-success">
							<tr>
								<th>STT</th>
								<th>Họ Tên</th>
								<th>Điện Thoại</th>
								<th>Email</th>
								<th>Địa Chỉ</th>
								<th>Tổng Tiền</th>
								<th>Code</th>
								<th>Ghi Chú</th>
								<th>Trạng Thái</th>
								<th>Hình Thức Thanh Toán</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<td class="stt"></td>
								<td>{{$order->name}}</td>
								<td>{{$order->phone}}</td>
								<td>{{$order->email}}</td>
								<td>{{$order->address}}</td>
								<td>{{number_format($order->total_price, 0, '', ',')}} ₫</td>
								<td>{{$order->code}}</td>
								<td>{{$order->note}}</td>
								<td>
									@if($order->status_order == 1)Chuẩn Bị @endif
									@if($order->status_order == 2)Đang Giao @endif
									@if($order->status_order == 3)Đã Giao @endif
								</td>
                                <td>
									@if($order->payments == 0)Khi Nhận Hàng @endif
									@if($order->payments == 1)Trực Tuyến @endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<a href="{{route('order.export')}}" style="width: 10%;margin-left: 90%;" type="button" class="btn btn-block btn-outline-success">Xuất Excell</a>
</x-admin>

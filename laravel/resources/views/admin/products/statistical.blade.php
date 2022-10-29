<x-admin>
<form action="{{ route('admin.statistical') }}" method="GET" class="">
	@csrf
	<div class="card">
		<div class="card-header border-transparent">
			<h3 class="card-title">Thống Kê Đơn Hàng</h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove">
					<i class="fas fa-times"></i>
				</button>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-lg-4 ml-3">
				<label>Từ ngày:</label>
				<div class="input-group date" id="reservationdate" data-target-input="nearest">
					<input type="datetime-local" value="{{request('date_from')}}" name="date_from" class="form-control">
				</div>
			</div>
			<div class="form-group col-lg-4 ml-4">
				<label>Đến ngày:</label>
				<div class="input-group date" id="reservationdate" data-target-input="nearest">
					<input type="datetime-local" value="{{request('date_to')}}" name="date_to" class="form-control">
				</div>
			</div>
			<div class="form-group col-lg-2 d-flex align-items-end justify-content-center">
				<button type="submit" class="btn btn-info">Thực hiện</button>
			</div>
		</div>

		<div class="card-body table-responsive p-0" style="height: 300px;">
			<div class="table-responsive">
				<table class="table m-0">
					<thead>
						<tr>
							<th>Mã Đơn Hàng</th>
							<th>Họ Tên</th>
							<th>Trạng Thái</th>
							<th>Tổng Tiền</th>
							<th>Code</th>
							<th>Chú Ý</th>
						</tr>
					</thead>
					<tbody>
						@foreach($static as $statics)
						<tr>
							<td><a href="pages/examples/invoice.html">{{$statics->id}}</a></td>
							<td class="text-capitalize">{{$statics->name}}</td>
							<td><span style="width: 70px;" class="  badge
								@if($statics->status_order == 1) badge-primary @endif
								@if($statics->status_order == 2) badge-success @endif
								@if($statics->status_order == 3) badge-danger @endif
									 ">
								@if($statics->status_order == 1)Chuẩn Bị @endif
								@if($statics->status_order == 2)Đang Giao @endif
								@if($statics->status_order == 3)Đã Giao @endif </span></td>
							<td>{{number_format($statics->total_price, 0, '', ',')}} ₫</td>
							<td><a href="#">{{$statics->code}}</a></td>
							<td>
								<span class="external-event bg-warning ui-draggable ui-draggable-handle ">{{$statics->note}}</span>
							</td>
						</tr>
                        <tr>
						@endforeach
                        </tr>
					</tbody>
				</table>
			</div>
		</div>
        <div>
            @foreach($countstatic as $countstatics)
            @foreach($countprice as $countprices)
            <p style="margin-left: 20px" class="font-italic text-success">Tổng Số Đơn Hàng là {{@$countstatics->order_count}}   và tổng doanh thu là {{number_format(@$countprices->sumprice, 0, '', ',')}} ₫</p>
            @endforeach
            @endforeach
        </div>
	</form>
</x-admin>

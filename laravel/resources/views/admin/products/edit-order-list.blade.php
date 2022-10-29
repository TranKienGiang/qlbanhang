<x-admin>
	<form method="POST" action="{{ route('admin.orders.update', ['order' => $order->id]) }}">
		@csrf
		@method('PUT')
		<div class="card-body">
			<div class="form-group">
				<label>Full Name</label>
				<input type="text" value="{{old('name', @$order->name)}}" name="name" class="form-control"  placeholder="Enter ...">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" value="{{old('phone', @$order->phone)}}" name="phone" class="form-control"  placeholder="Enter ...">
			</div>
			<div class="form-group">
				<label>Address</label>
				<input name="address" value="{{old('address', @$order->address)}}" type="text" class="form-control"  placeholder="Enter ...">
			</div>
			<div class="form-group">
				<label>Note</label>
				<input name="note" value="{{old('note', @$order->note)}}" type="text" class="form-control"  placeholder="Enter ...">
			</div>
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status_order">
					<option class="form-control" value="1" @if ($order->status_order == 1) selected @endif>Chuẩn Bị</option>
					<option class="form-control" value="2" @if ($order->status_order == 2) selected @endif>Đang Giao</option>
					<option class="form-control" value="3" @if ($order->status_order == 3) selected @endif>Đã Giao</option>
				</select>
			</div>
			<div class="div-none">
				<div class="form-group ">
					<label>Code</label>
					<input name="code" value="{{old('code', @$order->code)}}" type="text" class="form-control"  placeholder="Enter ...">
				</div>
				<div class="form-group">
					<label>Total Price</label>
					<input name="total_price" value="{{old('total_price', @$order->total_price)}}" type="text" class="form-control"  placeholder="Enter ...">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input name="email" value="{{old('email', @$order->email)}}" type="text" class="form-control"  placeholder="Enter ...">
				</div>
			</div>
		</div>
		<button class="btn btn-primary">Submit</button>
	</form>
</x-admin>
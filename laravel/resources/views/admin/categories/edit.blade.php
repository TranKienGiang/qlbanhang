<x-admin>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Sửa Loại Sản Phẩm</h3>
        </div>
    </div>
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>tên Loại Sản Phẩm</label>
                <input name="name" type="name" class="form-control" placeholder="....."
                    value="{{ old('name', @$category->name) }}">
                @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Số Lượng</label>
                <input name="quantity" class="form-control" placeholder="Quantity"
                    value="{{ old('quantity', @$category->quantity) }}">
                @if ($errors->has('quantity'))
                    <span style="color: red">{{ $errors->first('quantity') }}</span>
                @endif
            </div>
            <div class="form-group">
				<div class="form-check">
				   <input name="is_public" class="form-check-input" type="checkbox" value="1"
                    @if (@$category->is_public) checked @endif
                    >
				  <label class="form-check-label">Trạng Thái</label>
				</div>
			</div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</x-admin>

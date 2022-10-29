<x-admin>
    @if (session('msg'))
        <div id="formSentMsgSc" class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    @if (session('error'))
        <div id="formSentMsgEr" class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{ $product->product_name }}</h3>
                    <div class="col-12">
                        <img src="{{ showProductImage($product->img_url) }}" class=" abc product-image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="{{ showProductImage($product->img_url) }}"
                                class=" abc product-image"></div>
                        <div class="product-image-thumb"><img src="{{ showProductImage($product->img_url) }}"
                                class=" abc product-image"></div>
                        <div class="product-image-thumb"><img src="{{ showProductImage($product->img_url) }}"
                                class=" abc product-image"></div>
                        <div class="product-image-thumb"><img src="{{ showProductImage($product->img_url) }}"
                                class=" abc product-image"></div>
                        <div class="product-image-thumb"><img src="{{ showProductImage($product->img_url) }}"
                                class=" abc product-image"></div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $product->product_name }}</h3>
                    <p>Sản Phẩm Chất Lượng Đến Từ Vị Trí Của Giang Cá Khô .</p>
                    <hr>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            {{ number_format($product->price, 0, '', ',') }} ₫
                        </h2>
                        <h4 class="mt-0">
                            <small>Giảm giá : {{ $product->sale_off }}% </small>
                        </h4>
                    </div>
                    <div class="mt-4 product-share">
                        <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-envelope-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-rss-square fa-2x"></i>
                        </a>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                            role="tab" aria-controls="product-desc" aria-selected="true">Mô tả</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                            href="#product-comments" role="tab" aria-controls="product-comments"
                            aria-selected="false">Bình luận</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                            role="tab" aria-controls="product-rating" aria-selected="false">Xếp hạng</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                        aria-labelledby="product-desc-tab"> Áo Polo Gucci Polo Ss2019 Màu Trắng được thiết kế cổ bẻ, tay
                        ngắn, có họa tiết con ong nhiều màu đặc trưng của Gucci tạo nên sự năng động, trẻ trung cho
                        người mặc nhưng cũng không kém phần lịch lãm, sang trọng. Với chất liệu 100% cotton, áo có mềm,
                        mịn, thông thoáng tạo cảm giác thoải mái cho người mặc.. </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel"
                        aria-labelledby="product-comments-tab"> Shop gói hàng cẩn thận, sản phẩm giống hình, chất lượng
                        ok so với giá tiền, nên mua ạ. E trừ 1 sao vì shop giao nhầm áo màu đen sang tím than, mong shop
                        để ý hơn.Phải nói là trong mùa dịch lên chờ lâu ơi là lâu.ngoại thành hn mà phải gần 1
                        tháng.nhưng cũng may vì áo khá đẹp.61kg mặc xl nhé
                    </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        <ul>
                            <li>Sản phẩm/dịch vụ này có dễ sử dụng? Cách sử dụng như thế nào?</li>
                            <li>Chất lượng của sản phẩm/dịch vụ này ra sao?</li>
                            <li>Sản phẩm dịch vụ này dành cho ai? Tôi có phù hợp để sử dụng nó?</li>
                            <li>Những giải pháp thay thế?</li>
                            <li>Sản phẩm/dịch vụ này có đáng để tôi chi tiền?</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</x-admin>

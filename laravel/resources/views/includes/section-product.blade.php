<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li>
                        <a style="color: black" href="{{route('products.selltop')}}"> Bán Chạy Nhất</a>
                    </li>
                    <li>
                        <a style="color: black"  href="{{route('products.new')}}"> Sản Phẩm Mới </a>
                    </li>
                    <li>
                        <a style="color: black" href="{{route('products.hotsales')}}">Hạ Giá Nổi Bật</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="/fashion/img/product/product-1.jpg">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="/fashion/img/icon/heart.png" alt=""></a></li>
                            <li><a href="#"><img src="/fashion/img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="/fashion/img/icon/search.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Piqué Biker Jacket</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$67.24</h5>
                        <div class="product__color__select">
                            <label for="pc-1">
                                <input type="radio" id="pc-1">
                            </label>
                            <label class="active black" for="pc-2">
                                <input type="radio" id="pc-2">
                            </label>
                            <label class="grey" for="pc-3">
                                <input type="radio" id="pc-3">
                            </label>
                        </div>
                    </div>
                </div>
            </div> -->
            @foreach($products as $product)
            @if ($product->quantity > 0)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg"  data-setbg="{{ showProductImage($product->img_url)}}">
                        @if($product->sale_off > 0 )
                        <span class="label">{{$product->sale_off}}%</span>
                        @endif
                        <ul class="product__hover">
                            <li><a href="#"><img src="/fashion/img/icon/heart.png" alt=""></a></li>
                            <li><a href="#"><img src="/fashion/img/icon/compare.png" alt=""> <span>So sánh</span></a></li>
                            <li><a href="{{route('product.show', ['id' => $product -> id])}}"><img src="/fashion/img/icon/search.png" alt=""> <span>Chi tiết</span></a></li>
                        </ul>
                    </div>

                    <div class="product__item__text">
                        <h6>{{ $product->product_name }}  </h6>
                        <a href="#" class="add-cart" data-product_id="{{ $product->id }}">+ Thêm vào giỏ</a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>{{number_format($product->price, 0, '', ',')}}₫</h5>
                        <div class="product__color__select">
                            <label for="pc-7">
                                <input type="radio" id="pc-7">
                            </label>
                            <label class="active black" for="pc-8">
                                <input type="radio" id="pc-8">
                            </label>
                            <label class="grey" for="pc-9">
                                <input type="radio" id="pc-9">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        {{ $products->links('includes.pagination') }}
    </div>
</section>

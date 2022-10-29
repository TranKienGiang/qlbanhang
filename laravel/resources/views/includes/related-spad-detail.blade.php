<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Sản Phẩm Liên Quan</h3>
            </div>
        </div>
        <div class="row">
            @foreach($getcategories as $getcategory)
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg"
                    data-setbg="{{ showProductImage($getcategory->img_url)}}">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="/fashion/img/icon/heart.png" alt=""></a></li>
                            <li><a href="#"><img src="/fashion/img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="/fashion/img/icon/search.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$getcategory->product_name}}</h6>
                        <a href="#" class="add-cart">+ Thêm vào giỏ</a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>{{number_format($getcategory->price, 0, '', ',')}} ₫</h5>
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
            </div>
            @endforeach
        </div>
    </div>
</section>

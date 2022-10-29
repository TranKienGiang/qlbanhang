<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Giỏ Hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="/home">Trang Chủ</a>
                        <a href="/shop">Shop</a>
                        <span>Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Giảm Giá</th>
                                <th>Tổng Tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img style="width: 90px" src="{{ showProductImage($product->img_url)}}" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $product->product_name }}</h6>
                                        <h5><span class="pricehide">{{number_format($product->price, 0, '', ',')}}</span> ₫</h5>
                                        <h5 hidden><span class="price">{{ $product->price}}</span></h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                            <input type="number" name="quantity"
                                                class="product-quantity quantity form-control input-number"
                                                value="{{ $productData[$product->id] }}"
                                                min="1"
                                                max="{{$product->quantity}}"
                                                data-product_id="{{ $product->id }}"
                                            >
                                        <!-- </div> -->
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="sale_off">
                                        <span class="sale-off">
                                            {{ $product->sale_off }}
                                        </span>%
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <span class="total">
                                        {{number_format(($product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100)), 0, '', ',')}}
                                    </span> ₫
                                </td>
                                <td class="cart__close">
                                    <i data-product_id="{{ $product->id }}" class="fa fa-close"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{route('shop')}}">Tiếp Tục Mua Sắm</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a class="update-cart"  href="{{ route('showcart') }}"><i class="fa fa-spinner"></i> Cập nhật giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Mã giảm giá</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Áp dụng</button>
                    </form>
                </div>
                <div id="cart_total" class="cart__total">
                    <h6>Tổng giỏ hàng</h6>
                    <ul>
                        <li>Tổng Tiền Hàng <span>{{number_format($subtotal, 0, '', ',')}} ₫</span></li>
                        <li>Phí Ship <span>{{number_format($delivery, 0, '', ',')}} ₫</span></li>
                        <li>Giảm Giá <span>{{number_format($discount, 0, '', ',')}} ₫</span></li>
                        <li>Tổng Tiền <span>{{number_format($total, 0, '', ',')}} ₫</span></li>
                    </ul>
                    <div class="row">
                    <a href="{{ route('order.checkout') }}" class="col-lg-6 primary-btn checkout">Thanh Toán Khi Nhận Hàng</a>
                    <form class="col-lg-6" method="post" action="{{ route('payment') }}">
                        @csrf
                        <button name="redirect" class="btn btn-warning" type="submit">Thanh Toán Qua VNPAY</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Shopping Cart Section End -->

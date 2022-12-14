<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thanh Toán</h4>
                    <div class="breadcrumb__links">
                        <a href="/home">Trang chủ</a>
                        <a href="/shop">Shop</a>
                        <span>Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Có mã giảm giá ? <a href="#">Bấm vào đây</a> để nhận mã giảm giá</h6>
                        <h6 class="checkout__title">Chi Tiết Thanh Toán</h6>
                        <div class="checkout__input">
                            <p>Họ Tên<span>*</span></p>
                            <input class="name" name="name" type="text">
                        </div>
                    <!--<div class="checkout__input">
                            <p>Phone<span>*</span></p>
                            <input type="text">
                        </div> -->
                        <div class="checkout__input">
                            <p>Địa Chỉ<span>*</span></p>
                            <input name="address" class="address" type="text" placeholder="Street Address" >
                        </div>
                       <!--  <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text">
                        </div> -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Điện Thoại<span>*</span></p>
                                    <input class="phone" name="phone" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input class="email" name="email" type="text">
                                </div>
                            </div>
                        </div>
                    <!--<div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                            <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        </div>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Note about your order, e.g, special noe for delivery
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div> -->
                        <input hidden name="payments" class="payments" type="text" value="0"/>
                        <div class="checkout__input">
                            <p>Ghi chú đơn hàng<span>*</span></p>
                            <input class="note" type="text"
                            placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Đơn đặt hàng của bạn</h4>
                            <div class="checkout__order__products">Sản Phẩm <span>Tổng Tiền</span></div>
                            <ul class="checkout__total__products">
                                @foreach($products as $product)
                                <li><p hidden class="productId">{{ $product->id }}</p>{{ $product->product_name }} (x
                                    {{ $productData[$product->id] }})
                                    <p class="producQuantity" hidden>{{ $productData[$product->id] }}</p>
                                    <span>
                                        {{number_format($product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100), 0, '', ',')}} ₫
                                    </span>
                                </li>
                                @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Tổng Tiền Hàng <span> ₫ </span><span>{{number_format($subtotal, 0, '', ',')}} </span></li>
                                    <li> Tổng Tiền <span> ₫ </span><span name="total" class="total_price1"> {{number_format($total, 0, '', ',')}} </span></li>
                                    <li style="display: none"> Total <span> ₫ </span><span name="total" class="total_price"> {{$total}} </span></li>
                                </ul>
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p> -->

                            <!-- <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                            <button type="submit"  class="site-btn purchase">ĐẶT HÀNG TẬN NƠI</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- <form method="GET" action="{{ route('viewpayment') }}"> --}}
    </div>
</div>
</section>
<!-- Checkout Section End -->

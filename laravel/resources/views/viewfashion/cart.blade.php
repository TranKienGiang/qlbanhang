<x-home>
    @section('section')
        @include('includes.section-cart')
    @endsection
    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('.fa-close').click(function(e) {
                    e.preventDefault();
                    var productEl = $(this).parent().parent();
                    var product_id = $(this).data('product_id');
                    var url = "{{ route('deletecart') }}";

                    Swal.fire({
                        title: 'Bạn có chắc không?',
                        text: "Bạn sẽ không thể hoàn tác lại !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng Ý!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax(url, {
                                type: 'POST',
                                data: {
                                    product_id: product_id,
                                },
                                success: function(data) {
                                    console.log('success');
                                    var objData = JSON.parse(data);
                                    var newQuantity = Object.size(objData.cart);
                                    $('.cart-quantity').text(newQuantity);
                                    productEl.remove();
                                    location.reload();
                                    Swal.fire(
                                        'Xóa!',
                                        'Sản Phẩm Đã Được Xóa.',
                                        'success'
                                    )
                                },
                                error: function() {
                                    console.log('fail');
                                    Swal.fire(
                                        'Xóa!',
                                        'Xóa Sản Phẩm Thất Bại.',
                                        'error'
                                    )
                                }
                            });
                        }
                    });
                });
                $('.product-quantity').click(function() {
                    var newQuantity = $(this).val();
                    var trElement = $(this).closest('tr');
                    var url = "{{ route('updatecart') }}";
                    var product_id = $(this).data('product_id');
                    var price = parseInt(trElement.find('.price').text());
                    console.log(price);
                    var saleOff = parseInt(trElement.find('.sale-off').text());
                    var totalPrice = price * newQuantity * ((100 - saleOff) / 100);
                    totalPrice = Math.round(totalPrice * 100) / 100;
                    totalPrice = totalPrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                    console.log('non');
                    var totalElement = trElement.find('.total');
                    $.ajax(url, {
                        type: 'PUT',
                        data: {
                            product_id: product_id,
                            quantity: newQuantity,
                        },
                        success: function(data) {
                            console.log('success', saleOff);
                            var objData = JSON.parse(data);
                            console.log(objData, 'ok');
                            if (objData.status === false) {
                                location.reload();
                            }
                            totalElement.text(totalPrice);
                            var subtotal = 0;
                            $('.total').each(function() {
                                subtotal += parseFloat($(this).text());
                            });
                            subtotal = Math.round(subtotal * 100) / 100;
                            $('#subtotal').text(subtotal);
                            var totalFinal = subtotal + parseFloat($('#delivery').text()) -
                                parseFloat($('#discount').text());
                            totalFinal = Math.round(totalFinal * 100) / 100;
                            $('#total-final').text(totalFinal);
                        },
                        error: function() {
                            console.log('fail');
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Thất Bại !',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                });

            });
        </script>
    @endsection
</x-home>

<x-home>
	@section('section')
	@include('includes.section-checkoutvnpay')
	@endsection
	@section('script')
    <script type="text/javascript">
      	$(document).ready(function() {
        	$('.purchase').click(function(e) {
         		e.preventDefault();
	          	// var productEl = $(this).parent().parent();
	          	// var product_id = $(this).data('product_id');
	          	var name = $('.name').val(),
            		phone = $('.phone').val(),
            		email = $('.email').val(),
            		address = $('.address').val();
                    note = $('.note').val();
            		total_price = $('.total_price').text();
                    payments = $('.payments').val();

                    var orderQuantity = [];
                    $('.producQuantity').each(function(){
                        orderQuantity.push($(this).text());
                    });

                    var orderProductId = [];
                    $('.productId').each(function(){
                        orderProductId.push($(this).text());
                    });

          		var url = "{{ route('order.purchase') }}";
	          	$.ajax(url, {
	            	type: 'POST',
		            data: {
		              name: name,
		              phone: phone,
		              address: address,
		              email: email,
		              note:note,
		              total_price:total_price,
                      orderProductId: orderProductId,
                      orderQuantity:orderQuantity,
                      payments:payments,
		            },
	            	success: function (data) {
	              		console.log('success');
                          console.log(data);
			            Swal.fire({
			                icon: 'success',
			                title: 'Thank you!',
			                showConfirmButton: false,
			            });
	              		window.location.href = '/';
	            	},
	            	error: function () {
	              		console.log('fail');
	              		Swal.fire({
			                icon: 'error',
			                title: 'Failed!',
			                showConfirmButton: false,
	              		});
	            	}
          		});
        	});
      	});
        $(document).ready(function() {
            $('.alertmsg').delay(3000).fadeOut();
        });
    </script>
  	@endsection
</x-home>

@extends('layouts.customer')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>Checkout</h3>
	</div>
</div>
<!---728x90--->

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<!-- mens -->
		<div class="col-md-4 products-left">
			<div>
				
			</div>

			<div class="community-poll">
				<h4>Pay</h4>
				<div class="swit form">	

					<h5 style="font-size: 20px; text-align: center">Select Delivery Address</h5><br/>
					<span id="addresses"></span>
					
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_address_modal">Use New Address</button>
					
					<hr/>
					
					<h5 style="font-size: 20px; text-align: center">Select Payment Method</h5><br/>
					<input type="radio" name="payment_method" id="" value="e-payment" checked> Pay now
					<input type="radio" name="payment_method" id="" value="pay on delivery"> Pay on delivery
					<hr>
					
					<form onsubmit="event.preventDefault(); init_payment();" style="text-align: center">
						<script src="https://js.paystack.co/v1/inline.js"></script>
						<button type="button" class="btn btn-primary btn-lg" style="display: none" id="pay_btn" onclick="init_payment()">PAY ₦ <span id="pay_now"></span></button>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="col-md-8 products-right">

				<div class="community-poll" style="margin-bottom: 15px">
					<h4>Cart Items</h4>
				</div>

				<span id="cart_details_checkout">
				</span>

				</span>
				<span id="empty_cart_checkout"></span>
				
				<div id="totals_checkout" style="display: none">
					<div class="row">
						<div class="col-md-5 col-lg-5 col-sm-5 text-left">
							
						</div>
						<div class="col-md-3 col-lg-3 col-sm-3">
							<p><strong>Items Total</strong></p>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-4">
							<p style="float: left">₦ <span id="items_total_checkout"></span></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-5 col-lg-5 col-sm-5 text-left">
							
						</div>
						<div class="col-md-3 col-lg-3 col-sm-3">
							<p><strong>Delivery Fee</strong></p>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-4">
							<p style="float: left">₦ <span id="delivery_fee_checkout"></span></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-5 col-lg-5 col-sm-5 text-left">
							
						</div>
						<div class="col-md-3 col-lg-3 col-sm-3">
							<p><strong>Grand Total</strong></p>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-4">
							<p style="float: left">₦ <span id="grand_total_checkout"></span></p>
						</div>
					</div>
				</div>
				
			
			<div class="clearfix"></div>
		</div>
		
	</div>
</div>	
<!-- //mens -->


<!-- add new address modal -->
<div class="modal fade" id="add_address_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
		  <form id="add_address">
		  @csrf
      		<div class="modal-body">
		
				<div class="col">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Select State</label>
						<select name="state" class="form-control" id="state_select" required>
							<option value="">Select State</option>
							@foreach($states as $state)
								<option value="{{$state->id}}" class="text-capitalize">{{$state->name}}</option>
							@endforeach
							
						</select>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Select Area</label>
						<select name="area" class="form-control" id="area_select" required disabled>
							<option value="">Select Area</option>
						</select>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Enter Street Address</label>
						<input type="text" name="street_address" class="form-control" placeholder="e.g. No 1, Kudang Street" required>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</form>
    </div>
  </div>
</div>
<!--end add new address modal -->


@endsection

@section('js')
<script>
	$(document).ready(function(){
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

		get_user_addresses()

		// when user selects a new satte, get the cities for that state
        $('#state_select').on('change', function(e) {
          
          $('#area_select').attr('disabled', 'disabled')
          $('#area_select').empty()
          $('#area_select').append(`<option value="" class="text-capitalize">Select Area</option>`)

          let state_id = $(this).val();

          $.ajax({
            type: 'POST',
            url: "{{ url('/get_state_areas')}}",
            data: {id: state_id},
            dataType: 'json',

            success: function (areas) {

              console.log(areas)

              if(Object.keys(areas).length > 0 ) {

                for(key in areas) {

                  if(areas.hasOwnProperty(key)) {

                    let area_id = areas[key]['id']
                    let area_name = areas[key]['name']

                    $('#area_select').append(`<option value="` + area_id + `" class="text-capitalize">` + area_name + `</option>`)
                  }
                }

              $('#area_select').removeAttr('disabled')


              }
            },

            error: function (data) {
               console.log('Error:', data);
            }
          });

        })

		// submite the add address form
		$('#add_address').on('submit', function(e){

			e.preventDefault()

			$.ajax({
				url: "{{ url('/save_address') }}",
				method: 'POST',
				data: new FormData(this),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData: false,

				success: function (data) {
					console.log(data)
					get_user_addresses()
				},

				// if ajax request returns any error then perform this action
				error: function (data) {
					console.log('Error:', data);
				}
			})
		})

	})
	
	function delete_address(id) {
		$.ajax({
			type: 'POST',
            url: "{{ url('/delete_address')}}",
            data: {address_id: id},
            dataType: 'json',

			success: function (data) {
				console.log(data)
				get_user_addresses()
			},

			// if ajax request returns any error then perform this action
			error: function (data) {
				console.log('Error:', data);
			}
		})

	}

	function get_user_addresses() {

		$.ajax({
			type: 'POST',
			url: "{{ url('/get_user_addresses') }}",
			dataType: 'json',

			success: function (data) {

				$('#addresses').empty()
				
				if(Object.keys(data).length != 0) {

					let first_iteration = true;
					let checked = ''

					for(key in data) {
						if(data.hasOwnProperty(key)) {

							let id = data[key]['id']
							let address = data[key]['address']

							if(first_iteration) {
								checked = 'checked'
								first_iteration = false
							} else {
								checked = ''
							}

							let address_html = `<div class="col">
													<div class="form-group">
														<input type="radio" name="address" id="" value="`+ id +`" `+ checked +`> 
														<span class="text-text-capitalize">`+ address +`</span>
														<button class="btn btn-danger btn-sm" onclick="delete_address(`+ id +`)">Delete</button>
													</div>
												</div>
												
												<hr/>`
							$('#addresses').append(address_html)
							$('#add_address_modal').modal('hide')
						}
					}
				}
				
			},

			error: function (data) {
				console.log('Error:', data);
			}
		});

	}
</script>

@endsection
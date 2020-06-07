@extends('layouts.customer')
@section('body-class', 'woocommerce-active page-template-template-homepage-v3 can-uppercase')



@section('content')
<style>
@media(max-width: 700px){
  .set-h {
    height: 300px !important;

  }

  .set-m {
    margin-top: 0px !important;
    padding-top: 0px !important;
  }
}
</style>
<div id="content" class="site-content">

  <section class="py-12 pt-5 pb-5">
    <div class="container">
      <div class="col-12 mt-4 col-md-12 text-center">
        <h2>Pickup and Delivery</h2>

    </div>
        <div class="col-12 mb-2 mt-2">

          <h2>Section 1</h2>
          <div class="row">
          <div class="col-12 mt-2 col-md-6">

            <!-- Card -->
            <div class="card card-lg">
              <div class="card-body">

                <!-- Heading -->
                <h6 class="mb-5">Pickup Information</h6>
                <!-- Form -->
                <form  method="POST" action="{{ route('register') }}">
                  <div class="row justify-content-center">
                    <div class="col-12 p-0 row" style="color:#333">
                      @csrf
                      <!-- Email -->
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="sr-only" for="registerFirstName">
                            Address *
                          </label>
                          <input class="form-control form-control-sm" id="address" name="address" type="text" placeholder="Address *" required="">

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">

                          <label class="sr-only" for="registerFirstName">
                            City *
                          </label>
                          <input class="form-control form-control-sm" id="city" name="city" type="text" placeholder="City *" required="">

                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">

                          <label class="sr-only" for="registerFirstName">
                            Province *
                          </label>
                          <input class="form-control form-control-sm" id="province" name="province" type="text" placeholder="Province *" required="">

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">

                          <label class="sr-only" for="registerFirstName">
                            Postal Code *
                          </label>
                          <input class="form-control form-control-sm" id="province" name="postal_code" type="text" placeholder="Postal Code *" required="">

                        </div>
                      </div>

                    </div>
                    <div class="row p-0 col-12">


                      <div class="col-6 form-group">
                        <label class="sr-only" for="registerFirstName">
                          What is the item?
                        </label>
                        <input class="form-control form-control-sm" id="registerFirstName" name="item_type" type="text" placeholder="What is the item?" required="">
                      </div>
                      <div class="col-6 form-group">
                        <label class="sr-only" for="registerFirstName">
                          What is the size?
                        </label>
                        <input class="form-control form-control-sm" id="registerFirstName" name="item_size" type="text" placeholder="What is the size?" required="">
                      </div>

                    </div>

                    <div class="col-12">

                      <!-- Email -->
                      <div class="form-group">
                        <label class="sr-only" for="registerEmail">
                          Please provide a little detail of the item *
                        </label>
                        <textarea class="form-control form-control-sm @error('password') is-invalid @enderror" id="registerEmail" name="email" type="email" placeholder="Please provide a little detail of the item *" required=""></textarea>
                      </div>

                    </div>
                    <div class="text-black col-12" style="color:#333">

                      <!-- Email -->
                      <span style="color:#333"><b>Are we paying for this item on your behalf?</b></span>
                      <div class="row form-group">
                        <div class="form-check">
                          <label class="form-check-label" for="defaultCheck1">
                            Yes
                          </label>
                          <input class="form-check-input ml-3" type="checkbox" value="" id="defaultCheck1">
                        </div>
                        <div class="form-check ml-3">
                          <label class="form-check-label" for="defaultCheck2">
                            No
                          </label>
                          <input class="form-check-input  ml-3" type="checkbox" value="" id="defaultCheck2">
                        </div>

                      </div>
                    </div>

                    <div class="row p-0 col-12">


                      <div class="col-4 form-group">
                        <label class="sr-only" for="registerFirstName">
                          Amount
                        </label>
                        <input class="form-control form-control-sm" id="amount_i" name="ammoun" type="text" placeholder="amount " required="">
                      </div>

                    </div>
                    <div class="text-black col-12" style="color:#333">

                      <!-- Email -->
                      <span style="color:#333"><b>Are you sure the amount above is what is required for the item?</b></span>
                      <div class="row form-group">
                        <div class="form-check">
                          <label class="form-check-label" for="defaultCheck1">
                            Yes
                          </label>
                          <input class="form-check-input ml-3" type="checkbox" value="" id="defaultCheck1">
                        </div>
                        <div class="form-check ml-3">
                          <label class="form-check-label" for="defaultCheck2">
                            No
                          </label>
                          <input class="form-check-input  ml-3" type="checkbox" value="" id="defaultCheck2">
                        </div>
                        <span class="ml-5 pt-1 text-black"> Info (<i class="fa fa-info " data-toggle="popover" data-content="Please note that items paid for on your behalf attract a little fee"></i>)
                        </div>
                      </div>
                      <div class="col-12">

                        <span style="color:#333"><b> Add Picture </b></span>
                        <div class="form-group">
                          <label class="sr-only" for="registerEmail">
                            Add Picture *
                          </label>
                          <input class="form-control form-control-sm @error('password') is-invalid @enderror" id="image" type="file" name="Add Picture *" required=""></textarea>
                        </div>

                      </div>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          <div class="col-12 mt-2 col-md-6">

          <!-- Card -->
          <div class="card card-lg mb-10 mb-md-0">
            <div class="card-body">

              <!-- Heading -->
              <h6 class="mb-5">Receiver Information</h6>

              <!-- Form -->
              <form method="POST" action="{{ route('login') }}">
                <div class="row">
                  <div class="col-12">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                      <label class="sr-only" for="loginEmail">
                        Name *
                      </label>
                      <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="loginEmail" type="text" name="name" value="{{ old('email') }}"  placeholder="Name *" required="">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-12">

                    <!-- Password -->
                    <div class="form-group">
                      <label class="sr-only" for="loginPassword">
                        Phone No *
                      </label>
                      <input class="form-control form-control-sm @error('password') is-invalid @enderror" name="phone_number" id="loginPassword" type="text" placeholder="Phone Number *" required="">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>



                  <div class="col-12">
                    <h6 class="mb-5 mt-3">Sender Information</h6>
                  </div>
                  <div class="col-12">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                      <label class="sr-only" for="loginEmail">
                        Name *
                      </label>
                      <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="loginEmail" type="text" name="name" value="{{ old('email') }}"  placeholder="Name *" required="">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-12">

                    <!-- Password -->
                    <div class="form-group">
                      <label class="sr-only" for="loginPassword">
                        Phone No *
                      </label>
                      <input class="form-control form-control-sm @error('password') is-invalid @enderror" name="phone_number" id="loginPassword" type="text" placeholder="Phone Number *" required="">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>


                </div>
              </form>

            </div>
          </div>

        </div>
        </div>
        </div>
        <div class="col-12 mb-2 mt-2">

          <h2>Section 2</h2>

          <div class="row">
          <div class="col-12 mt-2 col-md-6">

            <!-- Card -->
            <div class="card card-lg mb-10 mb-md-0">
              <div class="card-body">

                <!-- Heading -->
                <h6 class="mb-5">Delivery Instruction</h6>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}">
                  <div class="row">
                    <div class="col-12 row" style="color:#333">
                      @csrf
                      <!-- Email -->
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="sr-only" for="registerFirstName">
                            Address *
                          </label>
                          <input class="form-control form-control-sm" id="address" name="address" type="text" placeholder="Address *" required="">

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">

                          <label class="sr-only" for="registerFirstName">
                            City *
                          </label>
                          <input class="form-control form-control-sm" id="city" name="city" type="text" placeholder="City *" required="">

                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">

                          <label class="sr-only" for="registerFirstName">
                            Province *
                          </label>
                          <input class="form-control form-control-sm" id="province" name="province" type="text" placeholder="Province *" required="">

                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">

                          <label class="sr-only" for="registerFirstName">
                            Postal Code *
                          </label>
                          <input class="form-control form-control-sm" id="province" name="postal_code" type="text" placeholder="Postal Code *" required="">

                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">

                          <label class="sr-only" for="registerFirstName">
                            Country *
                          </label>
                          <input class="form-control form-control-sm" id="province" name="country" type="text" placeholder="Country *" required="">

                        </div>
                      </div>

                    </div>


                    <div class="col-12">
                      <h6 class="mb-5 mt-3">Delivery Address</h6>
                    </div>
                    <div class="col-12">

                      <span style="color:#333"><b> Optional (Provide Delivery Instruction) </b></span>

                      <div class="form-group">
                        <label class="sr-only" for="loginEmail">
                          Enter text here
                        </label>
                        <textarea class="form-control form-control-sm" id="loginEmail" type="text" name="name" value=""  placeholder="Enter text here" required="">
                        </textarea>
                      </div>

                    </div>
                    <div class="text-black col-12" style="color:#333">

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          Save as primary address
                        </label>
                      </div>
                    </div>
                  </div>
                </form>

              </div>
            </div>

          </div>
          <div class="col-12 mt-2 col-md-6">

          <!-- Card -->
          <div class="card card-lg">
            <div class="card-body">

              <!-- Heading -->
              <h6 class="mb-5">Pick-up summary</h6>
              <!-- Form -->
            <div class="row text-black border rounded p-3 m-2" style="color:#333">
              <div class="col-lg-3 m-auto">
                <img src="{{asset('asset/img/in.jpg')}}" alt="">
              </div>
              <div class="col-lg-6 m-auto" style="display:inline-grid;">
                <span class="mb-2">Bags</span>
                <span class="mb-2">(5 X $5)</span>
                <span class="mb-2"><b>$10</b></span>
                <span class="mb-2">Ontario Mall, Ontario</span>
              </div>
              <div class="col-lg-3 m-auto">
                <div class="product-form__item product-form__item--quantity">
                        <div class="form_qty">
                          <div class="row">
                            <div class="reduced items col-4 bold" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--;); return false;">-</div>
                            <input type="text" id="qty" name="quantity" value="1" min="1" class="quantity-selector col-4 p-0 text-center">
                            <div class="increase items col-4 bold" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++; $('#pack').val()); return false;">+</div>
                          </div>
                        </div>
                      </div>
              </div>

            </div>
            <div class="row text-black border rounded p-3 m-2" style="color:#333">
              <div class="col-lg-3 m-auto">
                <img src="{{asset('asset/img/in.jpg')}}" alt="">
              </div>
              <div class="col-lg-6 m-auto" style="display:inline-grid;">
                <span class="mb-2">Shirts</span>
                <span class="mb-2">(5 X $5)</span>
                <span class="mb-2"><b>$5</b></span>
                <span class="mb-2">Ontario Mall, Ontario</span>
              </div>
              <div class="col-lg-3 m-auto">
                <div class="product-form__item product-form__item--quantity">
                        <div class="form_qty">
                          <div class="row">
                            <div class="reduced items col-4 bold" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--;); return false;">-</div>
                            <input type="text" id="qty" name="quantity" value="1" min="1" class="quantity-selector col-4 p-0 text-center">
                            <div class="increase items col-4 bold" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++; $('#pack').val()); return false;">+</div>
                          </div>
                        </div>
                      </div>
              </div>

            </div>
            <div class="row text-black border rounded p-3 m-2" style="color:#333">
              <div class="col-lg-3 m-auto">
                <img src="{{asset('asset/img/in.jpg')}}" alt="">
              </div>
              <div class="col-lg-6 m-auto" style="display:inline-grid;">
                <span class="mb-2">Tee - Shirts</span>
                <span class="mb-2">(5 X $5)</span>
                <span class="mb-2"><b>$10</b></span>
                <span class="mb-2">Ontario Mall, Ontario</span>
              </div>
              <div class="col-lg-3 m-auto">
                <div class="product-form__item product-form__item--quantity">
                        <div class="form_qty">
                          <div class="row">
                            <div class="reduced items col-4 bold" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--;); return false;">-</div>
                            <input type="text" id="qty" name="quantity" value="1" min="1" class="quantity-selector col-4 p-0 text-center">
                            <div class="increase items col-4 bold" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++; $('#pack').val()); return false;">+</div>
                          </div>
                        </div>
                      </div>
              </div>

            </div>
            <div class="col-12 mt-3">

              <span style="color:#333"><b> Delivery Address </b></span>

              <div class="form-group">
                <label class="sr-only" for="loginEmail">
                  Enter text here
                </label>
                <textarea class="form-control form-control-sm" id="loginEmail" type="text" name="name" value=""  placeholder="Enter text here" required="">
                </textarea>
              </div>

            </div>
            <div class="text-black col-12" style="color:#333">

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Save as primary address
                </label>
              </div>
            </div>
            </div>
          </div>

        </div>
        </div>
        </div>
        <div class="col-12 mt-4 col-md-12 text-center">
          <a href="checkout"><button type="button" class="btn btn-sm btn-primary" name="button">
            Process to Checkout
          </button></a>

      </div>
    </div>
  </section>


  <div class="col-full set-m">
    <div class="row set-m">
      <div id="primary" class="content-area set-m">
        <main id="main" class="site-main set-m">

        </main>
        <!-- #main -->
      </div>
      <!-- #primary -->
    </div>
    <!-- .row -->
  </div>
  <!-- .col-full -->
</div>


@endsection

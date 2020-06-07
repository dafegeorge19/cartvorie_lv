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
input {
  border-color: #cc00ff !important;
}
</style>
<div id="content" class="site-content text-dark">

  <section class="py-12 pt-5 pb-5">
    <div class="container">
      <div class="col-12 mt-4 col-md-12 text-center">
        <h2>Payment Information</h2>

    </div>
      <div class="col-12 mt-4 col-md-12">
        <div class="row justify-content-center">
          <div class="col-12">

            <h3>Current Method</h3>
          </div>
          <div class="col-lg-4 mb-3">


            <div class="row border col-lg-12">
              <div class="col-10 p-3">

                <span><h4>Cash Payment</h4> </span>
                <p>Pay with cash and save on your Order</p>
              </div>
              <div class="col-2 m-auto">

                <input type="checkbox" name="" value="">
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="row border col-lg-12">
              <div class="col-4 m-auto">
                <img width="100" src="{{asset('/asset/img/VISA-logo.png')}}" alt="">
              </div>
              <div class="row col-8 p-3">
                <div class="col-12">
                  <span><strong>**** **** **** 4444</strong> </span>
                </div>
                <div class="col-12">
                  <small>Expires 09/20 </small>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="row border col-lg-12">
              <div class="col-4 m-auto">
                <img width="100" src="{{asset('/asset/img/mastercard.png')}}" alt="">

              </div>
              <div class="row col-8 p-3">
                <div class="col-12">
                <span><strong>**** **** **** 4444</strong> </span>
                </div>
                <div class="col-12">
                <small>Expires 09/20 </small>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
<div class="col-12 mt-4 col-md-12 row justify-content-center">
<div class="col-12 d-flex justify-content-center">

  <h2>Add Debit Card</h2>
</div>
  <div class="col-lg-6 col-sm-12">


        <div class="row">
            <div class="col-xs-12 col-md-12 col-md-offset-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <label>Card Information (Debit/Credit)</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Valid Card Number" aria-describedby="basic-addon2">
                                            <div class="input-group-append">

                                              <span class="input-group-text" id="basic-addon2"><i class="fa fa-credit-card"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Expires</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                        <input type="tel" class="form-control" placeholder="MM / YY" />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label>CVC</label>
                                        <input type="tel" class="form-control" placeholder="CVC" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Card Name</label>
                                        <input type="text" class="form-control" placeholder="Card Owner Names" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea type="text" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <button type="button" id="cardupdated" class="form-control btn-primary" name="button"> Save and Continue</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .cc-img {
            margin: 0 auto;
        }
    </style>

  </div>
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

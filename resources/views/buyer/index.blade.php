@extends('layouts.buyer')



@section('content')
<div class="content">
  <div class="container-fluid">
    <h4 style="margin-left: 30px;"><b>DASHBOARD</b></h4>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="text-white" style="background: url({{ asset('asset/assets/img/cardbg.png')}})no-repeat;background-size:cover; border-radius: 20px; height: 200px; padding: 30px;">
          <img class="float-right" src="{{ asset('asset/assets/img/ordericon.png')}}">
          <br>
          <div class="row">
            <div class="col-md-10">
              <h3 class="float-left"><b>50</b></h3><br><br><br>
              <p class="text-left">Total Orders</p>
            </div>
            <div class="col-md-3">
            </div>
          </div>
          <div class="float-right" style="margin-top: -40px;">
            <i style="" class="fa fa-arrow-right"> </i>
          </div>



        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="text-white" style="background: url({{ asset('asset/assets/img/cardbg.png')}}) no-repeat;background-size:cover; border-radius: 20px; height: 200px; padding: 30px;">
          <!-- <img class="float-right" src="{{ asset('asset/assets/img/ridericon.png')}}"> -->

          <div class="row">
            <div class="col-12" style="display:inline-grid; position:relative;">
              <span style="position: absolute;
    top: 20px;
    left: 30px;"><h3><b>500</b></h3></span>
              <span style="position: absolute;
    bottom: -120px;
    left: 30px;">Points</span>
            </div>
          </div>

          <div class="float-right" style="margin-top: -40px;">
            <i style="" class="fa fa-arrow-right"> </i>
          </div>



        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="text-white" style="background: url({{ asset('asset/assets/img/cardbg.png')}}) no-repeat;background-size:cover; border-radius: 20px;height: 250px;
    width: 370px;
    padding: 10px;">
        <div class="row ml-4">
          <div class="row col-6">
            <div class="col-12">
              <span><h3><b>1000</b></h3></span>
              <span><h5>Points Earned</h5></span>
            </div>
            <div class="col-12">
              <span><h3><b>400</b></h3></span>
              <span><h5>Points Used</h5></span>
            </div>
          </div>
          <div class="col-6">

          </div>
        </div>
        </div>
      </div>


    </div>
    <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-4 text-center">
        <h4><b>TRACK YOUR DELIVERY</b></h4>
        <div class="input-group no-border" style="border: 1px solid #DF61FF; border-radius: 5px; padding: 2px; ">

        <input type="text" class="form-control" name="delivery_id" placeholder="Enter delivery ID to track delivery" value="">
      </div>
      <button type="submit" class="btn btn-primary" name="button">Start</button>
      </div>
    </div>
  </div>

  </div>
</div>

@endsection

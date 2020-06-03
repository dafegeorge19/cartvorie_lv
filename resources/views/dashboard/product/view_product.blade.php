@extends('layouts.dashboard')

@section('title', 'View Product')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">

                  <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') ? old('name') : $product->name }}" class="form-control text-capitalize @error('name') is-invalid @enderror" autofocus required disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="number" id="weight" name="weight" value="{{ old('weight') ? old('weight') : $product->weight }}" class="form-control text-capitalize @error('weight') is-invalid @enderror" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price" value="{{ old('price') ? old('price') : $product->price }}" class="form-control text-capitalize @error('price') is-invalid @enderror" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sales_price">Sales Price <small>(Enter 0 if you don't have any special sales for this product)</small></label>
                            <input type="text" id="sales_price" name="sales_price" value="{{ old('sales_price') ? old('sales_price') : $product->sales_price }}" class="form-control text-capitalize @error('sales_price') is-invalid @enderror" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supermarket">Supermarket</label>
                            <select id="supermarket" name="supermarket" class="form-control text-capitalize @error('supermarket') is-invalid @enderror" disabled>
                                <option value="{{ $product->supermarket->id }}" selected>{{ $product->supermarket->name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" name="category" class="form-control text-capitalize @error('category') is-invalid @enderror" disabled>
                                <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control text-capitalize @error('type') is-invalid @enderror" disabled>
                                <option value="{{ $product->type->id }}" selected>{{ $product->type->name }}</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image1">Primary Product Image</label>
                            <br>
                            <img width="100" src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}"/>
                            <br/>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image2">Product Image 2</label>
                            <br>
                            <img width="100" src="{{ $product->get_product_image(2) ? asset('storage/uploads/products/images/' . $product->get_product_image(2)) : asset('storage/uploads/products/images/'. 'avatar.png') }}"/>
                            <br/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image3">Product Image 3</label>
                            <br>
                            <img width="100" src="{{ $product->get_product_image(3) ? asset('storage/uploads/products/images/' . $product->get_product_image(3)) : asset('storage/uploads/products/images/'. 'avatar.png') }}"/>
                            <br/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image4">Product Image 4</label>
                            <br>
                            <img width="100" src="{{ $product->get_product_image(4) ? asset('storage/uploads/products/images/' . $product->get_product_image(4)) : asset('storage/uploads/products/images/'. 'avatar.png') }}"/>
                            <br/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image5">Product Image 5</label>
                            <br>
                            <img width="100" src="{{ $product->get_product_image(5) ? asset('storage/uploads/products/images/' . $product->get_product_image(5)) : asset('storage/uploads/products/images/'. 'avatar.png') }}"/>
                            <br/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image6">Product Image 6</label>
                            <br>
                            <img width="100" src="{{ $product->get_product_image(6) ? asset('storage/uploads/products/images/' . $product->get_product_image(6)) : asset('storage/uploads/products/images/'. 'avatar.png') }}"/>
                            <br/>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="5" id="description" name="description" value="{{ old('description') }}" class="form-control text-capitalize @error('description') is-invalid @enderror" disabled>{{ $product->description }}</textarea>
                        </div>
                    </div>

                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ url('/admin/edit_product', [$product->id]) }}" class="btn btn-primary">Edit Product</a>
                </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')

<script>
    $(document).ready(function(){
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        // when user selects a new satte, get the cities for that state
        $('#state').on('change', function(e) {
            
            $('#area').attr('disabled', 'disabled')
            $('#area').empty()
            $('#area').append(`<option value="" class="text-capitalize">Select Area</option>`)

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

                    $('#area').append(`<option value="` + area_id + `" class="text-capitalize">` + area_name + `</option>`)
                    }
                }

                $('#area').removeAttr('disabled')


                }
            },

            error: function (data) {
                console.log('Error:', data);
            }
            });

        })
	})
</script>
@endsection
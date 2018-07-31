@extends('layouts.adminLayout.admin_design')
@section('content')
   <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card">
                    <div class="card-header" >
                                <h4 class="m-b-0 text-white">Edit Product</h4>
                            </div>
                          </div>

                    <div class="card-body">
                      
                      <form class="forms-sample"  method="post" action="{{ url('/admin/products/editProducts/'.$productsDetails->id) }}" name="editDetails" id="editProducts" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-group">
                          <label for="description">Under Category</label>
                          <div class="controls">
                            <div class="styled-select slate">
                          <select name="id_category" id="id_category">
                           <?php echo $categories_dropdown; ?>
                          </select>
                        </div>
                      </div>
                        </div>
                        <div class="form-group">
                          <label for="name_product">Name Product</label>
                          <input type="text" value="{{ @$productsDetails->name_product }}" class="form-control" name="name_product" id="name_product"  required class="form-control" >
                        </div>
                        <div class="form-group">
                          <label for="code_product">Code Product</label>
                          <input type="text" value="{{ @$productsDetails->code_product }}"class="form-control" name="code_product" id="code_product" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="code_product">Color Product</label>
                          <input type="text" value="{{ @$productsDetails->color_product }}"class="form-control" name="color_product" id="color_product" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="stok">Stock</label>
                          <input type="text" value="{{ @$productsDetails->stok }}"class="form-control" name="stok" id="stok" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="desc">Description</label>
                          <textarea type="text" value="{{ @$productsDetails->desc }}" class="form-control" name="desc" id="desc" required class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                          <label for="price_retail">Price Retail</label>
                          <input type="text" value="{{ @$productsDetails->price_retail }}" class="form-control" name="price_retail" id="price_retail" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="price_reseller">Price Reseller</label>
                          <input type="text" value="{{ @$productsDetails->price_reseller }}" class="form-control" name="price_reseller" id="price_reseller" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="profit">Profit</label>
                          <input type="text" value="{{ @$productsDetails->profit }}" class="form-control" name="profit" id="profit" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="image">Image</label><br>
                          <center><img style="width:200px;" src="{{ asset('/images/backend_images/products/small/'.$productsDetails->image) }}"></center><br>
                          <center><a href="{{url('/admin/products/deleteProducts-image/'.$productsDetails->id)}}">Delete</a></center><br>
                          <input type="file" value="{{ @$productsDetails->image }}" class="form-control" name="image" id="image" required class="form-control" placeholder="">
                          <input type="hidden" name="current_image" value="{{ @$productsDetails->image}}"> 
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Edit</button>
                           
                       <button class="btn btn-light">Cancel</button> 

                        <p class="card-description"></p>
                       <div class="text-block text-center my-3">
                        @if(Session::has('flash_message_error'))
                            <div class="alert alert-error alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{!! session('flash_message_error') !!}</strong>
                            </div>
                        @endif   
                        @if(Session::has('flash_message_success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{!! session('flash_message_success') !!}</strong>
                            </div>
                        @endif   
                      </div>
                   
                      </form>
                    </div>


                  </div>
                </div>
              
              </div>
            
            
          
        <!-- content-wrapper ends -->
       </div>
     </div>
      
      <!-- main-panel ends -->
      
@endsection
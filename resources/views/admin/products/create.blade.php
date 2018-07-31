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
                                <h4 class="m-b-0 text-white">New Product</h4>
                            </div>
                          </div>

                    <div class="card-body">
                      
                      <form enctype="multipart/form-data" class="forms-sample"  method="post" action="{{ url('/admin/products/newProducts') }}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-group">
                          <label for="id_category">Under Category</label>
                          <div class="controls">
                            <div class="styled-select slate">
                          <select name="id_category" id="category_id">
                           <?php echo $categories_dropdown; ?>
                          </select>
                        </div>
                      </div>
                        </div>
                        <div class="form-group">
                          <label for="name_product">Name Product</label>
                          <input type="text"  class="form-control" name="name_product" id="name_product" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="code_product">Code Product</label>
                          <input type="text" class="form-control" name="code_product" id="code_product" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="color_product">Color Product</label>
                          <input type="text" class="form-control" name="color_product" id="color_product" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="stok">Stock</label>
                          <input type="text" class="form-control" name="stok" id="stok" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="desc">Description</label>
                          <textarea class="form-control" name="desc" id="desc" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                          <label for="price_retail">Price Retail</label>
                          <input type="text" class="form-control" name="price_retail" id="price_retail" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="price_reseller">Price Reseller</label>
                          <input type="text" class="form-control" name="price_reseller" id="price_reseller" placeholder="">
                        </div>
                          <div class="form-group">
                          <label for="profit">Profit</label>
                          <input type="text" class="form-control" name="profit" id="profit" placeholder="">
                        </div>
                          <div class="form-group">
                          <label for="image">Images</label>
                          <input type="file" class="form-control" name="image" id="image" placeholder="">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                       <!-- <button class="btn btn-light">Cancel</button> -->

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
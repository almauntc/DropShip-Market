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
                                <h4 class="m-b-0 text-white">New Products Attributes</h4>
                            </div>
                          </div>

                    <div class="card-body">
                      
                      <form enctype="multipart/form-data" class="forms-sample"  method="post" action="{{ url('/admin/product-attributes/newAtrributes/'.$productsDetails->id) }}" name="add_attribute" id="add_attribute" novalidate="novalidate">{{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{ $productsDetails->id }}">
                        <div class="form-group">
                          <label for="name_product" class="control-label">Name Product</label><br>
                          <label for="name_product" class="control-label"><strong>{{ $productsDetails->name_product }}</strong></label>
                        </div>
                        <div class="form-group">
                          <label for="code_product">Code Product</label><br>
                          <label for="code_product" class="control-label"><strong>{{ $productsDetails->code_product }}</strong></label>
                        </div>
                        <div class="form-group">
                          <label for="color_product">Color Product</label><br>
                          <label for="color_product" class="control-label"><strong>{{ $productsDetails->color_product }}</strong></label>
                        </div>
                        <div class="form-group">
                          <label class="control-label"></label><br>
                          <div class="field_wrapper">
                            <div>
                                <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;"/>
                                 <input type="text" name="size[]" id="size" placeholder="size" style="width:120px;"/>
                                  <input type="text" name="price_retail[]" id="price_retail" placeholder="Price Retail" style="width:120px;"/>
                                   <input type="text" name="price_reseller[]" id="price_reseller" placeholder="Price Reseller" style="width:120px;"/>
                                   <input type="text" name="profit[]" id="profit" placeholder="Profit" style="width:120px;"/>
                                    <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;"/>
                                <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                            </div><br>
                        </div>
                        </div>
        
                        <br>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-light">Cancel</button>

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
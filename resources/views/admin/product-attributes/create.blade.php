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
                     <form enctype="multipart/form-data" class="forms-sample"  method="post" action="{{ url('/admin/product-attributes/newAtrributes/'.$productsDetails->id) }}" name="add_attribute" id="add_attribute" >{{ csrf_field() }}
                    <div class="card-body">
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
                                <input required type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;"/>
                                 <input required type="text" name="size[]" id="size" placeholder="size" style="width:120px;"/>
                                  <input required type="text" name="price_retail[]" id="price_retail" placeholder="Price Retail" style="width:120px;"/>
                                   <input required type="text" name="price_reseller[]" id="price_reseller" placeholder="Price Reseller" style="width:120px;"/>
                                   <input required type="text" name="profit[]" id="profit" placeholder="Profit" style="width:120px;"/>
                                    <input required type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;"/>
                                <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                            </div>
                        </div>
                        </div>
        
                        <br>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-light">Cancel</button>

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
                      <br>
                      <!-- View Attribute -->
                      <p class="card-description"><b>View Attributes</b></p>
                      <form action="{{ url('/admin/product-attributes/editAtrributes/'.$productsDetails->id) }}" method="post">{{ csrf_field() }}
                      <div class="table-responsive">
                       <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            SKU
                          </th>
                          <th>
                            Size
                          </th>
                          <th>
                            Price Retail
                          </th>
                          <th>
                            Price Reseller
                          </th>
                          <th>
                            Stock
                          </th>
                           <th>
                            Profit
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($productsDetails->attributes as $attribute)
                       <tr>
                          <td><input type="hidden" name="idAttr[]" value="{{$attribute->id}}">{{$attribute->id}}</td>
                          <td>{{ $attribute->sku }}</td>
                          <td>{{ $attribute->size}}</td>
                          <td><input style="width:70px;" type="text" name="price_retail[]" value="{{ $attribute->price_retail}}"></td>
                          <td><input style="width:70px;" type="text" name="price_reseller[]" value="{{ $attribute->price_reseller}}"></td>
                          <td><input style="width:50px;" type="text" name="stock[]" value="{{ $attribute->stock}}"></td>
                          <td><input style="width:70px;" type="text" name="profit[]" value="{{ $attribute->profit}}"></td>
                         
                          <td>
                            <div class="hidden-sm hidden-xs btn-group">
                             <a href="{{ url('/admin/product-attributes/editAtrributes/' .$attribute->id) }}">
                              <button type="submit" class="btn btn-xs btn-primary">
                                <b>✔</b>
                              </button></a>
                            </div>
                                  
                              <div class="hidden-sm hidden-xs btn-group">
                              <a href="{{ url('/admin/products-attributes/deleteAttributes/' .$attribute->id) }}">
                              <button class="btn btn-xs btn-danger">
                                <b>✘</b>
                              </button></a>  
                              </div>    
                          </td>
                        </tr> 
                     
                    @endforeach
                    </form>
                      </tbody>
                    </table>
                  </div>
                  
                  <!-- End View Attribute-->
                    </div>
                  </div>
                </div>
              
              </div>

        <!-- content-wrapper ends -->
       </div>
     </div>
      
      <!-- main-panel ends -->
      
@endsection
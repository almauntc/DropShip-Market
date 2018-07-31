@extends('layouts.adminLayout.admin_design')
@section('content')
   <div class="main-panel">
        <div class="content-wrapper">
          <div class="text-block text-center">
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
          <div class="row">
           <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header" >
                     <h4 class="m-b-0 text-white">List Of Products</h4>
                 </div>
                <div class="card-body">
                  <div class="form-group">
                      <div class="input-group input-group-rounded">
                      <input type="text" placeholder="Name" name="Search" class="form-control">
                      <span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit">
                         Search</i></button></span>                  
                      </div>
                     </div>

                     
                     <a href="{{ url('/admin/products/newProducts') }}"><button class="btn btn-success btn-block col-lg-3">New Products
                      <i class="mdi mdi-plus"></i>
                    </button></a>
                    </button>
                 <br>
                 
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            ID Category
                          </th>
                          <th>
                            Code Product
                          </th>
                          <th>
                            Name Product
                          </th>
                          <th>
                            Color Product
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($product as $product)
                       <tr>
                          <td>{{ $product->id}}</td>
                          <td>{{ $product->id_category}}</td>
                          <td>{{ $product->code_product}}</td>
                          <td>{{ $product->name_product}}</td>
                          <td>{{ $product->color_product}}</td>
                          <td>{{ $product->desc}}</td>
                          <td>
                            @if(!empty($product->image))
                            <img src="{{ asset('/images/backend_images/products/small/'.$product->image)}}">
                            @endif
                          </td>
                          <td>
                            <div class="hidden-sm hidden-xs btn-group">
                             <a href="{{ url('/admin/products/editProducts/' .$product->id) }}">
                              <button class="btn btn-xs btn-info">
                                <b><i>Edit</i></b>
                              </button></a>

                              <i class="text-white">..</i>
                              <a href="{{ url('/admin/products/deleteProducts/' .$product->id) }}">
                              <button class="btn btn-xs btn-danger">
                                <b><i>Delete</i></b>
                              </button></a>

                              <i class="text-white">..</i>
                              <a href="{{ url('/admin/product-attributes/newAtrributes/' .$product->id) }}">
                              <button class="btn btn-xs btn-success">
                                <b><i>Add</i></b>
                              </button></a>

                            </div>      
                          </td>
                        </tr> 
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
             </div>
              </div>
@endsection
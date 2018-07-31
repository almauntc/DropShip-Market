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
                                <h4 class="m-b-0 text-white">Edit Supplier</h4>
                            </div>
                          </div>

                    <div class="card-body">
                      
                      <form class="forms-sample"  method="post" action="{{ url('/admin/supplier-management/supplier/editSupplier/'.$supplierDetails->id) }}" name="editSupplier" id="editSupplier" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-group">
                            
                          <label for="name">Name Supplier</label>
                          <input type="text" value="{{ @$supplierDetails->name }}" class="form-control" name="name" id="name"  required class="form-control" >
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" value="{{ @$supplierDetails->address }}"class="form-control" name="address" id="address" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone Number</label>
                          <input type="text" value="{{ @$supplierDetails->phone }}" class="form-control" name="phone" id="phone" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" value="{{ @$supplierDetails->email }}" class="form-control" name="email" id="email" required class="form-control" placeholder="">
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
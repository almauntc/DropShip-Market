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
                                <h4 class="m-b-0 text-white">Data Customer</h4>
                            </div>

                          </div>

                    <div class="card-body">
                       @foreach($customerInfo as $attribute)
                      <form enctype="multipart/form-data" class="forms-sample"  method="post" action="" name="add_attribute" id="add_attribute" >{{ csrf_field() }}
                        
                        <div class="form-group">
                          <label style="color:#308ee0;" for="name_product" class="control-label">Product Name :</label><br>
                          <label for="name_product" class="control-label">{{ $status->name_product }} ({{ $status->size }})</label>
                        </div>
                        <div class="form-group">
                          <label style="color:#308ee0;" for="name_product" class="control-label">Date Sale   :</label><br>
                          <label for="name_product" class="control-label">{{ $status->created_at }}</label>
                        </div>
                        <div class="form-group">
                          <label style="color:#308ee0;" for="name_product" class="control-label">Customer Payment Status   :</label><br>
                          <label for="name_product" class="control-label">{{ $status->customer_payment_status }}</label>
                        </div>
                        <div class="form-group">
                          <label style="color:#308ee0;" for="name_product" class="control-label">Customer Delivery Status   :</label><br>
                          <label for="name_product" class="control-label">{{ $status->customer_delivery_status }}</label>
                        </div>
                      
                        <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Customer Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                           Handphone
                          </th>
                          <th>
                            Zip Code
                          </th>
                          <th>
                            Address
                          </th>
                         
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         
                       <tr>
                          <td>{{ $attribute->name_customer }}</td>
                          <td>{{ $attribute->email }}</td>
                          <td>{{ $attribute->handphone }}</td>
                          <td>{{$attribute->kode_pos}}</td>
                          <td>{{ $attribute->address }}</td>
                          
                        </tr> 
                      </tbody>
                    </table>
                  </div>
                       
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
                      @endforeach
                      </form>

                       @foreach($transfer as $trans)
                       @if(!empty($trans->transfer_image))
                           <center><img src="{{ asset('/images/frontend_images/transfer/small/'.$trans->transfer_image)}}"></center><br>
                            @endif
                      <center>
                        <a class="btn btn-xs btn-success" href="{{ asset('/images/frontend_images/transfer/large/'.$trans->transfer_image)}}">Bukti Transfer</a>
                        <a class="btn btn-xs btn-danger" href="{{ url('/admin/delete_image/'.$trans->id)}}">Delete</a>
                      </center>
                      @endforeach
                      
                   <!-- View Product -->   
                      
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
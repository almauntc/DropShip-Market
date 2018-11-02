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
                                <h4 class="m-b-0 text-white">Edit Dropshipper's Status Products</h4>
                            </div>
                          </div>

                    <div class="card-body">
                      
                      <form enctype="multipart/form-data" class="forms-sample"  method="post" action="" name="add_attribute" id="add_attribute" >{{ csrf_field() }}
                        <div class="form-group">
                          <label style="color:#308ee0;" for="name_product" class="control-label">Dropshipper Name</label><br>
                          <label for="name_product" class="control-label"><strong>{{ $userCart->name }}</strong></label>
                        </div>
                        <div class="form-group">
                          <label style="color:#308ee0;" for="code_product">Email</label><br>
                          <label for="code_product" class="control-label"><strong>{{ $userCart->email }}</strong></label>
                        </div>
                        <div class="form-group">
                          <label style="color:#308ee0;" for="color_product">Handphone</label><br>
                          <label for="color_product" class="control-label"><strong>{{ $userCart->handphone }}</strong></label>
                        </div>
                        <div class="form-group">
                          <label style="color:#308ee0;" for="name_product" class="control-label">Bank Mandiri Account Number</label><br>
                          <label for="name_product" class="control-label"><strong>{{$userCart->bank_account_number}}</strong></label>
                        </div>
                        <div class="form-group">
                          <label style="color:#308ee0;" for="color_product">Hired Date</label><br>
                          <label for="color_product" class="control-label"><strong>{{ $userCart->created_at }}</strong></label>
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
                      </form>
                      <br>
                      <!-- View Product -->

                      <h4 style="color:#308ee0;">View Product Sale</h4>
                      <form action="{{ url('/admin/dropshipper-management/dropshipper/editStatus/'.$userCart->id) }}" method="post">{{ csrf_field() }}
                      <div class="table-responsive">
                       <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Product Description
                          </th>
                          <th>
                          <!--  <center>Delivery<br>Payment</center> -->
                          <center>Customer<br>Description</center>
                          </th>
                           <th>
                           <center> Customer<br>Delivery<br>Status</center>
                          </th>
                          <th>
                            <center>Customer<br>Payment<br>Status</center>
                          </th>
                          <th>
                            <center>Dropshipper<br>Payment<br>Status</center>
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($userCart->myproduct as $attribute)
                       <tr>
                          <td><input type="hidden" name="idSale[]" value="{{$attribute->id}}">{{$attribute->id}}</td>
                            <td>
                            <br>Name<span style="padding:4px;">: <b>{{$attribute->name_product}}</span></b>
                            <br>Code<span style="padding:8px;">: <b>{{$attribute->code_product}}</span></b>
                            <br>Color<span style="padding:9px;">: <b>{{$attribute->color_product}}</span></b>
                            <br>Size<span style="padding:19px;">: <b>{{$attribute->size}}</span></b>
                          </td>
                          <td>
                           <!-- <input style="width:75px;" type="text" name="delivery_payment[]" value="{{$attribute->delivery_payment}}"> -->
                             <a  class="btn btn-xs btn-info" href="{{ url('/admin/customer_info/'.$attribute->id) }}">
                                <center><b>View</b></center>
                              </a>
                              
                          </td>
                           <td><select style="width:90px;" name="customer_delivery_status[]">
                              <option>{{$attribute->customer_delivery_status}}</option>
                              <option value="Sudah Dikirim">Sudah Dikirim</option>
                              <option value="Belum Dikirim">Belum Dikirim</option></select></td>
                          <td><select style="width:90px;" name="customer_payment_status[]">
                              <option>{{$attribute->customer_payment_status}}</option>
                              <option value="Sudah Bayar">Sudah Bayar</option>
                              <option value="Belum Bayar">Belum Bayar</option></select></td>
                         <td><select style="width:90px;" name="dropshipper_payment_status[]">
                              <option>{{$attribute->dropshipper_payment_status}}</option>
                              <option value="Sudah Dibayar">Sudah Dibayar</option>
                              <option value="Belum Dibayar">Belum Dibayar</option></select></td>
                          <td>
                            <div class="hidden-sm hidden-xs btn-group">
                             <a href="{{ url('/admin/dropshipper-management/dropshipper/editStatus/' .$attribute->id) }}">
                              <button type="submit" class="btn btn-xs btn-primary">
                                <b>✔</b>
                              </button></a>
                              </div>
                            </form>
                              <div class="hidden-sm hidden-xs btn-group">
                              <a class="btn btn-xs btn-danger" href="{{ url('/admin/dropshipper-management/dropshipper/deleteStatus/' .$attribute->id) }}">
                                <b>✘</b>
                             </a>  
                            </div>
                          </td>
                        </tr> 
                    @endforeach
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
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
                                <h4 class="m-b-0 text-white">Change Password</h4>
                            </div>
                          </div>

                    <div class="card-body">
                      
                      <form class="forms-sample"  method="post" action="{{ url('/admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-group">
                          <label for="current_pwd">Current Pasword</label>
                          <input type="password"  class="form-control" name="current_pwd" id="current_pwd" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="new_pwd">New Password</label>
                          <input type="password" class="form-control" name="new_pwd" id="new_pwd" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="confirm_pwd">Confirm Password</label>
                          <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Update Password</button>
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
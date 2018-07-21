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
                                <h4 class="m-b-0 text-white">New Sale</h4>
                            </div>
                          </div>

                    <div class="card-body">
                      
                      <form class="forms-sample"  method="post" action="" name="" id="" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-group">
                          <label for="#">Date Of Sales</label>
                          <input type="date"  class="form-control" name="" id="" placeholder="">
                        </div>
                        
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
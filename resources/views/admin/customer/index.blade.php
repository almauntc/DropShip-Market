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
                     <h4 class="m-b-0 text-white">List Of Customer</h4>
                 </div>
                <div class="card-body">
                  <div class="form-group">
                      <div class="input-group input-group-rounded">
                      <input type="text" placeholder="Name" name="Search" class="form-control">
                      <span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit">
                         Search</i></button></span>                  
                      </div>
                     </div>
                 <br>
                 
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                           <center> Dropshipper's<br>ID</center>
                          </th>
                          <th>
                            Customer Name
                          </th>
                          <th>
                            Phone Number
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($customers as $custom)
                       <tr>
                          <td>{{ $custom->id }}</td>
                          <td><center>{{ $custom->dropshipper_id }}</center></td>
                          <td>{{ $custom->name_customer }}</td>
                          <td>{{ $custom->handphone }}</td>
                          <td>{{ $custom->email }}</td>
                          <td>
                            <div class="hidden-sm hidden-xs btn-group">
                              <i class="text-white">..</i>
                              <a href="{{ url('/admin/customer/delCustomer/' .$custom->id) }}">
                              <button class="btn btn-xs btn-danger">
                                <b><i>Delete</i></b>
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
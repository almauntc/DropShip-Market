@extends('layouts.adminLayout.admin_design')
@section('content')
   <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-header" >
                     <h4 class="m-b-0 text-white">List Of Order</h4>
                 </div>
                <div class="card-body">
                  <div class="form-group">
                      <div class="input-group input-group-rounded">
                      <input type="text" placeholder="Name" name="Search" class="form-control">
                      <span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit">
                         Search</i></button></span>                  
                      </div>
                     </div>

                     <a href="{{ url('/admin/customer-management/order/newOrder') }}"><button class="btn btn-success btn-block col-lg-3">New Order
                      <i class="mdi mdi-plus"></i>
                    </button></a>
                 <br>
                 
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Name Product
                          </th>
                          <th>
                            Type Product
                          </th>
                          <th>
                            Price
                          </th>
                          <th>
                            Date of Order
                          </th>
                          <th>
                            Name of Customer
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        
                      </tbody>
                    </table>
                  </div>


                </div>
              </div>
            </div>
             </div>
              </div>
@endsection
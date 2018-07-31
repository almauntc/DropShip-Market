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
                                <h4 class="m-b-0 text-white">Edit Category</h4>
                            </div>
                          </div>

                    <div class="card-body">
                      
                      <form class="forms-sample"  method="post" action="{{ url('/admin/category/editCategory/'.$categoryDetails->id) }}" name="editCategory" id="editCategory" novalidate="novalidate">{{ csrf_field() }}
                        <div class="form-group">
                          <label for="name_product">Category Name</label>
                          <input type="text" value="{{ @$categoryDetails->name_category }}" class="form-control" name="name_category" id="name_category"  required class="form-control" >
                        </div>
                        <div class="form-group">
                          <label for="id_parent">Category Level</label>
                          <div class="controls">
                            <div class="styled-select slate">
                          <select name="id_parent">
                            <option value="0">Main Category</option>
                            @foreach($levels as $val)
                            <option value="{{ $val->id }}" @if($val->id == $categoryDetails->id_parent) selected @endif>{{ $val->name_category }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                        </div>
                        <div class="form-group">
                          <label for="code_product">Description</label>
                          <input type="text" value="{{ @$categoryDetails->description }}"class="form-control" name="description" id="description" required class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="desc">URL</label>
                          <input type="text" value="{{ @$categoryDetails->url }}" class="form-control" name="url" id="url" required class="form-control" placeholder="">
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
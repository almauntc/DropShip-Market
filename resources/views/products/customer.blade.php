@extends('layouts.frontLayout.front_design')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Data Customer</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="alert alert-info">
                <p>- Masukkan data Customer Pembeli Produk Untuk Kelengkapan Informasi Pengiriman Barang dan Keamanan</p>
            </div><!--/register-req-->
           
            <div class="shopper-informations">
                 <div class="row">
                    @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger alert-block">
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
                       <div class="col-sm-6">
                            <div class="shopper-info">
                                
                                      <form name="add_customer" id="add_customer" action="{{ url('tambah-customer')}}" method="post">{{ csrf_field() }}
                                        <div class="form-group">
                                        <label style="color:#f9004b;" for="name_product" class="control-label">Nama Produk </label> 
                                        <label for="name_product" class="control-label"><span style="padding:4px;">:<strong> {{$productsDetails->name_product}}</strong></label></span>
                                      </div>
                                      <p style="color:#FF5143;">Informasi Customer</p>
                                        <input type="hidden" name="sale_id" value="{{ $productsDetails->id }}">
                                          <input type="hidden" name="dropshipper_id" id="dropshipper_id" value="{{ Session::get('id')}}">
                                          <input type="name" class="form-control" required="required" id="name_customer" name="name_customer" placeholder="Nama Lengkap"/>
                                          <input type="email" class="form-control" required="required" id="email" name="email" placeholder="Email"/>
                                          <input type="text" class="form-control" required="required" id="handphone" name="handphone" placeholder="Handphone"/>
                                          <input type="text" class="form-control" required="required" id="kode_pos" name="kode_pos" placeholder="Kode Pos"/>
                                          <textarea name="address" id="address" required="required" class="form-control" rows="3" placeholder="Alamat Lengkap"></textarea><br>
                                    <a class="btn btn-primary" href="{{url('/penjualan-produk')}}"> << </a>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                     <a class="btn btn-primary" href="{{url('/edit-customer/'.$productsDetails->id)}}">Edit</a>
                                     <a class="btn btn-primary" href="{{url('/info-bayar/'.$productsDetails->id)}}">Selanjutnya >></a><br><br>
                                    </form>
                                    
                                      
                             </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="order-message">
                                <img src="{{ asset('images/frontend_images/shop/01_2_b_4x.jpg')}}" alt="" />
                            </div>  
                        </div>                
               </div>
            </div>
            
        </div>
    </section> <!--/#cart_items-->

@endsection

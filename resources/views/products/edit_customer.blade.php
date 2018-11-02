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
                                <p style="color:#FF5143;">Edit Informasi Customer</p>
                                      <form name="edit_customer" id="edit_customer" action="{{ url('/edit-customer/'.$customerDetails->id)}}" method="post">{{ csrf_field() }}
                                          <input type="name" class="form-control" required="required" id="name_customer" name="name_customer" value="{{ @$customerDetails->name_customer }}"/>
                                          <input type="email" class="form-control" required="required" id="email" name="email" value="{{ @$customerDetails->email }}"/>
                                          <input type="text" class="form-control" required="required" id="handphone" name="handphone" value="{{ @$customerDetails->handphone }}"/>
                                          <input type="text" class="form-control" required="required" id="kode_pos" name="kode_pos" value="{{ @$customerDetails->kode_pos }}"/>
                                          <textarea name="address" id="address" required="required" class="form-control" rows="3" placeholder="{{ @$customerDetails->address }}" value="{{ @$customerDetails->address }}"></textarea><br>
                                      <a class="btn btn-primary" href="{{url('/data-customer/'.$customerDetails->id)}}"> << </a>
                                      <button type="submit" class="btn btn-primary">Ubah</button>
                                     <a class="btn btn-primary" href="{{url('/info-bayar/'.$customerDetails->id)}}">Selanjutnya >></a><br><br>
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

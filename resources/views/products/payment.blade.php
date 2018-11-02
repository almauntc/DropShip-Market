@extends('layouts.frontLayout.front_design')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Info Pembayaran</li>
                </ol>
            </div><!--/breadcrums-->
            <div class="alert alert-info">
                <p>- Cetak Informasi Pembayaran ini dan berikan ke customermu
                    <br>- Mintalah bukti transfer ke customermu</p>
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
                                <center><b><p style="color:#f9004b;">Informasi Pembayaran Transfer Customer</p></b><br></center>
           
                                    <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{ url('upload_bukti') }}" name="add_transfer" id="add_transfer" novalidate="novalidate">{{ csrf_field() }}
                                     <input type="hidden" name="id_sale" value="{{ $SaleDetails->id }}">
                                     <input type="hidden" name="id_customer" value="{{ $CustomerDetails->id }}">
                                     <input type="hidden" name="id_dropshipper" id="id_dropshipper" value="{{ Session::get('id')}}">
                                     <div class="form-group">
                                      <label style="color:#f9004b;" for="product_price" class="control-label">Nama Produk (Ukuran)</label> 
                                      <label for="product_price" class="control-label"><span style="padding:4px;">: {{ @$userPayment->name_product}} ( {{ @$userPayment->size }} )</label></span>
                                    </div>
                                    <div class="form-group">
                                      <label style="color:#f9004b;" for="product_price" class="control-label">Jumlah Produk </label> 
                                      <label for="product_price" class="control-label"><span style="padding:50px;">: {{ @$userPayment->quantity}} </label></span>
                                    </div>
                                    <div class="form-group">
                                      <label style="color:#f9004b;" for="product_price" class="control-label">Total Harga Produk </label> 
                                      <label for="product_price" class="control-label"><span style="padding:25px;">: Rp. {{ @$userPayment->price_retail*@$userPayment->quantity}} </label></span>
                                    </div>
                                    <div class="form-group">
                                      <label style="color:#f9004b;" for="delivery_price" class="control-label">Ongkos Kirim </label>
                                      <label for="delivery_price" class="control-label"><span style="padding:60px;">:<strong> Rp. </strong></label></span>
                                    </div>

                                       <div class="form-group">
                                      <label style="color:#f9004b;" for="total_payment" class="control-label">Total Pembayaran</label><br>
                                      <label for="total_payment" class="control-label"><strong>Rp. </strong></label>
                                    </div>
                                    <div class="form-group">
                                      <label style="color:#f9004b;" for="no_banking">Nomor Rekening </label><br>
                                      <label for="no_banking" class="control-label"><strong>140-00-15590226-6</strong></label>
                                    </div>
                                    <div class="form-group">
                                      <label style="color:#f9004b;" for="name_banking">Nama Rekening</label><br>
                                      <label for="name_banking" class="control-label"><strong> PT. E-Dropship Indonesia</strong></label>
                                    </div>
                                     <div class="form-group">
                                      <label style="color:#f9004b;" for="name_bank">Nama Bank</label><br>
                                      <label for="color_product" class="control-label"><strong>Mandiri</strong></label>
                                    </div>
                                    <div class="form-group">
                                      <label style="color:#f9004b;" for="transfer_image" class="control-label">Upload Bukti Transfer</label><br>
                                       <input type="file" class="control-label" name="transfer_image" id="transfer_image" placeholder="">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Kirim Bukti Transfer</button>
                                     <a class="btn btn-primary" href="{{url('/print_info/'.$SaleDetails->id)}}"><i class="fa fa-print"></i></a>
                                     <!--<a class="btn btn-primary" href="{{url('/kwitansi')}}">Selanjutnya >></a><br><br>-->
                                    </form>
                                     
                             </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="order-message">
                                <img src="{{ asset('images/frontend_images/shop/cashback.png')}}" alt="" />
                            </div>  
                        </div>                 
               </div>
            </div>
             <div id="gmap" class="contact-map">
            </div>
            
        </div>
    </section> <!--/#cart_items-->
@endsection

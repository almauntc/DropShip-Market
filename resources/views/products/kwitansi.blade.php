@extends('layouts.frontLayout.front_design')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Cetak Bukti Pembayaran</li>
                </ol>
            </div><!--/breadcrums-->
            
            <div class="shopper-informations">
                 <div class="row">
                         <center><b><p style="color:#f9004b;"><i>"Cetak Bukti Pembayaran Ini dan Kirim ke Customermu"</i></p></b><br></center>
                       <center><img src="{{ asset('images/frontend_images/shop/drib_thankyou.gif')}}" alt="" /><br>
                       <a class="btn btn-primary" href="">Cetak Bukti Pembayaran</a> </center>              
               </div>
            </div>
             <div id="gmap" class="contact-map">
            </div>
            
        </div>
    </section> <!--/#cart_items-->
@endsection

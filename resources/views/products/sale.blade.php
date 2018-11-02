@extends('layouts.frontLayout.front_design')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Cek Penjualan Produk</li>
                </ol>
            </div><!--/breadcrums-->
        
            <div class="table-responsive cart_info">
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
                <form>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="profit">Keuntungan</td>
                          <!--  <td class="ongkir">Ongkir<br>Customer</td> -->
                            <td class="delivery_payment">Status Bayar<br>Dropshipper</td>
                            <td class="dropshipper_payment_status">Status Kirim<br>ke Customer</td>
                            <td class="customer_payment_status">Status Bayar<br>Customer</td>
                            <td class="data_customer">Data<br>Customer</td>
                            <td></td>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_profit = 0; ?>
                        <?php $total_customer = 0; ?>
                        @foreach($userCart as $cart)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img style="width:100px;" src="{{asset('images/backend_images/products/small/' .$cart->image)}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <center><h4><a href="">{{$cart->name_product}}</a></h4>
                                <p>{{$cart->code_product}} | {{$cart->size}}<br>Jumlah : {{$cart->quantity}}<br>
                                    Ongkir : </p>
                                <h6>{{$cart->created_at}}</h6><center>
                            </td>
                            <td class="profit">
                                <p>Rp {{$cart->profit*$cart->quantity}}</p>
                            </td>
                           <!-- <td class="delivery_payment">
                                <p>Rp {{$cart->delivery_payment}}<br> Tujuan : </p>
                            </td> -->
                             <td class="dropshipper_payment_status">
                                <p>{{$cart->dropshipper_payment_status}}</p>
                            </td>
                             <td class="customer_delivery_status">
                                <p>{{$cart->customer_delivery_status}}</p>
                            </td>
                            <td class="customer_payment_status">
                                 <p>{{$cart->customer_payment_status}}</p>
                            </td>
                            <td class="data_customer">
                                 <a class="btn btn-danger" href="{{url('/data-customer/'.$cart->id)}}">Input</a>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ url('/penjualan-produk/delete-product/'.$cart->id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php $total_profit = $total_profit + ($cart->profit*$cart->quantity);?>
                    <?php $total_customer = $total_customer + ($cart->price_retail*$cart->quantity);?>

                        @endforeach
                    </tbody>

                </table>

                </form>
                
            </div>

        <section id="do_action">
        <div class="container">
            <div class="row">                 
                    <div class="total_area">
                        <ul>
                            <li>Total Keuntungan Dropshipper<span>Rp <?php echo $total_profit; ?></span></li>
                            <li>Total Bayar Produk Customer<span>Rp <?php echo $total_customer; ?></span></li>
                        </ul>
                       
                    </div>
                    </form>
            </div>
        </div>
    </section><!--/#do_action-->
            
    </div>
    </section> <!--/#cart_items-->
@endsection

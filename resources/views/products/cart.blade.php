@extends('layouts.frontLayout.front_design')
@section('content')
    <section id="cart_items">
        <div class="container"> 
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="{{ url('/home') }}">Home</a></li>
                  <li class="active">Produk Saya</li>
                </ol>
            </div>
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
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price_reseller">Harga<br>Dropshipper*</td>
                            <td class="price_retail">Harga<br>Customer*</td>
                             <td class="profit">@ Profit</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td class="action text-center">Action</td>
                            <td class="total">     </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total_amount = 0; ?>
                        <?php $total_profit = 0; ?>
                        @foreach($userCart as $cart)
                        <form name="addtosaleForm" id="addtosaleForm" action="{{ url('tambah-penjualan')}}" method="post">{{ csrf_field() }}
                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                            <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                            <input type="hidden" name="name_product" value="{{ $cart->name_product }}">
                            <input type="hidden" name="code_product" value="{{ $cart->code_product }}">
                            <input type="hidden" name="color_product" value="{{ $cart->color_product }}">
                            <input type="hidden" name="size" id="size" value="{{ $cart->size }}">
                            <input type="hidden" name="profit" id="profit" value="{{$cart->profit*$cart->quantity}}">
                            <input type="hidden" name="dropshipper_id" id="dropshipper_id" value="{{ Session::get('id')}}">
                        <tr>
                            <td class="cart_product">
                                <a href=""><img style="width:100px;" src="{{asset('images/backend_images/products/small/' .$cart->image)}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                               <center><h4><a href="">{{$cart->name_product}}</a></h4><br>
                                <p>{{$cart->code_product}} | {{$cart->size}} </p></center>
                            </td>
                            <td class="cart_price_reseller">
                                <p>Rp {{$cart->price_reseller}}</p>
                            </td>
                             <td class="cart_price_retail">
                                <p>Rp {{$cart->price_retail}}</p>
                            </td>
                            <td class="profit">
                                <p class="cart_profit_total">Rp {{$cart->profit}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="{{ url('/produk-saya/update-quantity/'.$cart->id.'/1') }}"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">
                                    @if($cart->quantity>1)
                                    <a class="cart_quantity_down" href="{{ url('/produk-saya/update-quantity/'.$cart->id.'/-1') }}"> - </a>
                                    @endif
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Rp {{$cart->price_retail*$cart->quantity}}</p>
                            </td>
                            <td class="cart_add">
                                <button id="form_id" class="btn btn-default update" type="submit">Validasi</button>
                            </td>
                            <td>
                                <a class="cart_quantity_delete" href="{{ url('/produk-saya/delete-product/'.$cart->id) }}"><i class="fa fa-trash-o" style="color:#FF5143;"></i></a><br>
                            </td>
                        </tr>
                    </tbody>

                    <?php $total_amount = $total_amount + ($cart->price_retail*$cart->quantity);?>
                    <?php $total_profit = $total_profit + ($cart->profit*$cart->quantity);?>
                </form>
                    @endforeach
                </table>
            </div>
             <div class="alert alert-info">
                <p>- *Harga Dropshipper = Harga Reseller<br>
                - *Harga Customer    = Harga Retail</p>
            </div>
        </div>
        <br>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="row">                 
                    <div class="total_area">
                        <ul>
                            <li>Total Bayar Customer <span>Rp <?php echo $total_amount; ?></span></li>
                            <li>Total Keuntungan Dropshipper<span>Rp <?php echo $total_profit; ?></span></li>
                        </ul>
                        <center>
                           <a class="btn btn-default check_out" href="{{ url('/penjualan-produk')}}">Cek Penjualan</a>
                        </center>
                    </div>
                    </form>
            </div>
        </div>
    </section><!--/#do_action-->
   
@endsection

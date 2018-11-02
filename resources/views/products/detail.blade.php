@extends('layouts.frontLayout.front_design')
@section('content')
<section>
        <div class="container">
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
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                 <?php //echo $categories_menu; ?>
                                 @foreach($categories as $cat)
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            {{$cat->name_category}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$cat->id}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($cat->categories as $subcat)
                                            <li><a href="{{ asset('/products/'.$subcat->url) }}">{{$subcat->name_category}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div><!--/category-products-->
                    </div>

                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ongkos Kirim Customer*</h3>
                        </div>
                        <div class="panel-body">
                                <div>
                                    <?php
                                    //Get Data Kabupaten
                                    $curl = curl_init();
                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => "",
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 30,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => "GET",
                                        CURLOPT_HTTPHEADER => array(
                                            "key:f4088bbd9edf1d8f0903b402de103b69"
                                        ),
                                    ));

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);
                                    echo "
                                    <div class= \"form-group\">
                                    <label for=\"asal\">Kota/Kabupaten Asal </label>
                                    <select class=\"form-control\" name='asal' id='asal'>";
                                    echo "<option>Pilih Kota Asal</option>";
                                    $data = json_decode($response, true);
                                    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                        echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
                                    }
                                    echo "</select>
                                    </div>";
                                    //Get Data Kabupaten
                                    //-----------------------------------------------------------------------------

                                    //Get Data Provinsi
                                    $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => "",
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 30,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => "GET",
                                        CURLOPT_HTTPHEADER => array(
                                        "key:f4088bbd9edf1d8f0903b402de103b69"
                                        ),
                                        ));

                                        $response = curl_exec($curl);
                                        $err = curl_error($curl);

                                        echo "
                                        <div class= \"form-group\">
                                            <label for=\"provinsi\">Provinsi Tujuan </label>
                                            <select class=\"form-control\" name='provinsi' id='provinsi'>";
                                                echo "<option>Pilih Provinsi Tujuan</option>";
                                                $data = json_decode($response, true);
                                                for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                                    echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                                                }
                                                echo "</select>
                                            </div>";
                                            //Get Data Provinsi
                                            ?>

                                            <div class="form-group">
                                                <label for="kabupaten">Kota/Kabupaten Tujuan</label><br>
                                                <select class="form-control" id="kabupaten" name="kabupaten"></select>
                                            </div>
                                            <div class="form-group">
                                                <label for="kurir">Kurir</label><br>
                                                <select class="form-control" id="kurir" name="kurir">
                                                    <option value="jne">JNE</option>
                                                    <option value="tiki">TIKI</option>
                                                    <option value="pos">POS INDONESIA</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="berat">Berat (gram)</label><br>
                                                <input class="form-control" id="berat" type="text" name="berat" value="500" />
                                            </div>
                                            <button class="btn btn-danger" id="cek" type="submit" name="button">Cek Ongkir</button>
                                        </div>
                                </div>
                            </div>
                             <p><i>*Masukkan kota tujuan customer pembeli produkmu</i></p>

                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ asset('images/backend_images/products/medium/'.$productsDetails->image)}}" alt="" />
                            </div><br>
                             
                        
                        </div>
                        <div class="col-sm-7">
                            <form name="addtocartForm" id="addtocartForm" action="{{ url('tambah-produk')}}" method="post">{{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $productsDetails->id }}">
                            <input type="hidden" name="name_product" value="{{ $productsDetails->name_product }}">
                            <input type="hidden" name="code_product" value="{{ $productsDetails->code_product }}">
                            <input type="hidden" name="color_product" value="{{ $productsDetails->color_product }}">
                            <input type="hidden" name="price_retail" id="price_retail" value="{{ $productsDetails->price_retail }}">
                            <input type="hidden" name="price_reseller" id="price_reseller" value="{{ $productsDetails->price_reseller }}">
                            <input type="hidden" name="profit" id="profit" value="{{ $productsDetails->profit }}">
                            <input type="hidden" name="dropshipper_email" id="dropshipper_email" value="{{ Session::get('email')}}">
                            <input type="hidden" name="dropshipper_id" id="dropshipper_id" value="{{ Session::get('id')}}">

                            <div class="product-information"><!--/product-information-->
                                <img src="{{ asset('images/frontend_images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                <h2>{{ $productsDetails->name_product }}</h2>
                                <p>Code: {{ $productsDetails->code_product }}</p>
                                <img src="{{ asset('images/frontend_images/product-details/rating.png')}}" alt="" /><br><br>
                                <p>
                                    <select id="selSize" name="size" style="width:150px;">
                                        <option value="">Pilih Ukuran</option>
                                        @foreach($productsDetails->attributes as $sizes)
                                        <option value="{{ $productsDetails->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
                                        @endforeach
                                    </select>
                                </p><br>
                                  <div id="getPrice" class="table-responsive">
                                        <table class="table table-bordered">
                                          <thead>
                                            <tr>
                                              <th>
                                               Harga Retail
                                              </th>
                                              <th>
                                                Harga Dropshipper
                                              </th>
                                              <th>
                                                Keuntungan
                                              </th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                           <tr>
                                              <td>Rp {{$productsDetails->price_retail}}</td>
                                              <td>Rp {{$productsDetails->price_reseller}}</td>
                                              <td>Rp {{$productsDetails->profit}}</td>
                                            </tr> 
                                          </tbody>
                                        </table>
                                      </div>
                                    <span>
                                    <label>Quantity :</label>
                                    <input type="text" name="quantity" value="1" />
                                    @if($total_stock>0)
                                    <button id="cartButton" type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Jualkan Produk
                                    </button>
                                    @endif
                                </span>
                                 <p><b>Ketersediaan :</b><span id="Availability"> @if($total_stock>0) Ada Stok @else Stok Habis @endif</p></span>
                                <p><b>Update :</b> {{$productsDetails->updated_at}}</p>    
                            </div><!--/product-information-->
                           
                            <br>
                        
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Hasil Ongkir</h3>
                                </div>
                                <div class="panel-body">
                                    <ol>
                                        <div id="ongkir"></div>
                                    </div>
                                </ol>
                            </div>
                        </div>

                            </form>
                        </div>
                    </div><!--/product-details-->
                    

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                                
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="details" >
                                 <h4><u>{{ $productsDetails->name_product }}</u></h4>
                                    <p><b>Deskripsi :</b>
                                        <br> {{$productsDetails->desc}}<br><br>
                                        <b>Warna :</b>
                                        <br> {{$productsDetails->color_product}}<br>
                                    </p>
                            </div>
                            
                           
                            
                        </div>
                    </div><!--/category-tab-->
                    
                </div>
            </div>
        </div>
    </section>

@endsection

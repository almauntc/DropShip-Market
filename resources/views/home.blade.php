@extends('layouts.frontLayout.front_design')
@section('content')
<section id="advertisement">
        <div class="container">
            <img src="{{ asset('images/frontend_images/shop/advertisement.jpg')}}" alt="" />
        </div>
    </section>
    
<section>
        <div class="container">
            <div class="row">
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
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Semua Produk </h2>
                        @foreach($productsAll as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('images/backend_images/products/small/'.$product->image)}}" alt="" />
                                            <h4>{{ $product->name_product }}</h4>
                                            <p>Harga Retail   : Rp {{ $product->price_retail }}</p>
                                            <p>Harga Reseller : Rp {{ $product->price_reseller }}</p>
                                          
                                            <a href="{{url('/product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-folder-open-o"></i>Detail Produk</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>Rp {{ $product->profit }}</h2>
                                                <p>{{ $product->name_product }}</p>
                                                <a href="{{url('/product/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-folder-open-o"></i>Detail Produk</a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                            <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection

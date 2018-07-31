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
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#pakaian">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Pakaian
                                        </a>
                                    </h4>
                                </div>
                                <div id="pakaian" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Wanita</a></li>
                                            <li><a href="#">Pria </a></li>
                                            <li><a href="#">Anak </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#sepatu">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Sepatu
                                        </a>
                                    </h4>
                                </div>
                                <div id="sepatu" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Wanita</a></li>
                                            <li><a href="#">Pria</a></li>
                                            <li><a href="#">Anak</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#komputer">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Komputer
                                        </a>
                                    </h4>
                                </div>
                                <div id="komputer" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Laptop</a></li>
                                            <li><a href="#">Mouse</a></li>
                                            <li><a href="#">Aksesori Komputer lainnya</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Urutkan Produk</h2>
                            <div class="urutkan">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> <span class="pull-right"></span>Keuntungan Terbesar</a></li>
                                    <li><a href="#"> <span class="pull-right"></span>Update Terbaru</a></li>
                                    <li><a href="#"> <span class="pull-right"></span>Nama Barang (A-Z)</a></li>
                                    <li><a href="#"> <span class="pull-right"></span>Harga Retail Tertinggi</a></li>
                                    <li><a href="#"> <span class="pull-right"></span>Harga Retail Termurah</a></li>
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Rentang Harga</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="250000" data-slider-max="4000000" data-slider-step="5" data-slider-value="[250000,500000]" id="sl2" ><br />
                                 <b class="pull-left">Rp 250 rb</b> <b class="pull-right">> Rp 4 juta</b>
                            </div>
                        </div><!--/price-range-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Pakaian Pria</h2>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product1.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product2.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product3.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product4.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                    <img src="{{asset('images/frontend_images/home/new.png')}}" class="new" alt="" />
                                </div>
                                <div class="choose">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product5.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                    <img src="{{ asset('images/frontend_images/home/sale.png')}}" class="new" alt="" />
                                </div>
                                <div class="choose">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product6.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="choose">
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product4.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                    <img src="{{asset('images/frontend_images/home/new.png')}}" class="new" alt="" />
                                </div>
                                <div class="choose">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product5.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                    <img src="{{ asset('images/frontend_images/home/sale.png')}}" class="new" alt="" />
                                </div>
                                <div class="choose">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product6.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="choose">
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product4.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                    <img src="{{asset('images/frontend_images/home/new.png')}}" class="new" alt="" />
                                </div>
                                <div class="choose">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product5.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                    <img src="{{ asset('images/frontend_images/home/sale.png')}}" class="new" alt="" />
                                </div>
                                <div class="choose">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                            <img src="{{ asset('images/frontend_images/home/product6.jpg')}}" alt="" />
                                            <h4>Easy Polo Black Edition</h4>
                                            <p>Harga Retail   : $56</p>
                                            <p>Harga Reseller : $56</p>
                                            <p>Keuntungan     : $56</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <p>Keuntungan :</p>
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Jadikan Produk Dropship</a>
                                            </div>
                                    </div>
                                </div>
                                <div class="choose">
                                </div>
                            </div>
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

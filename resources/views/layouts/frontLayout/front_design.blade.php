<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-DROPSHIP</title>
    <link href="{{ asset('css/frontend_css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend_css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/frontend_css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/frontend_css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('images/frontend_images/logo.png') }}">
      

</head><!--/head-->

<body>
	@include('layouts.frontLayout.front_header')
	
	@yield('content')

	@include('layouts.frontLayout.front_footer')

  
    <script src="{{ asset('js/frontend_js/jquery.js') }}"></script>
	<script src="{{ asset('js/frontend_js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('js/frontend_js/price-range.js') }}"></script>
    <script src="{{ asset('js/frontend_js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/frontend_js/main.js') }}"></script>
</body>
</html>
<script type="text/javascript">

    $(document).ready(function(){
        $('#provinsi').change(function(){

            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
            var prov = $('#provinsi').val();

            $.ajax({
                type : 'GET',
                url : '/cek_kabupaten',
                data :  'prov_id=' + prov,
                    success: function (data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#kabupaten").html(data);
                }
            });
        });

        $("#cek").click(function(){
            //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
            var asal = $('#asal').val();
            var kab = $('#kabupaten').val();
            var kurir = $('#kurir').val();
            var berat = $('#berat').val();

            $.ajax({
                type : 'POST',
                url : '/cek_ongkir',
                data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                    success: function (data) {

                    //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
                    $("#ongkir").html(data);
                }
            });
        });
    });
</script>

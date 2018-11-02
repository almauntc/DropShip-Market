<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Info Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('css/frontend_css/style.css') }}" media="all" />

  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('images/frontend_images/home/logo.png') }}">
      </div>
      <!--<div id="company">
        <h2 class="name">Company Name</h2>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
    -->
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          @foreach($Customer->mystatus as $user)
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{$user->name_customer}}</h2>
          <div class="address">{{$user->address}}</div>
          <div class="email"><a href="mailto:{{$user->name_customer}}">{{$user->email}}</a></div>
        </div>
        @endforeach
        <div id="invoice">
          <h1>INVOICE {{ $SaleDetails->id }}</h1>
          <div class="date">Tanggal : {{$SaleDetails->created_at}}</div>
         
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">No</th>
            <th class="desc">DESKRIPSI</th>
            <th class="unit">HARGA UNIT</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
           <?php $sub_total = 0; ?>
       
          <tr>
            <td class="no">1</td>
            <td class="desc"><h3>{{ $userSale->name_product}}</h3>Code : {{ $userSale->code_product}} 
              <br>Warna : {{ $userSale->color_product}}
              <br>Ukuran : {{ $userSale->size}}</td>
            <td class="unit">Rp {{ $userSale->price_retail}}</td>
            <td class="qty">{{ $userSale->quantity}}</td>
            <td class="total">Rp {{ $userSale->price_retail*$userSale->quantity}}</td>
          </tr>
            <?php $sub_total = $sub_total + ($userSale->price_retail*$userSale->quantity);?>
       
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>Rp <?php echo $sub_total; ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">ONGKIR</td>
            <td></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td></td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Terima Kasih!</div>
      <input type="button" value="Print" onclick="window.print()" class="btn btn-primary text-white";>
   
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
@extends('layouts.frontLayout.front_design')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      var profit = <?php echo $profit; ?>;
      console.log(profit);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(profit);
        var options = {
          title: 'Grafik Profit Penjualan Per-Tahun',
          curveType: 'function',
          legend: { position: 'right' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(data, options);
      }
    </script>
@section('content')
       <center><div id="linechart" style="width: 900px; height: 500px"></div></center>
@endsection

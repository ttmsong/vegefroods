<?php
	$conn=mysqli_connect("localhost","root","","vegefoods");
	$sql= "SELECT * FROM thongke";
	$result= mysqli_query($conn,$sql);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        
        var data = google.visualization.arrayToDataTable([
          ['Thời Gian', 'Số Lượng', 'Doanh Thu'],
        <?php
                while($row=mysqli_fetch_array($result))
                {  
                  echo "['".$row['thongke_thoigian']."',".$row['thongke_sanpham_soluong'].",".$row['thongke_sanpham_thanhtien']."],";
                }
        ?>
        ]);

        var options = {
          title : 'Doanh Thu Của Vegefoods',
          vAxis: {title: 'Doanh Thu'},
          hAxis: {title: 'Tháng'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>

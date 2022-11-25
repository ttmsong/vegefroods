<?php
	$conn=mysqli_connect("localhost","root","","vegefoods");
	$sql="SELECT DISTINCT thongke_thoigian FROM thongke ORDER BY thongke_thoigian";
	$result= mysqli_query($conn,$sql);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Thời Gian', 'Danh Thu'],
        <?php
        while($row=mysqli_fetch_array($result))
        {
          $rowTG=$row['thongke_thoigian'];
          $sql2= "SELECT SUM(thongke_sanpham_thanhtien) AS 'Tong' FROM thongke WHERE thongke_thoigian='$rowTG'";
          $result2= mysqli_query($conn,$sql2);
          while($row=mysqli_fetch_array($result2))
          {
            echo "['".$rowTG."',".$row['Tong']."],";
          }   
        }
        ?>
        ]);

        var options = {
          chart: {
            title: 'Thống Kê Danh Thu',
            subtitle: 'Danh Thu Theo Tháng',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>

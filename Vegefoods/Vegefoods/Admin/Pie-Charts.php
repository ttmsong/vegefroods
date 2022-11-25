<?php
	$conn=mysqli_connect("localhost","root","","vegefoods");
	$sql="SELECT DISTINCT thongke_sanpham_ten FROM thongke ORDER BY thongke_sanpham_ten";
	$result= mysqli_query($conn,$sql);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['thongke_sanpham_ten', 'thongke_sanpham_soluong'],
        <?php
        while($row=mysqli_fetch_array($result))
        {
          $rowT=$row['thongke_sanpham_ten'];
          $sql2= "SELECT SUM(thongke_sanpham_soluong) AS 'Tong' FROM thongke WHERE thongke_sanpham_ten='$rowT'";
          $result2= mysqli_query($conn,$sql2);
          while($row=mysqli_fetch_array($result2))
          {
            echo "['".$rowT."',".$row['Tong']."],";
          }
        }
        ?>
        ]);

        var options = {
          title: 'Thống Kê Số Lượng Bán Ra',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 800px; height: 500px;"></div>
  </body>
</html>
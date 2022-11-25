<?php
	$conn=mysqli_connect("localhost","root","","vegefoods");
	$sql="SELECT DISTINCT thongke_sanpham_ten FROM thongke ORDER BY thongke_sanpham_ten";
	$result= mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tên Sản Phẩm</th>
        <th scope="col">Số Lượng</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $count=0;
        while($row=mysqli_fetch_array($result))
        {
            $rowT=$row['thongke_sanpham_ten'];
            $sql2= "SELECT SUM(thongke_sanpham_soluong) AS 'Tong' FROM thongke WHERE thongke_sanpham_ten='$rowT'";
            $result2= mysqli_query($conn,$sql2);
            while($row=mysqli_fetch_array($result2))
            {
                $count++;
                echo
                '<tr>
                <th scope="row">'.$count.'</th>
                <td>'.$rowT.'</td>
                <td>'.$row['Tong'].'</td>
                </tr>'; 
            }
        }
    ?>
    </tbody>
    </table>
    </div>
</body>
</html>
<?php
  if(isset($_GET['Search']))
  {
    $S = $_GET['Search'];
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM thongke WHERE thongke_sanpham_ten LIKE '%$S%' OR thongke_id_cart LIKE '%$S%' OR thongke_taikhoan_ten LIKE '%$S%' OR thongke_thoigian LIKE '%$S%'";
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);
  }
  else {
    $ID_CART=$_GET['ID_CART'];
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM thongke WHERE thongke_id_cart='$ID_CART'";
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);
  }

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
</head>
<body>
  <?php include("Header.php");?>
    <div class="container">
        <div class="row mt-3">
          <form action="" method="POST">
              <table class="table table-hover">
                  <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Thời Gian</th>
                        <th scope="col">Mã Đơn Hàng</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá Sản Phẩm</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Thành Tiền</th>
                      </tr>
                    </thead>
                    <?php
                    $STT=0;
                    $TT=0;
                    while($row=mysqli_fetch_array($result))
                    {
                    $ID_CART_II=$row['thongke_id_cart'];
                    $STT+=1;
                    echo
                    '<tbody>
                    <tr>
                    <th scope="row">'.$STT.'</th>
                    <td>'.$row['thongke_thoigian'].'</td>
                    <td>'.$row['thongke_id_cart'].'</td>
                    <td>'.$row['thongke_sanpham_ten'].'</td>
                    <td>'.$row['thongke_sanpham_gia'].'</td>
                    <td>'.$row['thongke_sanpham_soluong'].'</td>
                    <td>'.$row['thongke_sanpham_thanhtien'].'</td>
                    </tr>
                    </tbody>';
                    $TT+=$row['thongke_sanpham_thanhtien'];
                    }
                    ?>
              </table>
          </form>
        </div>
        <div class="row mb-3">
        <div class="alert alert-success" role="alert">
        <?php
        echo '<h4 style="text-align: left;">Tổng Doanh Thu: '.$TT.'$</h4>';
        ?>
        </div>
        <?php
        echo '<a style="float: right;" href="Delete.php?ID_Cart='.$ID_CART_II.'" type="button" class="btn btn-outline-danger col-2">Xóa Đơn Hàng</a>';
        ?>
        </div>
    </div>
    <?php
    include("Footer.php");
    ?>
</body>
</html>
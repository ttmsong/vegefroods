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
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM thongke";
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
    <title>Thống Kê - Danh Sách</title>
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
                        <th scope="col">Mã Sản Phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Thành Tiền</th>
                        <th scope="col">Mã Khách Hàng</th>
                        <th scope="col">Tên Khách Hàng</th>
                        <th scope="col">Địa Chỉ Khách Hàng</th>
                        <th scope="col">Xử Lí</th>
                        <th scope="col">Trạng Thái</th>
                      </tr>
                    </thead>
                    <?php
                    $STT=0;
                    $TT=0;
                    while($row=mysqli_fetch_array($result))
                    {
                      $STT+=1;
                      echo
                      '<tbody>
                      <tr>
                        <th scope="row">'.$STT.'</th>
                        <td>'.$row['thongke_thoigian'].'</td>
                        <td>'.$row['thongke_id_cart'].'</td>
                        <td>'.$row['thongke_sanpham_id'].'</td>
                        <td>'.$row['thongke_sanpham_ten'].'</td>
                        <td>'.$row['thongke_sanpham_gia'].'</td>
                        <td>'.$row['thongke_sanpham_soluong'].'</td>
                        <td>'.$row['thongke_sanpham_thanhtien'].'</td>
                        <td>'.$row['thongke_taikhoan_id'].'</td>
                        <td>'.$row['thongke_taikhoan_ten'].'</td>
                        <td>'.$row['thongke_taikhoan_diachi'].'</td>
                        <td><a href="Delete.php?IDThongKe='.$row['thongke_id'].'" type="button" class="btn btn-outline-danger">Xóa Đơn Hàng</a></td>
                        <td>';
                        if($row['thongke_xuli']=='No')
                        {
                            echo '<a href="Delivery.php?IDThongKe='.$row['thongke_id'].'" type="button" class="btn btn-outline-dark">Chưa Giao Hàng</a>';
                        }
                        else
                        {
                            echo '<button type="button" class="btn btn-success" disabled>Đã Giao Hàng</button>';
                        }
                        echo '</td>
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
        echo '<h4 style="text-align: right;">Tổng Doanh Thu: '.$TT.'$</h4>';
        ?>
        </div>
        <form action="Delete.php" method="get">
          <button style="float: right;" type="success" class="btn btn-outline-success" name="Xoa_All_TK">Xóa Tất Cả</button>
        </form>
        </div>
    </div>
    <?php
    include("Footer.php");
    ?>
</body>
</html>
<?php
  if(isset($_GET['Search']))
  {
    $S = $_GET['Search'];
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM sanpham WHERE sanpham_ten LIKE '%$S%'";
    $result=mysqli_query($conn,$sql);
  }
  else {
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM sanpham";
    $result=mysqli_query($conn,$sql);
  }

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà</title>
</head>
<body>
  <?php include("Header.php");?>
    <div class="container">
        <div class="row mt-3">
          <form action="" method="POST">
              <table class="table">
                  <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Miêu Tả</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Giảm Giá</th>
                        <th scope="col">Loại</th>
                        <th scope="col">#</th>
                        <th scope="col">#</th>
                      </tr>
                    </thead>
                    <?php
                    $STT=0;
                        while($row=mysqli_fetch_array($result))
                        {
                          $STT+=1;
                          echo
                          '<tbody>
                          <tr>
                            <th scope="row">'.$STT.'</th>
                            <td>'.$row['sanpham_ten'].'</td>
                            <td>
                              <img src='."Uploaded/".$row['sanpham_hinhanh'].' style="width: 8rem;">
                            </td>
                            <td>'.$row['sanpham_mieuta'].'</td>
                            <td>'.$row['sanpham_gia'].'</td>
                            <td>'.$row['sanpham_giamgia'].'</td>
                            <td>'.$row['sanpham_loai'].'</td>
                            <td><a href="Delete.php?IDSP_DELETE='.$row['sanpham_id'].'" type="button" class="btn btn-outline-danger">Xóa</a></td>
                            <td><a href="Fix-Product.php?IDSP='.$row['sanpham_id'].'" type="button" class="btn btn-outline-dark">Sửa</a></td>
                          </tr>
                          </tbody>';
                        }
                    ?>
              </table>
          </form>
        </div>
    </div>
    <?php
    include("Footer.php");
    ?>
</body>
</html>
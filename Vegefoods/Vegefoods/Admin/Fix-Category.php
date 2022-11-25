<?php
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM loai";
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['sua']))
    {
        $id=$_GET['IDLoai'];
        $LT=$_POST['loai_ten'];
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql2="UPDATE loai SET loai_ten='$LT' WHERE loai_id=$id";
        $result2=mysqli_query($conn,$sql2);
        mysqli_close($conn);
        header('Location: Insert-Category.php');
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Danh Mục</title>
</head>
<body>
    <?php include("Header.php");?>
    <div class="container mt-4">
    <div class="row">
    <table class="table table-hover">
    <thead>
        <tr class="table-danger">
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">#</th>
            <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $STT=0;
            while($row=mysqli_fetch_array($result))
            {   
                $STT++;
                echo
                '
                <tr>
                <th scope="row">'.$STT.'</th>
                <td>'.$row['loai_ten'].'</td>
                <td><a href="Delete.php?IDLoai='.$row['loai_id'].'" type="button" class="btn btn-outline-danger">Xóa</a></td>
                <td><a href="Fix-Category.php?IDLoai='.$row['loai_id'].'" type="button" class="btn btn-outline-dark">Sửa</a></td>
                </tr>
                ';
            }
        ?>
    </tbody>
    </table>
    </div>
        <div class="row mt-4">
            <div class="alert alert-danger" role="alert">
                <h5>Sửa Danh Mục</h5>
            </div>
            <form action="" method="POST">
                <div class="input-group mb-5 mt-3">
                    <?php
                    $id=$_GET['IDLoai'];
                    $conn=mysqli_connect("localhost","root","","vegefoods");
                    $sql="SELECT * FROM loai WHERE loai_id=$id";
                    $result=mysqli_query($conn,$sql);
                    mysqli_close($conn);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo
                        '
                        <input type="text" class="form-control" placeholder="Bạn muốn sửa loại mặt hàng nào ?" aria-label="Bạn muốn sửa loại mặt hàng nào ?" aria-describedby="button-addon2" name="loai_ten" value="'.$row['loai_ten'].'">
                        ';
                    }
                    ?>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2" name="sua">Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
    <?php include("Footer.php");?>
</body>
</html>
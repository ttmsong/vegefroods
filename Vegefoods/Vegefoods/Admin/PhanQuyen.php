<?php
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM taikhoan";
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân Quyền</title>
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
            <th scope="col">Email</th>
            <th scope="col">Vai Trò</th>
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
                <td>'.$row['taikhoan_ten'].'</td>
                <td>'.$row['taikhoan_email'].'</td>
                <td>'.$row['taikhoan_chucvu'].'</td>
                <td><a href="Delete.php?PhanQuyen='.$row['taikhoan_id'].'" type="button" class="btn btn-outline-danger">Xóa</a></td>
                <td><a href="Fix-PhanQuyen.php?PhanQuyen='.$row['taikhoan_id'].'" type="button" class="btn btn-outline-dark">Sửa</a></td>
                </tr>
                ';
            }
        ?>
    </tbody>
    </table>
    </div>
    </div>
    <?php include("Footer.php");?>
</body>
</html>
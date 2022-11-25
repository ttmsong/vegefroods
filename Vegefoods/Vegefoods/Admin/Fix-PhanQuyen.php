<?php
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM taikhoan";
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['sua']))
    {
        $id=$_GET['PhanQuyen'];
        $ten=$_POST['ten'];
        $email=$_POST['email'];
        $chucvu=$_POST['chucvu'];
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql2="UPDATE taikhoan SET taikhoan_ten='$ten', taikhoan_email='$email', taikhoan_chucvu='$chucvu' WHERE taikhoan_id=$id";
        $result2=mysqli_query($conn,$sql2);
        mysqli_close($conn);
        header('Location: PhanQuyen.php');
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Phân Quyền</title>
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
        <div class="row mt-4">
            <div class="alert alert-danger" role="alert">
                <h5>Cập Nhật Phân Quyền</h5>
            </div>
            <form action="" method="POST">
                <div class=" mb-5 mt-3">
                    <?php
                    $id=$_GET['PhanQuyen'];
                    $conn=mysqli_connect("localhost","root","","vegefoods");
                    $sql="SELECT * FROM taikhoan WHERE taikhoan_id=$id";
                    $result=mysqli_query($conn,$sql);
                    mysqli_close($conn);
                    while($row=mysqli_fetch_array($result))
                    {
                        echo
                        '
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên Tài Khoản</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên Tài Khoản" name="ten" value="'.$row['taikhoan_ten'].'">
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Địa Chỉ Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Địa Chỉ Email" name="email" value="'.$row['taikhoan_email'].'">
                        </div>
                        <div class="input-group mt-4">
                        <select name="chucvu" required id="" class="form-control mt-2">
                            <option selected disabled>Cấp Quyền Cho Tài Khoản</option>
                            <option>User</option>
                            <option>Admin</option>
                        </select>
                        ';
                    }
                    ?>
                    <button class="btn btn-outline-success" type="submit" name="sua">Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
    <?php include("Footer.php");?>
</body>
</html>
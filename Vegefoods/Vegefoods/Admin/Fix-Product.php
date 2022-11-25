<?php
$id=$_GET['IDSP'];
$conn=mysqli_connect("localhost","root","","vegefoods");
$sql= "SELECT * FROM sanpham WHERE sanpham_id='$id'";
$result= mysqli_query($conn,$sql);

#
$conn=mysqli_connect("localhost","root","","vegefoods");
$sql2="SELECT * FROM loai";
$result2=mysqli_query($conn,$sql2);
mysqli_close($conn);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $folder_path = 'Uploaded/';
    $file_path = $folder_path.$_FILES['sanpham_hinhanh']['name'];
    #upload file ảnh qua folder mới
    move_uploaded_file($_FILES['sanpham_hinhanh']['tmp_name'], $file_path);

    $tensanpham=$_POST['sanpham_ten'];
    $hinhanh=$file_path;
    $mieuta=$_POST['sanpham_mieuta'];
    $giatien=$_POST['sanpham_gia'];
    $giamgia=$_POST['sanpham_giamgia'];
    $loai=$_POST['loaisanpham'];

    $id=$_GET['IDSP'];


    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql= "UPDATE sanpham SET sanpham_ten='$tensanpham', sanpham_hinhanh='$hinhanh', sanpham_mieuta='$mieuta',
    sanpham_gia='$giatien',sanpham_giamgia='$giamgia', sanpham_loai='$loai' WHERE sanpham_id = $id";

    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("Location: Home.php");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <title>Sửa Sản Phẩm</title>
</head>
<body>
    <?php include("Header.php");?>
    <div class="container mt-4">
        <form method="POST" enctype="multipart/form-data">
        <?php
        while($row=mysqli_fetch_array($result))
        {
            echo '
            <fieldset>
            <legend style="color: black;">Cập Nhật Sản Phẩm</legend>
            <div class="mb-3">
            <label for="disabledTextInput" class="form-label">TÊN</label>
                <input type="text" id="disabledTextInput" class="form-control" required placeholder="Hãy điền rõ tên sản phẩm vào đây!" name="sanpham_ten" value="'.$row['sanpham_ten'].'">

                <div class="row mt-2">
                    <div class="col-2"><img src='.$row['sanpham_hinhanh'].' style="width: 8rem;"></div>
                    <div class="col">
                    <label for="formFile" class="form-label mt-2">HÌNH ẢNH</label>
                    <input class="form-control" type="file" id="formFile" name="sanpham_hinhanh">
                    </div>
                </div>

                <label for="disabledTextInput" class="form-label mt-2">MIÊU TẢ</label>
                <div class="form-floating">
                    <textarea class="rounded" name="sanpham_mieuta"></textarea>
                    <script>
                            CKEDITOR.replace("sanpham_mieuta");
                    </script>
                </div>
                <label for="disabledTextInput" class="form-label mt-2">GIÁ TIỀN</label>
                <input type="text" id="disabledTextInput" class="form-control" required placeholder="Giá thành là nhiêu nhỉ ?" name="sanpham_gia" value="'.$row['sanpham_gia'].'">
                <label for="disabledTextInput" class="form-label mt-2">GIẢM GIÁ</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Bạn có giảm giá cho mặt hàng này không ?" name="sanpham_giamgia" value="'.$row['sanpham_giamgia'].'">
                </div>
                <div class="form-group pb-2">
                <label for="">LOẠI CỦA SẢN PHẨM</label>
                <select name="loaisanpham" required id="" class="form-control mt-2">
                    <option value="" required disabled selected>Vui lòng chọn</option>';
                    ?>
                    <?php

                        while($row2=mysqli_fetch_array($result2))
                        {
                            echo 
                            '<option value="'.$row2['loai_id'].'">'.$row2['loai_ten'].'</option>
                            ';
                        }
                    ?>
                    <?php echo
                '</select>
            </div>
                <div class="my-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" required>
                        <label class="form-check-label" for="disabledFieldsetCheck">
                        Vui lòng xác nhận!
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-outline-success" name="submit" value="Xác Nhận">
                </fieldset>
            ';
        }
        ?>
        </form>
    </div>
    <?php
    include("Footer.php");
    ?>
</body>
</html>
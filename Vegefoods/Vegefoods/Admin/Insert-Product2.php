<!-- Upload ảnh -->
<?php
$folder_path = 'Uploaded/';
$file_path = $folder_path.$_FILES['sanpham_hinhanh']['name'];
$flag_ok = true;
if(isset($_POST["submit"]))
{
    $check = getimagesize($_FILES['sanpham_hinhanh']['tmp_name']);
    if($check !== false)
    {
        echo "Tệp là một hình ảnh -".$check["mime"]. ".";
        $flag_ok= true;
    }
    else {
        echo "Tệp không phải là một hình ảnh ";
        $flag_ok = false;
    }
}
if(file_exists($file_path))
{
    echo "File đã tồn tại ";
    $flag_ok = false;
}

$ex = array('jpg', 'png', 'jpeg');
$file_type= strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
if(!in_array($file_type, $ex))
{
    echo "File có định dạng không hợp lệ ";
    $flag_ok = false;
}
if($_FILES['sanpham_hinhanh']['size']>5000000)
{
    echo "Dung lượng File quá lớn ";
    $flag_ok = false;
}
if($flag_ok)
{
    move_uploaded_file($_FILES['sanpham_hinhanh']['tmp_name'], $file_path);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $tensanpham=$_POST['sanpham_ten'];
        $hinhanh=$file_path;
        $mieuta=$_POST['sanpham_mieuta'];
        $giatien=$_POST['sanpham_gia'];
        $giamgia=$_POST['sanpham_giamgia'];
        $loai=$_POST['loaisanpham'];

        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql="INSERT INTO sanpham(sanpham_ten, sanpham_hinhanh, sanpham_mieuta, sanpham_gia, sanpham_giamgia, sanpham_loai) 
        VALUES ('$tensanpham', '$hinhanh', '$mieuta','$giatien', '$giamgia', '$loai')";
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location: Home.php");
    }
}
echo "Không Upload được!";
?>
<!-- Đăng kí -->
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$ho=$_POST["ho"];
	$ten=$_POST["ten"];
	$email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST['address'];
	$matkhau=$_POST["matkhau"];

	$conn=mysqli_connect("localhost","root","","vegefoods");
	$sql="INSERT INTO taikhoan(taikhoan_ho,taikhoan_ten,taikhoan_email,taikhoan_phone,taikhoan_matkhau,taikhoan_diachi) VALUES('$ho','$ten','$email','$phone','$matkhau','$address')";
	$result=mysqli_query($conn,$sql);


	$conn=mysqli_connect("localhost","root","","vegefoods");
	$sql= "SELECT * FROM taikhoan";
	$result= mysqli_query($conn,$sql);
	session_start();
	while($row=mysqli_fetch_array($result))
		{
			$_SESSION['taikhoan_id']=$row['taikhoan_id'];
			$_SESSION['taikhoan_ten']=$row['taikhoan_ten'];
		}

	mysqli_close($conn);
    header("Location: Home.php");
}
?>
<!-- Đăng kí -->
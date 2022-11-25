<?php
session_start();
if(isset($_SESSION['taikhoan_ten']))
{
	unset($_SESSION['taikhoan_ten']);
	unset($_SESSION['taikhoan_id']);
	#unset($_SESSION['GioHang']);
}
if(isset($_SESSION['Admin']))
{
	unset($_SESSION['Admin']);
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$email=$_POST["email"];
	$matkhau=$_POST["matkhau"];

	$conn=mysqli_connect("localhost","root","","vegefoods");
	$sql= "SELECT * FROM taikhoan WHERE taikhoan_email='$email' AND taikhoan_matkhau ='$matkhau'";
	$result= mysqli_query($conn,$sql);

	$countRow=0;
	if(isset($result))
	{
		$countRow=mysqli_num_rows($result);
	};
	if($countRow>0)
	{
		while($row=mysqli_fetch_array($result))
            {	
				$_SESSION['Admin']=$row['taikhoan_chucvu'];

				$_SESSION['taikhoan_id']=$row['taikhoan_id'];
				$_SESSION['taikhoan_ten']=$row['taikhoan_ten'];
			}
			$code='Admin';
			if($code==$_SESSION['Admin'])
			{
				header("Location: Admin/Home.php");
			}
			else {
				header("Location: Home.php");
			}
	}
	else echo '<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
	<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<img src="images/Ve_Err.jpg" class="rounded me-2" alt="" style="width: 40px;">
			<strong class="me-auto">Vegefoods</strong>
			<small>0 phút trước</small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			Oh no! Có gì đó không đúng!
		</div>
	</div>
</div>';
}
?>

<!DOCTYPE html>
<html lang="vn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/Login.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login</title>
	<style>
		.nnk-zz
		{
			min-width: 120px;
			margin-top: 10px;
		}
	</style>
</head>
<body class="bg-light">
	<section class="login pt-5 pb-0">
		<div class="container">
			<div class="row g-0">
				<div class="col-lg-5 text-center">
					<img src="images/logo_ve.jpg" class="img-fluid" alt="">
				</div>
				<div class="col-lg-7 text-center py-5">
					<h1>WELCOME</h1>
					<form action="LogIn.php" method="POST">
						<div class="form-row py-3 pt-5">
							<div class="offset-1 col-lg-10"></div>
							<input type="text" name="email" class="inp px-3" required placeholder="Vui lòng nhập tài khoản !">
						</div>
						<div class="form-row py-3">
							<div class="offset-1 col-lg-10"></div>
							<input type="password" name="matkhau" class="inp px-3" required placeholder="Vui lòng nhập mật khẩu !">
						</div>
						<div class="form-row py-1">
							<div class="offset-1 col-lg-10"></div>
							<button class="btn1 mx-2 nnk-zz" id="liveToastBtn">Đăng Nhập</button>
							<button class="btn2 mx-2 nnk-zz" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Đăng Kí</button>
						</div>
					</form>
					<p class="my-3">Hoặc Đăng Nhập Với</p>
					<span><a href="#" style="color:black"><i class="fab fa-facebook px-2" style="font-size: 150%;"></i></a></span>
					<span><a href="#" style="color:black"><i class="fab fa-google-plus px-2" style="font-size: 150%;"></i></a></span>
					<p class="mt-2"><a href="#" style="color:black">Quên mật khẩu?</a></p>
				</div>
			</div>
		</div>
	</section>
	<section class="footer">
		<footer class="text-center text-white">
			<div class="container pt-2">
			  <section class="mb-2">
				<a
				  class="btn btn-link btn-floating btn-lg text-dark m-1"
				  href="#"
				  role="button"
				  data-mdb-ripple-color="dark"
				  ><i class="fab fa-facebook-f"></i
				></a>
				<a
				  class="btn btn-link btn-floating btn-lg text-dark m-1"
				  href="#"
				  role="button"
				  data-mdb-ripple-color="dark"
				  ><i class="fab fa-twitter"></i
				></a>
				<a
				  class="btn btn-link btn-floating btn-lg text-dark m-1"
				  href="#"
				  role="button"
				  data-mdb-ripple-color="dark"
				  ><i class="fab fa-google"></i
				></a>
				<a
				  class="btn btn-link btn-floating btn-lg text-dark m-1"
				  href="#"
				  role="button"
				  data-mdb-ripple-color="dark"
				  ><i class="fab fa-instagram"></i
				></a>
				<a
				  class="btn btn-link btn-floating btn-lg text-dark m-1"
				  href="#"
				  role="button"
				  data-mdb-ripple-color="dark"
				  ><i class="fab fa-linkedin"></i
				></a>
				<a
				  class="btn btn-link btn-floating btn-lg text-dark m-1"
				  href="#"
				  role="button"
				  data-mdb-ripple-color="dark"
				  ><i class="fab fa-github"></i
				></a>
			  </section>
			</div>
			<div class="text-center text-dark p-3" style="background-color: #f1f1f1;">
			  © Website của:
			  <a class="text-dark" href="https://www.facebook.com/truongsong.100103">Song</a>
			</div>
		  </footer>
	</section>

	<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Đăng ký</h5>
        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col">
					<form action="Register.php" method="POST" name=form-action>
						<div class="row">
							<div class="col">
								<label for="">Họ</label>
								<input class="form-control" type="text" name="ho" required placeholder="Vui lòng điền họ của bạn !">
							</div>
							<div class="col">
								<label for="">Tên</label>
								<input class="form-control" type="text" name="ten" required placeholder="Vui lòng điền tên của bạn !">
							</div>
						</div>
						<div class="form-group pt-3">
							<label for="">Thông Tin Liên Hệ</label>
							<input class="form-control mb-2" type="email" name="email" required placeholder="Email của bạn !">
							<input class="form-control mt-2" type="text" name="phone" required placeholder="Số điện thoại của bạn !">
						</div>
						<div class="form-group pt-3">
							<label for="">Địa Chỉ</label>
							<input class="form-control" type="text" name="address" required placeholder="Địa chỉ của bạn là gì ?">
						</div>
						<div class="form-group pt-3">
							<label for="">Mật Khẩu</label>
							<input class="form-control" type="password" name="matkhau" required placeholder="Mật Khẩu Mới !">
						</div>
						<div class="form-group pt-3">
							<input type="checkbox" name="" required>
							<label for="">Tôi đồng ý với các điều khoản!</label>
						</div>
						<div class="form-group pt-3" style="float: right">
							<button class="btn btn-success" type="submit">Gửi</button>
						</div>
					</form>
				</div>
      </div>
      <div class="modal-footer px-1">
        <p>Bằng cách nhấp vào Đăng ký, bạn đồng ý với Điều khoản, Chính sách dữ liệu và Chính sách cookie của chúng tôi.</p>
      </div>
    </div>
</div>
  <!-- end -->

  <!-- trả về nếu không xác định acc, password -->
  	
	<!-- Thông Báo -->
    <script>
        var toastTrigger = document.getElementById('liveToastBtn')
        var toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
            toastTrigger.addEventListener('click', function () {
                var toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            })
        }
    </script>
    <!-- Thông Báo -->
<!-- trả về nếu không xác định acc, password -->
</body>
</html>
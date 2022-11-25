<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Vegefoods - Checkout</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="goto-here">
	<!-- nav -->
	<?php
	include('Header.php');
	?>
	<!-- END nav -->

	<!-- Xử lí -->
	<?php
	if (isset($_SESSION['taikhoan_id'])) {
		$taikhoan_id = $_SESSION['taikhoan_id'];
		$conn = mysqli_connect("localhost", "root", "", "vegefoods");
		$sql = "SELECT * FROM taikhoan WHERE taikhoan_id='$taikhoan_id'";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result)) {
			$ho = $row['taikhoan_ho'];
			$ten = $row['taikhoan_ten'];
			$diachi = $row['taikhoan_diachi'];
			$sdt = $row['taikhoan_phone'];
			$email = $row['taikhoan_email'];
			$matkhau = $row['taikhoan_matkhau'];

			#Session SĐT
			$_SESSION['SDT'] = $sdt;

			#Riêng
			$_SESSION['taikhoan_diachi'] = $row['taikhoan_diachi'];
		}
	} else {
		$ho = "";
		$ten = "";
		$diachi = "";
		$sdt = "";
		$email = "";
		$matkhau = "";
	}
	?>

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="Home.php">Home</a></span> <span>Checkout</span></p>
					<h1 class="mb-0 bread">Checkout</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-7 ftco-animate">
					<form action="Register.php" method="POST" class="billing-form">
						<h3 class="mb-4 billing-heading">Chi Tiết Thanh Toán</h3>
						<div class="row align-items-end">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstname">Họ</label>
									<input type="text" required name="ho" class="form-control" placeholder="" value="<?php echo $ho; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastname">Tên</label>
									<input type="text" required name="ten" class="form-control" placeholder="" value="<?php echo $ten; ?>">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="country">Quốc Gia</label>
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select required name="" id="" class="form-control">
											<option value="">Việt Nam</option>
										</select>
									</div>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col">
								<div class="form-group">
									<label for="streetaddress">Địa Chỉ</label>
									<input type="text" required name="address" class="form-control" placeholder="" value="<?php echo $diachi; ?>">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col">
								<div class="form-group">
									<label for="phone">Số Điện Thoại</label>
									<input type="text" required name="phone" class="form-control" placeholder="" value="<?php echo $sdt; ?>">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" required name="email" class="form-control" placeholder="" value="<?php echo $email; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress">Mật Khẩu</label>
									<input type="password" required  name="matkhau" class="form-control" placeholder="" value="<?php echo $matkhau; ?>">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group mt-4">
									<?php
									if (!isset($taikhoan_id)) {
										echo
										'<div class="radio">
										  <label class="mr-3"><input type="submit" name="optradio" value="Tạo một tài khoản?"></label>
										</div>';
									} else {
										echo
										'<div class="radio">
											<label class="mr-3"><input type="radio" name="optradio"> Đây là thông tin của bạn! </a></label>
										  </div>';
									}
									?>
								</div>
							</div>
						</div>
					</form><!-- END -->
				</div>
				<div class="col-xl-5">
					<div class="row mt-5 pt-3">
						<div class="col-md-12 d-flex mb-5">
							<div class="cart-detail cart-total p-3 p-md-4">
								<h3 class="billing-heading mb-4">Tổng Giỏ Hàng</h3>
								<p class="d-flex">
									<span>Tổng phụ</span>
									<span>
										<?php
										if (empty($_SESSION['GioHang'])) {
											echo 0;
										} else {
											echo number_format($_SESSION['tong']);
										}
										?>$
									</span>
								</p>
								<p class="d-flex">
									<span>Phí vận chuyển</span>
									<span>
										<?php
										if (empty($_SESSION['GioHang'])) {
											echo 0;
										} else {
											echo 5;
										}
										?>$
									</span>
								</p>
								<p class="d-flex">
									<span>Chiết khấu</span>
									<span>
										<?php
										if (empty($_SESSION['GioHang'])) {
											echo 0;
										} else {
											echo $_SESSION['ChietKhau'];
										} ?>$
									</span>
								</p>
								<hr>
								<p class="d-flex total-price">
									<span>THÀNH TIỀN</span>
									<span>
										<?php
										if (empty($_SESSION['GioHang'])) {
											echo 0;
										} else {
											echo $_SESSION['ThanhToan'];
										} ?>$
									</span>
								</p>
							</div>
						</div>
						<div class="col-md-12">
							<form action="Save-Order.php" method="POST">
								<div class="cart-detail p-3 p-md-4">
									<h3 class="billing-heading mb-4">Phương Thức Thanh Toán</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
												<label><input type="radio" name="optradio" class="mr-2"> Thanh Toán Khi Nhận Hàng</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
												<label><input type="radio" name="optradio" class="mr-2"> Thanh Toán Bằng Thẻ Ngân Hàng</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
												<label><input type="radio" name="optradio" class="mr-2"> Thanh Toán Với Ví Vegefoods</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
												<label><input type="checkbox" value="" class="mr-2" required> Tôi đã đọc và chấp nhận các điều khoản và điều kiện</label>
											</div>
										</div>
									</div>
									<p><input class="btn btn-primary py-3 px-4" onclick="myFunction()" type="submit" value="Đặt hàng" name="save-order"></p>
								</div>
							</form>
						</div>
					</div>
				</div> <!-- .col-md-8 -->
			</div>
		</div>
	</section> <!-- .section -->

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
			<?php include("Subcribe-Newsletter.html"); ?>
		</div>
	</section>
	<?php include("Footer.html"); ?>




	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

	<script>
		$(document).ready(function() {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function(e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function(e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>
	<?php

	if (isset($_SESSION['taikhoan_id']) && isset($_SESSION['GioHang'])) {
		echo "
	<script>
	function myFunction() {
	alert('Chúng tôi đã nhận được đơn hàng của bạn!');
	}
	</script>";
	}
	?>
</body>

</html>
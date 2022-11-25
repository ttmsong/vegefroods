<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Vegefoods - Product</title>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>

<body class="goto-here">
	<?php
	include('Header.php');
	?>

	<?php
	if (empty($_GET['MaSanPham'])) {
		header("Location: Shop.php");
	} else {
		$MaSanPham = $_GET['MaSanPham'];
		#Save-Order
		$_SESSION['MaSanPham'] = $_GET['MaSanPham'];

		$conn = mysqli_connect("localhost", "root", "", "vegefoods");
		$sql = "SELECT * FROM sanpham WHERE sanpham_id = $MaSanPham";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
	}
	?>

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="Home.php">Home</a></span> <span class="mr-2"><a href="Home.php">Product</a></span> <span>Product Single</span></p>
					<h1 class="mb-0 bread">Product Single</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<form action="Cart2.php" method="POST">
			<div class="container">
				<div class="row">
					<?php
					while ($row = mysqli_fetch_array($result)) {
						$row['sanpham_gia'] = $row['sanpham_gia'] - ($row['sanpham_gia'] * $row['sanpham_giamgia'] / 100);

						echo
						'<div class="col-lg-6 mb-5 ftco-animate">
						<a href="Admin/' . $row['sanpham_hinhanh'] . '" class="image-popup"><img src="images/' . $row['sanpham_hinhanh'] . '" class="img-fluid" alt=""><input type="hidden" name="sanpham_hinhanh" value="'.$row['sanpham_hinhanh'] . '"></a>
						</div>';

						echo '
						<div class="col-lg-6 product-details pl-md-5 ftco-animate">
						<h3>' . $row['sanpham_ten'] . '<input type="hidden" name="sanpham_ten" value="' . $row['sanpham_ten'] . '"></h3>
						<div class="rating d-flex">
								<p class="text-left mr-4">
									<a href="#" class="mr-2">5.0</a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
								</p>
								<p class="text-left mr-4">
									<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Đánh giá</span></a>
								</p>
								<p class="text-left">
									<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Đã bán</span></a>
								</p>
							</div>
						<p class="price"><span>' . $row['sanpham_gia'] . '$ <input type="hidden" name="sanpham_gia" value="' . $row['sanpham_gia'] . '"></span></p>
						<p>' . $row['sanpham_mieuta'] . '</p>
						';
					}
					?>


					<div class="row mt-4">
						<div class="col-md-6">
							<div class="form-group d-flex">
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="" id="" class="form-control">
										<option value="">Nhỏ</option>
										<option value="">Trung Bình</option>
										<option value="">Lớn</option>
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
							<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
									<i class="ion-ios-remove"></i>
								</button>
							</span>
							<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
							<span class="input-group-btn ml-2">
								<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
									<i class="ion-ios-add"></i>
								</button>
							</span>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<p style="color: #000;">Giá trị thực phẩm tính dựa trên 1KG hoặc 100ML</p>
						</div>
					</div>
					<p><input class="btn btn-black py-3 px-5" name="AddCart" type="submit" value="Đặt hàng"></p>
				</div>
			</div>
			</div>
		</form>
		<?php
		include("Comments.php");
		?>
	</section>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Các sản phẩm</span>
					<h2 class="mb-4">Những sảm phẩm tương tự</h2>
					<p>Xa xa, sau những ngọn núi đó, là những trang trại màu mỡ cung cấp thực phẩm tốt cho mọi người !</p>
				</div>
			</div>
		</div>
		<?php
		include("small_nnk/all_products.php");
		?>
	</section>

	<?php
	include("Subcribe-Newsletter.html");
	include("Footer.html");
	?>



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

</body>

</html>
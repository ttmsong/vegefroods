<!DOCTYPE html>
<html lang="vi">
  <head>
    <title>Vegefoods - Cart</title>
  </head>
  <body class="goto-here">
	<!-- nav -->
	<?php
    include('Header.php');
    ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="Home.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Tên Sản Phẩm</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Thành Tiền</th>
						      </tr>
						    </thead>
						    <tbody>
							
								<form action="" method="POST">
									<?php
									//  $_SESSION['GioHang'][$i][0]
										if(isset($_SESSION['GioHang']) && (is_array($_SESSION['GioHang'])))
										{
											for($i=0; $i < sizeof($_SESSION['GioHang']); $i++)
											{
												$img = $_SESSION['GioHang'][$i][0];
												echo '
												<tr class="text-center">

													<td class="product-remove"><a href="Cart2.php?XoaSanPham='.$i.'"><span class="ion-ios-close"></span></a></td>
													
											
													<td class="image-prod"><div class="img" style="background-image:url(images/'.$img.');"></div></td>
													
													<td class="product-name">
														<h3>'.$_SESSION['GioHang'][$i][1].'</h3>
														<p>Thật tuyệt vời !</p>
													</td>
													
													<td class="price">'.$_SESSION['GioHang'][$i][2].' </td>
													
													<td class="quantity" style="color:black;">'.$_SESSION['GioHang'][$i][3].'</td>
													
													<td class="total">'.$_SESSION['GioHang'][$i][4].'</td>
												</tr>
												';
											}
										}
										else {
											echo '
											<div class="alert alert-success d-flex justify-content-center" role="alert">
												Hãy thử mua một đơn hàng !
											</div>
											';
										}
									?>
								</form>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Xóa tất cả</h3>
    					<p>Bạn có muốn xóa tất cả đơn hàng ?</p>
    				</div>
    				<p><a href="Cart2.php?Xoa=XoaTatCa" class="btn btn-primary py-3 px-4">Xóa Tất Cả</a></p>
    			</div>
				<?php
				if(isset($_SESSION['taikhoan_id']))
				{
					$taikhoan_id=$_SESSION['taikhoan_id'];
					$conn=mysqli_connect("localhost","root","","vegefoods");
					$sql= "SELECT * FROM taikhoan WHERE taikhoan_id='$taikhoan_id'";
					$result= mysqli_query($conn,$sql);
					while($row=mysqli_fetch_array($result))
					{
						$ho=$row['taikhoan_ho'];
						$ten=$row['taikhoan_ten'];
						$diachi=$row['taikhoan_diachi'];
						$email=$row['taikhoan_email'];
					}
				}
				else
				{
					$ho="";
					$ten="";
					$diachi="";
					$email="";
				}
				?>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Thông tin tài khoản của bạn</h3>
    					<p>Chúng tôi sẽ vận chuyển kiện hàng của bạn đến địa chỉ này !</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Họ và Tên</label>
	                <input type="text" class="form-control text-left px-3" placeholder="" value="<?php echo $ho .' '.$ten; ?>">
	              </div>
	              <div class="form-group">
	              	<label for="country">Email</label>
	                <input type="text" class="form-control text-left px-3" placeholder="" value="<?php echo $email; ?>">
	              </div>
	              <div class="form-group">
	              	<label for="country">Địa Chỉ</label>
	                <input type="text" class="form-control text-left px-3" placeholder="" value="<?php echo $diachi; ?>">
	              </div>
	            </form>
    				</div>
    				
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng phụ</h3>
    					<p class="d-flex">
    						<span>Tổng</span>
    						<span>
								<?php 
								if(empty($_SESSION['GioHang']))
								{
									echo 0;
								}
								else
								{echo number_format($_SESSION['tong']);}
								?>$
							</span>
    					</p>
    					<p class="d-flex">
    						<span>Phí vận chuyển</span>
    						<span>
								<?php 
								if(empty($_SESSION['GioHang']))
								{
									echo 0;
								}
								else
								{echo 5;}
								?>$</span>
    					</p>
    					<p class="d-flex">
    						<span>Chiết khấu</span>
    						<span><?php
							if(empty($_SESSION['GioHang']))
							{
								echo 0;
							}
							else
							{ echo $_SESSION['ChietKhau'];} ?>$</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Thành tiền</span>
    						<span><?php
							if(empty($_SESSION['GioHang']))
							{
								echo 0;
							}
							else
							{ echo $_SESSION['ThanhToan'];}?>$</span>
    					</p>
    				</div>
    				<p><a href="Checkout.php" class="btn btn-primary py-3 px-4">Kiểm Tra</a></p>
    			</div>
    		</div>
			</div>
		</section>


		<?php
		include("Subcribe-Newsletter.html");
		include("Footer.html");
		?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>
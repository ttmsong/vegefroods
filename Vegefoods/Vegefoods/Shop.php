<?php
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="SELECT * FROM loai";
    $result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="vi">
  <head>
    <title>Vegefoods - Shop</title>
  </head>
  <body class="goto-here">
	  <?php
	  include("Header.php");
	  ?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="Home.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
						<?php
						if(isset($_SESSION['loai_id']))
						{
							echo '<li><a href="Shop.php">Tất cả</a></li>';
							unset($_SESSION['loai_id']);
						}
						else
						{
							echo '<li><a href="Shop.php" class="active">Tất cả</a></li>';
						}
						while($row=mysqli_fetch_array($result))
						{
							if(empty($_GET['LoaiSanPham']))
							{
								echo '<li><a href="Shop.php?LoaiSanPham='.$row['loai_id'].'">'.$row['loai_ten'].'</a></li>';
							}
							else
							{
								if($_GET['LoaiSanPham']!==$row['loai_id'])
								{
									echo '<li><a href="Shop.php?LoaiSanPham='.$row['loai_id'].'">'.$row['loai_ten'].'</a></li>';
								}
								else
								{
									echo '<li><a href="Shop.php?LoaiSanPham='.$row['loai_id'].'" class="active">'.$row['loai_ten'].'</a></li>';
								}
							}
						}
						?>
    				</ul>
    			</div>
    		</div>

			<!-- Hiển thị sản phẩm -->
			<?php
				include("small_nnk/all_products.php");
			?>
      
      <!-- Phân trang -->
      <?php
      $conn=mysqli_connect("localhost","root","","vegefoods");
      $sql2="SELECT * FROM sanpham ORDER BY sanpham_id ASC LIMIT 8 OFFSET 0";
      $result2=mysqli_query($conn,$sql2);
      ?>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <?php
                if(empty($_GET['LoaiSanPham']))
                {
                  if($current_page>3)
                  {
                    $first_page=1;
                    echo '<li><a href="?per_page='.$item_per_page.'&page='.$first_page.'">'."&lt;".'</a></li>';
                  }
  
                  for($i=1; $i <=$totalPages; $i++)
                  {
                    if($i != $current_page)
                    {
                      if($i > $current_page-3 && $i < $current_page+3)
                      {
                      echo '<li><a href="?per_page='.$item_per_page.'&page='.$i.'">'.$i.'</a></li>';
                      }
                    }
                    else {
                      echo '<li class="active"><span>'.$i.'</span></li>';
                    }
                  }
  
                  if($current_page< $totalPages-3)
                  {
                    $end_page=$totalPages;
                    echo '<li><a href="?per_page='.$item_per_page.'&page='.$end_page.'">'."&gt;".'</a></li>';
                  }
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      <!-- Phân trang -->
    	</div>
    </section>

	<?php
  include("Search.php");
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
    
  </body>
</html>
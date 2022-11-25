<!DOCTYPE html>
<html lang="vi">
  <head>
    <title>Vegefoods - Home</title>
  </head>
  <body class="goto-here">
    <!-- nav -->
    <?php
    include('Header.php');
    ?>
    <!-- END nav -->

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">Là nguồn cung cấp thực phẩm hàng đầu</h1>
	              <h2 class="subheading mb-4">Chúng tôi cung cấp rau &amp; trái cây hữu cơ</h2>
	              <p><a href="#Products" class="btn btn-primary">Xem Chi Tiết</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Thực phẩm tươi &amp; hữu cơ</h1>
	              <h2 class="subheading mb-4">Chúng tôi cung cấp rau &amp; trái cây hữu cơ</h2>
	              <p><a href="#Products" class="btn btn-primary">Xem Chi Tiết</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <?php
	include("Intro.html");
	?>
<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
                            <div class="text text-center">
                                <h2>Vegetables</h2>
                                <p>Bảo vệ sức khỏe mọi nhà</p>
                                <p><a href="Shop.php" class="btn btn-primary">Shop now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-1.jpg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="Home.php?LoaiSanPham=1#SanPhamCuaKhanh">Hoa quả</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-2.jpg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="Home.php?LoaiSanPham=2#SanPhamCuaKhanh">Rau củ</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-3.jpg);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="Home.php?LoaiSanPham=3#SanPhamCuaKhanh">Nước trái cây</a></h2>
                    </div>		
                </div>
                <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-4.jpg);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="Home.php?LoaiSanPham=4#SanPhamCuaKhanh">Các loại đậu</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
	<!-- Sản phẩm -->
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Sản Phẩm Nổi Bật</span>
					<h2 class="mb-4">Của Chúng Tôi</h2>
					<p>Xa xa, sau những ngọn núi đó, là những trang trại màu mỡ cung cấp thực phẩm tốt cho mọi người !</p>
				</div>
			</div>   		
		</div>
	<?php
		include("small_nnk/all_products.php");
	?>
	</section>
	<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
    	<div class="container">
				<div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          	<span class="subheading">Giá tốt nhất cho bạn</span>
            <h2 class="mb-4">Ưu đãi trong ngày</h2>
            <p>Xa xa, sau những ngọn núi đó, là những trang trại màu mỡ cung cấp thực phẩm tốt cho mọi người</p>
            <h3><a href="#">Xà Lách</a></h3>
            <span class="price">9$ <a href="#">bây giờ chỉ còn 7$</a></span>
            <div id="timer" class="d-flex mt-5">
						  <!-- <div class="time" id="days"></div>  -->
						  <div class="time pl-3" id="hours"></div>
						  <div class="time pl-3" id="minutes"></div>
						  <div class="time pl-3" id="seconds"></div>
			</div>
          </div>
        </div>   		
    	</div>
    </section>


    <?php
	include("Footer.html");
	?>
   <div class="container">
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "108645221638906");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
   </div> 
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
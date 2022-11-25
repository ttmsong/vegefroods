<?php
	$conn=mysqli_connect("localhost","root","","vegefoods");

	#Hiển thị loại thực phẩm | Shop
	if(isset($_GET['LoaiSanPham']))
	{

		#Lấy ID Loại sản phẩm
		$loai_id = $_GET['LoaiSanPham'];
		$sql="SELECT * FROM sanpham WHERE sanpham_loai=$loai_id";
		
		#Gán để tạo chuyển động loại sản phẩm
		$_SESSION['loai_id']=$loai_id;
		$result=mysqli_query($conn,$sql);
		
	}
    else
	{
		$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;;
		$current_page = !empty($_GET['page'])?$_GET['page']:1;
		$offset = ($current_page - 1) * $item_per_page;
		$sql="SELECT * FROM sanpham ORDER BY sanpham_id ASC LIMIT $item_per_page OFFSET $offset";
		$result=mysqli_query($conn,$sql);


		#Tính số trang
		$totalRecords = mysqli_query($conn,"SELECT * FROM sanpham");
		$totalRecords = $totalRecords -> num_rows;
		$totalPages = ceil($totalRecords/$item_per_page);


	}

	#Hiển thị các sản phẩm cùng loại | Product-Single
	if(isset($_GET['MaSanPham']))
	{
		$MaSanPham = $_GET['MaSanPham'];
		$sql="SELECT * FROM sanpham WHERE sanpham_id=$MaSanPham";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
			$loai_id = $row['sanpham_loai'];
		}
		$sql="SELECT * FROM sanpham WHERE sanpham_loai=$loai_id";
		$result=mysqli_query($conn,$sql);
	}

	#Tìm kiếm bằng nhập từ khóa
	if(isset($_GET['Search']))
	{
		$ten_timkiem=$_GET['Search'];
		$sql="SELECT * FROM sanpham WHERE sanpham_ten LIKE '%$ten_timkiem%'";
		$result= mysqli_query($conn,$sql);
	}
	mysqli_close($conn);
?>

<div class="container" id="SanPhamCuaKhanh">
    <div class="row" id="Products">
                <?php
                while($row=mysqli_fetch_array($result))
                {
                    echo '
                    <div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="Product-Single.php?MaSanPham='.$row['sanpham_id'].'" class="img-prod"><img class="img-fluid" src="images/'.$row['sanpham_hinhanh'].'" alt="'.$row['sanpham_ten'].'">
						';
						if(empty($row['sanpham_giamgia']))
						{
							
						}
						else
						{
							$_SESSION['sanpham_gia_dagiam']=$row['sanpham_gia']-($row['sanpham_gia']*$row['sanpham_giamgia']/100);
							echo '<span class="status">'.$row['sanpham_giamgia'].'%</span>';
						}
							
							echo '
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">'.$row['sanpham_ten'].'</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
									';
									if(empty($row['sanpham_giamgia']))
									{
										echo '<p class="price"><span class="mr-2 ">'.$row['sanpham_gia'].'$</span>';
									}
									else
									{
										echo '<p class="price"><span class="mr-2 price-dc">'.$row['sanpham_gia'].'$</span><span class="price-sale">'.$_SESSION['sanpham_gia_dagiam'].'$</span>';
									}
										
										echo '
									</p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="?" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="Cart2.php?AddCart=add&id='.$row['sanpham_id'].'" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
                    '
                    ;
                }

                ?>
    		</div>
</div>


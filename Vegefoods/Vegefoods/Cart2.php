<?php
	#Giỏ hàng trống
	session_start();
	if(empty($_SESSION['GioHang']))
	{
		$_SESSION['GioHang']=[];
	}

	#Xóa một đơn hàng
	if(isset($_GET['XoaSanPham']) && ($_GET['XoaSanPham']>=0))
	{
		# Mảng nào, vị trí thứ ..., xóa bao nhiêu phần tử?
		array_splice($_SESSION['GioHang'], $_GET['XoaSanPham'], 1);
	}
	#Xóa toàn bộ giỏ hàng
	if(isset($_GET['Xoa']) && ($_GET['Xoa']=='XoaTatCa'))
	{
		unset($_SESSION['GioHang']);
		$_SESSION['count']=0;
	}

	#Lấy dữ liệu từ form lưu vào session
	if(isset($_POST['AddCart']) && ($_POST['AddCart']))
	{
		$sanpham_hinhanh = $_POST['sanpham_hinhanh'];
		$sanpham_ten = $_POST['sanpham_ten'];
		$sanpham_gia = $_POST['sanpham_gia'];
		$sanpham_soluong = $_POST['quantity'];
		$sanpham_thanhtien = ($sanpham_gia * $sanpham_soluong);
		$thongke_sanpham_id=$_SESSION['MaSanPham'];
		
		#kiểm tra sản phẩm đã có trong giỏ hàng hay không
		$request = "false";
		for($i=0; $i< sizeof($_SESSION['GioHang']); $i++)
		{
			if($_SESSION['GioHang'][$i][1]==$sanpham_ten)
			{
				$request = "true";
				#cập nhật số lượng
				$_SESSION['GioHang'][$i][3]+=$sanpham_soluong;
				#cập nhật tiền cho 1 sản phẩm
				$_SESSION['GioHang'][$i][4]=$_SESSION['GioHang'][$i][2] * $_SESSION['GioHang'][$i][3];
				break;
			}
		}
		if($request == "false")
		{
			#thêm mới sản phẩm vào giỏ hàng
			$sanpham = [$sanpham_hinhanh, $sanpham_ten, $sanpham_gia, $sanpham_soluong, $sanpham_thanhtien, $thongke_sanpham_id];
			$_SESSION['GioHang'][] = $sanpham;
			#var_dump($_SESSION['GioHang']);
		}
	}elseif(isset($_GET['AddCart'])){
		$id = $_GET['id'];
		$conn=mysqli_connect("localhost","root","","vegefoods");
		$sql="SELECT * FROM sanpham WHERE sanpham_id = $id";
		$result=mysqli_query($conn,$sql)->fetch_assoc();
		$sanpham_soluong = 1;
		$sanpham_hinhanh = $result['sanpham_hinhanh'];
		$sanpham_ten = $result['sanpham_ten'];
		$sanpham_gia = $result['sanpham_gia'];
		$sanpham_thanhtien = ($sanpham_gia * $sanpham_soluong);
		$thongke_sanpham_id=$_SESSION['MaSanPham'];
		
		#kiểm tra sản phẩm đã có trong giỏ hàng hay không
		$request = "false";
		for($i=0; $i< sizeof($_SESSION['GioHang']); $i++)
		{
			if($_SESSION['GioHang'][$i][1]==$sanpham_ten)
			{
				$request = "true";
				#cập nhật số lượng
				$_SESSION['GioHang'][$i][3]+=$sanpham_soluong;
				#cập nhật tiền cho 1 sản phẩm
				$_SESSION['GioHang'][$i][4]=$_SESSION['GioHang'][$i][2] * $_SESSION['GioHang'][$i][3];
				break;
			}
		}
		if($request == "false")
		{
			#thêm mới sản phẩm vào giỏ hàng
			$sanpham = [$sanpham_hinhanh, $sanpham_ten, $sanpham_gia, $sanpham_soluong, $sanpham_thanhtien, $thongke_sanpham_id];
			$_SESSION['GioHang'][] = $sanpham;
			#var_dump($_SESSION['GioHang']);
		}
			
	}
	 header("Location: Cart.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
			<table class="table">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Số lượng</th>
					<th>Thành Tiền</th>
					<th>ID Sản Phẩm</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$_SESSION['tong'] = 0;
					$_SESSION['ChietKhau'] = 0;
					$_SESSION['ThanhToan'] = 0;
					if(isset($_SESSION['GioHang']) && (is_array($_SESSION['GioHang'])))
					{
						for($i=0; $i < sizeof($_SESSION['GioHang']); $i++)
						{
							#tong: sản phẩm x số lượng của nó
							$tong= $_SESSION['GioHang'][$i][2] * $_SESSION['GioHang'][$i][3];
							$_SESSION['count'] = $i+1;
							echo '
							<tr>
								<th scope="row">x</th>
								<td>'.$_SESSION['GioHang'][$i][0].'</td>
								<td>'.$_SESSION['GioHang'][$i][1].'</td>
								<td>'.$_SESSION['GioHang'][$i][2].'</td>
								<td>'.$_SESSION['GioHang'][$i][3].'</td>
								<td>'.$_SESSION['GioHang'][$i][4].'</td>
								<td>'.$_SESSION['GioHang'][$i][5].'</td>
							</tr>
							';

							#Tính tổng tiền nhưng chưa trừ phí giao hàng, chiết khấu
							$_SESSION['tong'] += $tong;

							#Chiết khấu lấy mỗi sản phẩm +=1$
							$_SESSION['ChietKhau']+=1;
						}
					}
					#Thanh toán tất cả
					$_SESSION['ThanhToan'] = ($_SESSION['tong']+5+$_SESSION['ChietKhau']);
								
				?>
			</tbody>
			</table>
		</div>
	</div>
</body>
</html>
<?php
session_start();
if($_POST['save-order'])
{
    if(isset($_SESSION['taikhoan_id']))
    {
        if(isset($_SESSION['GioHang']))
        {
            $thongke_taikhoan_id=$_SESSION['taikhoan_id'];
            $thongke_taikhoan_ten=$_SESSION['taikhoan_ten'];
            $thongke_taikhoan_diachi=$_SESSION['taikhoan_diachi'];
            $thongke_taikhoan_phone=$_SESSION['SDT'];

            $thoigian=date('d-m-Y');
            
            #Chuỗi mã hóa ngẫu nhiên có bảo mật
            $MaHoa = bin2hex(random_bytes(5));
    
            for($i=0; $i< sizeof($_SESSION['GioHang']); $i++)
            {
                $sanpham_hinhanh=$_SESSION['GioHang'][$i][0];
                $sanpham_ten=$_SESSION['GioHang'][$i][1];
                $sanpham_gia=$_SESSION['GioHang'][$i][2];
                $sanpham_soluong=$_SESSION['GioHang'][$i][3];
                $sanpham_thanhtien=$_SESSION['GioHang'][$i][4];
                $thongke_sanpham_id=$_SESSION['GioHang'][$i][5];

                $conn=mysqli_connect("localhost","root","","vegefoods");
                $sql="INSERT INTO thongke(thongke_taikhoan_id,thongke_taikhoan_ten,thongke_taikhoan_diachi, thongke_taikhoan_phone,	thongke_sanpham_id,thongke_sanpham_ten,	thongke_sanpham_gia,thongke_sanpham_soluong,thongke_sanpham_thanhtien,thongke_thoigian,thongke_id_cart,thongke_xuli)
                VALUES('$thongke_taikhoan_id','$thongke_taikhoan_ten','$thongke_taikhoan_diachi','$thongke_taikhoan_phone','$thongke_sanpham_id','$sanpham_ten','$sanpham_gia','$sanpham_soluong','$sanpham_thanhtien','$thoigian','$MaHoa','No')";
                $result=mysqli_query($conn,$sql);
            }
            mysqli_close($conn);
            unset($_SESSION['GioHang']);
            header("Location: About.php");
        }
        else
        {
            header("Location: Shop.php");
        }
    }
    else
    {
        header("Location: Login.php");
    }
}
?>
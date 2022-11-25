<?php
    #Xóa sản phẩm trong gian hàng
    if(isset($_GET['IDSP_DELETE']))
    {
        $ID=$_GET['IDSP_DELETE'];
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql= "DELETE FROM sanpham WHERE sanpham_id=$ID";
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location: Home.php");
    }

    #Xóa đơn đặt hàng trong thống kê
    if(isset($_GET['IDThongKe']))
    {
        $ID=$_GET['IDThongKe'];
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql= "DELETE FROM thongke WHERE thongke_id=$ID";
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location: List-Chart.php");
    }
    #Xóa tất cả đơn đặt hàng trong thống kê
    if(isset($_GET['Xoa_All_TK']))
    {
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql= "DELETE FROM thongke";
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location: List-Chart.php");
    }

    #Xóa doanh mục sản phẩm(loại)
    if(isset($_GET['IDLoai']))
    {
        $ID=$_GET['IDLoai'];
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql= "DELETE FROM loai WHERE loai_id=$ID";
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location: Insert-Category.php");
    }

    #Xóa tài khoản
    if(isset($_GET['PhanQuyen']))
    {
        $ID=$_GET['PhanQuyen'];
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql= "DELETE FROM taikhoan WHERE taikhoan_id=$ID";
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location: PhanQuyen.php");
    }

    #Xóa blog
    if(isset($_GET['Blog']))
    {
        $ID=$_GET['Blog'];
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql= "DELETE FROM blog WHERE blog_id=$ID";
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location: Blog.php");
    }

    #Xóa giỏ hàng gồm tất cả đơn hàng của 1 người dùng
    if(isset($_GET['ID_Cart']))
    {
        $ID=$_GET['ID_Cart'];
        $conn=mysqli_connect("localhost","root","","vegefoods");
        $sql= "DELETE FROM thongke WHERE thongke_id_cart='$ID'";
        $result=mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location: List-Chart-Update.php");
    }
?>
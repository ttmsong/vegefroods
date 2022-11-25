<?php
if(isset($_GET['IDThongKe']))
{
    $ID=$_GET['IDThongKe'];
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="UPDATE thongke SET thongke_xuli='Yes' WHERE thongke_id=$ID";
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);
    header('Location: List-Chart.php');
}
if(isset($_GET['ID_Cart']))
{
    $ID=$_GET['ID_Cart'];
    $conn=mysqli_connect("localhost","root","","vegefoods");
    $sql="UPDATE thongke SET thongke_xuli='Yes' WHERE thongke_id_cart='$ID'";
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);
    header('Location: List-Chart-Update.php');
}
?>
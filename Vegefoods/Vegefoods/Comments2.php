<?php
function List_Cmts($MaSanPham)
{
    $count=0;
    $conn=mysqli_connect("localhost","root","","vegefoods");
	$sql= "SELECT * FROM binhluan WHERE binhluan_sanpham_id=$MaSanPham";
	$result= mysqli_query($conn,$sql);

    while($row=mysqli_fetch_array($result))
    {
        $count++;
        echo
        '
        <li class="comment">
        <div class="vcard bio">
        <img src="images/khanh.jpg" alt="Khánh">
        </div>
        <div class="comment-body">
        <h3>'.$row['binhluan_taikhoan_ten'].'</h3>
        <div class="meta">'.$row['binhluan_thoigian'].'</div>
        <p>'.$row['binhluan_noidung'].'</p>
        <p><a href="" class="reply">Trả lời</a></p>
        </div>
        </li>
        ';
    }
    mysqli_close($conn);
}


function Add_Comments()
{
    if(isset($_SESSION['taikhoan_id']))
    {
        if(isset($_POST['Binhluan']))
        {
            if($_POST['message']!=="")
            {
                $message=$_POST['message'];
    
                $z=date("H")+6;
                $thoigian=date("$z:i:s d-m-Y");
            
                $product_id=$_SESSION['MaSanPham'];
                $user_id=$_SESSION['taikhoan_id'];
                $user_name=$_SESSION['taikhoan_ten'];
            
                $conn=mysqli_connect("localhost","root","","vegefoods");
                $sql= "INSERT INTO binhluan(binhluan_noidung, binhluan_thoigian, binhluan_sanpham_id, binhluan_taikhoan_id, binhluan_taikhoan_ten, binhluan_taikhoan_id_rep) 
                VALUES('$message','$thoigian','$product_id','$user_id','$user_name','')";
                $result= mysqli_query($conn,$sql);
                mysqli_close($conn);
            }
        }
    }
    else
    {
        echo "
        <script>
        function myFunction() {
        alert('Bạn cần đăng nhập để bình luận sản phẩm này! 😎');
        }
        </script>";
    }
}
?>
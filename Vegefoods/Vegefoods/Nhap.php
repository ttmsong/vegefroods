<?php
$binhluan_noidung=$_POST['noidung'];
$taikhoan_ten=$_POST['taikhoan_ten'];
$binhluan_sanpham_id=$_POST['masanpham'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $("#btn-gui").click(function()
            {
                $.post("Add-Comments.php"),
                {
                    username: 'song',
                    noidung: $("#noidung").val(),
                    masanpham: $("#masanpham").val()
                },
                function(data,status)
                {
                    $("#list-cmts").append("<p>ABC: "+$("#noidung").val()+"</p>");
                    $("#noidung").val('');
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h4>
            <div id="list-cmts">

            </div>
            <div id="binhluan">
                <input type="hidden" name="" id="masanpham" value="">
                <input type="text" name="" id="noidung">
                <input type="submit" value="Gửi" id="btn-gui">
            </div>
        </h4>
    </div>
</body>
</html>
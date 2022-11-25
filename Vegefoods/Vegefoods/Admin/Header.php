<?php
    session_start();
    $code='Admin';
    if($code!==$_SESSION['Admin'])
    {
        header("Location: ../Login.php");
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="bg-light">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="https://www.facebook.com/Vegefoods-108645221638906">Vegefoods</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Home.php">Nhà</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thống Kê
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="List-Chart-Update.php">Danh Sách</a></li>
                        <li><a class="dropdown-item" href="Charts.php">Biểu Đồ</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="Charts.php#Bieu-Do-Tron">Số Lượng Đã Bán</a></li>
                        <li><a class="dropdown-item" href="Charts.php#Bieu-Do-Cot">Doanh Thu</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thêm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="Insert-Category.php">Danh Mục</a></li>
                        <li><a class="dropdown-item" href="Insert-Product.php">Sản Phẩm</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Chưa biết thêm gì</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="PhanQuyen.php">Phân Quyền</a>
                </li>
                <li class="nav-item">
                <?php
                if(isset($_SESSION['Admin']))
                {
                    echo '<a class="nav-link" href="../Login.php">Đăng Xuất</a>';
                }
                ?>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Bạn muốn tìm gì ?" aria-label="Search" name="Search">
                <button class="btn btn-outline-success" type="submit">Tìm</button>
            </form>
            </div>
            </div>
        </nav>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê - Biểu Đồ</title>
</head>
<body>
    <?php include("Header.php");?>
    <div class="container">
        <div class="row mt-5" id="Bieu-Do-Tron">
            <div class="col">
                <?php 
                include("Pie-Charts.php");
                ?>
            </div>
            <div class="col">
            <?php 
                include("Table-Pie.php");
            ?>
            </div>
        </div>
        <div class="row" id="Bieu-Do-Cot">
            <div class="col">
                <?php 
                include("Columns-Chart.php");
                ?>
            </div>
            <div class="col">
                <?php 
                include("Table-Col.php");
                ?>
            </div>
        </div>
        <div class="row mt-5" id="Lien-He">
            <?php include("Footer.php"); ?>
        </div>
    </div>
</body>
</html>
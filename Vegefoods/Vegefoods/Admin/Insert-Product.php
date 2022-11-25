
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <title>Thêm Sản Phẩm</title>
</head>
<body>
    <?php include("Header.php");?>
    <div class="container my-4">
        <form method="POST" action="Insert-Product2.php" enctype="multipart/form-data">
        <fieldset>
            <div class="alert alert-danger" role="alert">
                <h5>Thêm Sản Phẩm</h5>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">TÊN</label>
                <input type="text" id="disabledTextInput" class="form-control" required placeholder="Hãy điền rõ tên sản phẩm vào đây!" name="sanpham_ten">

                <label for="formFile" class="form-label mt-2">HÌNH ẢNH</label>
                <input class="form-control" type="file" id="formFile" name="sanpham_hinhanh" required>

                <label for="disabledTextInput" class="form-label mt-2">MIÊU TẢ</label>
                <div class="form-floating">
                    <textarea class="rounded" name="sanpham_mieuta"></textarea>
                    <script>
                            CKEDITOR.replace('sanpham_mieuta');
                    </script>
                </div>
                <label for="disabledTextInput" class="form-label mt-2">GIÁ TIỀN</label>
                <input type="text" id="disabledTextInput" class="form-control" required placeholder="Giá thành là nhiêu nhỉ ?" name="sanpham_gia">
                <label for="disabledTextInput" class="form-label mt-2">GIẢM GIÁ</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Bạn có giảm giá cho mặt hàng này không ?" name="sanpham_giamgia">

                <div class="form-group pt-2">
                    <label for="">LOẠI CỦA SẢN PHẨM</label>
                    <select name="loaisanpham" required id="" class="form-control mt-2">
                        <option value="" required disabled selected>Vui lòng chọn</option>
                        <?php
                            $conn=mysqli_connect("localhost","root","","vegefoods");
                            $sql="SELECT * FROM loai";
                            $result=mysqli_query($conn,$sql);
                            mysqli_close($conn);

                            while($row=mysqli_fetch_array($result))
                            {
                                echo '
                                <option value="'.$row['loai_id'].'">'.$row['loai_ten'].'</option>
                                ';
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" required>
                    <label class="form-check-label" for="disabledFieldsetCheck">
                    Vui lòng xác nhận!
                    </label>
                </div>
            </div>
            <input type="submit" class="btn btn-outline-success" name="submit" value="Xác Nhận">
        </fieldset>
        </form>
    </div>
    <?php
    include("Footer.php");
    ?>
</body>
</html>
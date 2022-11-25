<!-- <script>
    $(document).ready(function()
    {
        $("#btn-gui").click(function()
        {
            $.post("Product-Single.php"),
            {
                binhluan_noidung: $("#message").val(),
            },
            function(data,status)
            {
                $("#comment").append("<p>ABC: "+$("#message").val()+"</p>");
                $("#message").val('');
            }
        });
    });
</script> -->

<?php include("Comments2.php"); Add_Comments(); ?>
<div class="container">
<div class="pt-5 mt-5">
    <h3 class="mb-5"><?php echo 'Bình luận';?></h3>
    <ul class="comment-list">
        <!-- Hiển thị -->
    <?php List_Cmts($MaSanPham); ?>

    </ul>
    <!-- Hiển thị -->
    
    <div class="comment-form-wrap pt-5">
    <h3 class="mb-5">Hãy để lại bình luận của bạn</h3>
    <form action="" method="POST" class="px-5 py-3 bg-light">
        <div class="form-group">
        <label for="message">Thông điệp</label>
        <textarea name="message" id="" cols="7" rows="3" class="form-control"></textarea>
        </div>
        <div class="form-group">
        <input type="submit" value="Đăng Bình Luận" class="btn py-3 px-4 btn-primary" name="Binhluan" onclick="myFunction()">
        </div>

    </form>
    </div>
</div>
</div>
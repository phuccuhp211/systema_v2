<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<title> </title>
	<link rel="stylesheet" href="<?php echo plrc ?>css/ktbh.css">
	<script style="text/javascript" src="<?php echo plrc ?>jquery/ktbh.js"></script>
</head>
<body>
	<?php include './app/views/include/header.php' ?>
    <?php include './app/views/include/modal.php' ?>

    <div class="container">
        <div class="row" id="baohanh">
            <div class="col-6 offset-3">
                <div class="khung f1 baohanh">
                    <h3>Kiểm tra Bảo Hành</h3>
                    <label for="tendn">Mã số hóa đơn :</label>
                    <input type="number" name="mahd" id="mahd">
                    <p>Vui lòng nhập mã hóa đơn của sản phẩm (gồm 12 số), mã được đính kèm trong Hóa Đơn Điện Tử, hoặc xem trong lịch sử mua hàng của Quý Khách</p>
                    <button class="btn btn-success check-bh">Kiểm Tra</button>
                </div>
            </div>
        </div>
    </div>
   
    <?php include './app/views/include/footer.php' ?>
</body>
</html>
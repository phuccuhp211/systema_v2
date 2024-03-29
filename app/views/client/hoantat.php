<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<title>Thanh Toán</title>
	<link rel="stylesheet" href="<?php echo plrc ?>css/hoantat.css">
	<script style="text/javascript" src="<?php echo plrc ?>jquery/hoantat.js"></script>
</head>
<body>
	<?php include './app/views/include/header.php' ?>
    <?php include './app/views/include/modal.php' ?>

    <div class="container hoantat">
        <div class="row">
            <div class="col-4 offset-4">
                <div class="khung">
                    <h3>Xin Cám Ơn</h3>
                    <h6>Cám ơn quý khách hàng đã tin tưởng lựa chọn sử dụng sản phẩm ở cửa hàng chúng tôi.</h6>
                    <h6>Hóa đơn sẽ được gửi tới email của quý khách.</h6>
                    <button id="reset-session">Tiếp tục mua hàng</button>
                </div>
            </div>
        </div>
    </div>

    <?php include './app/views/include/footer.php' ?>
</body>
</html>
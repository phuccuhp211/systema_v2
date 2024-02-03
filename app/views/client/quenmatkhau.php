<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<title>Quên Mật Khẩu</title>
	<link rel="stylesheet" href="<?php echo plrc ?>css/quenmk.css">
	<script style="text/javascript" src="<?php echo plrc ?>jquery/quenmk.js"></script>
</head>
<body>
	<?php include './app/views/include/header.php' ?>
    <?php include './app/views/include/modal.php' ?>

    <div class="thongbao-thanhtoan hide-tbtt">
        <div class="box-noidung">
            <h2>...Đang Xử Lý...</h2>
        </div>
    </div>

    <div class="container hoantat">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="khung f1">
                    <?php if (isset($_SESSION['qmkvl'])) { 
                        echo $_SESSION['qmkvl'];
                        unset($_SESSION['qmkvl']);
                    } ?>
                    <form action="<?php echo urlmd ?>/quenmk/" method="POST" enctype="multipart/form-data">
                        <h3>Lấy lại mật khẩu</h3>
                        <label for="tendn">Tên đăng nhập :</label>
                        <input type="text" name="tendn">
                        <p>Mã xác nhận sẽ được gửi tới Email của quý khách hàng, vui lòng hãy kiểm tra Email của mình.</p>
                        <button class="btn btn-success sendmxn">Gửi Mã Xác Nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include './app/views/include/footer.php' ?>
</body>
</html>
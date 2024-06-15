<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<title>Tranh Chủ</title>
	<link rel="stylesheet" href="<?php echo plrc ?>css/errorl.css">
	<script style="text/javascript" src="<?php echo plrc ?>jquery/errorl.js"></script>
</head>
<body>
	<?php include './app/views/include/header.php' ?>
    <?php include './app/views/include/modal.php' ?>

    <div class="container">
    	<div class="row">
    		<div class="col-6 offset-3">
	    		<div class="outer-box">
			    	<h3>Trang Không Tồn Tại Hoặc Đã Bị Xóa</h3>
			    	<a href="<?php echo genurl() ?>">Quay Lại Trang Chủ</a>
			    </div>
	    	</div>
    	</div>
    </div>
	    

    <?php include './app/views/include/footer.php' ?>
</body>
</html>
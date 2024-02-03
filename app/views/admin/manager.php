<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<link rel="stylesheet" href="<?php echo plrc ?>css/admin.css">
	<script style="text/javascript" src="<?php echo plrc ?>jquery/admin.js"></script>
	<script style="text/javascript" src="<?php echo plrc ?>lib/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
	<script style="text/javascript" src="<?php echo plrc ?>lib/js/plotly.min.js" referrerpolicy="origin"></script>
	<title>Trang Quản Trị</title>
</head>
<body style="padding: 0 !important;">
	<div class="menu">
		<a class="text-start btn w-100 btn-info" href="<?php echo urlmd ?>/manager/">Trang Chủ</a>
		<hr>
		<a class="text-start btn w-100 btn-success" href="<?php echo urlmd ?>/manager/tdbc/">Sections Home</a>
		<a class="text-start btn w-100 btn-success" href="<?php echo urlmd ?>/manager/slbn/">Slide Banner</a>
		<hr>
		<a class="text-start btn w-100 btn-secondary text-white" href="<?php echo urlmd ?>/manager/qlsp/">Quản Lý Sản Phẩm</a>
		<a class="text-start btn w-100 btn-secondary text-white" href="<?php echo urlmd ?>/manager/qldm/">Quản Lý Danh Mục</a>
		<a class="text-start btn w-100 btn-secondary text-white" href="<?php echo urlmd ?>/manager/qlus/">Quản Lý User</a>
		<a class="text-start btn w-100 btn-secondary text-white" href="<?php echo urlmd ?>/manager/qlbl/">Quản Lý Bình Luận</a>
		<hr>
		<a class="text-start btn w-100 btn-dark text-white" href="<?php echo urlmd ?>/manager/hddh/">Hóa Đơn Đặt Hàng</a>
		<a class="text-start btn w-100 btn-dark text-white" href="<?php echo urlmd ?>/manager/magg/">Mã Giảm Giá</a>
		<hr>
		<a class="text-start btn w-100 btn-danger text-white my-0" href="<?php echo urlmd ?>/dangxuat/">Đăng Xuất</a>
	</div>

	<div class="container">
		<div class="row">
			<?php 
				include 'stat2.php';
				if ($_SESSION['mng'] == "quanly") { include 'stat.php'; } 
				else { 
			?>
				<div class="box-table">
					<?php 
						include 'filter.php';
						include 'tb1.php';
						include 'tb2.php';
					?>
				</div>
			<?php } ?>
		</div>
	</div>

	<?php include 'apopup.php' ?>
</body>
</html>
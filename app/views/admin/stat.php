<div class="col-6" style="margin: 10vh 0 0">
	<div class="ql-box">
		<h3 class="text-center">Tổng thu nhập</h3>
		<div class="box-icon">
			<i class="fa-solid fa-cash-register" style="background: #9933CC;"></i>
		</div>
		<div class="ql-mess">
			<h3 style="color: #ff6363; text-align: center;"><?php echo number_format($thunhap[0]['thunhap'],0,",",".") ?> VNĐ</h3>
			<h5 style="color: white; text-align: center;">Từ các hóa đơn đã được thanh toán</h5><hr>
			<p>Thu nhập dự tính nếu hoàn tất mọi HD : <span style="color:#ff6363;"><?php echo number_format($thunhap[0]['dutinh'],0,",",".")?> VNĐ</span></p>
			<p>Giá trị của các hóa đơn chưa thanh toán : <span style="color:#ff6363;"><?php echo number_format($thunhap[0]['dutinh']-$thunhap[0]['thunhap'],0,",",".")?> VNĐ</span></p>
		</div>
	</div>
</div>
<div class="col-6" style="margin: 10vh 0 0">
	<div class="ql-box">
		<h3 class="text-center">Lượng đơn hàng</h3>
		<div class="box-icon">
			<i class="fa-solid fa-file-invoice" style="background: #0d47a1;"></i>
		</div>
		<div class="ql-mess">
			<h3 style="color: #ff6363; text-align: center;"><?php echo $donhang[0]['tonghd'] ?></h3>
			<h5 style="color: white; text-align: center;">Là tổng số các hóa đơn hiện có</h5><hr>
			<p>Đã hoàn thành : <?php echo $donhang[0]['hdht'] ?></p>
			<p>Chưa hoàn thành : <?php echo $donhang[0]['tonghd']-$donhang[0]['hdht'] ?></p>
		</div>
	</div>
</div>
<div class="col-6">
	<div class="ql-box">
		<h3 class="text-center">Tổng số khách hàng</h3>
		<div class="box-icon">
			<i class="fa-regular fa-user" style="background: #00695c;"></i>
		</div>
		<div class="ql-mess">
			<h3 style="color: #ff6363; text-align: center;"><?php echo $member[0]['ddk'] + $member[0]['cdk'] ?></h3>
			<h5 style="color: white; text-align: center;">Là tổng số khách hàng đã truy cập và mua tại Web.</h5><hr>
			<p>Đã đăng ký : <?php echo $member[0]['ddk'] ?></p>
			<p>Chưa đăng ký : <?php echo $member[0]['cdk'] ?></p>
		</div>
	</div>
</div>
<div class="col-6">
	<div class="ql-box">
		<h3 class="text-center">Lưu lượng truy cập</h3>
		<div class="box-icon">
			<i class="fa-solid fa-globe" style="background: #0099cc;"></i>
		</div>
		<div class="ql-mess">
			<h3 style="color: #ff6363; text-align: center;"><?php echo number_format($access[0]['trangchu']+$access[0]['trangcon'],0,",",".") ?></h3>
			<h5 style="color: white; text-align: center;">Lượt truy cập Web</h5><hr>
			<p>Trang chủ : <?php echo $access[0]['trangchu'] ?></p>
			<p>Trang con : <?php echo $access[0]['trangcon'] ?></p>
		</div>
	</div>
</div>
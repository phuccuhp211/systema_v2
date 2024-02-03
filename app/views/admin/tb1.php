<table class="show-data">
	<?php if ($_SESSION['mng'] == 'tdbc') { ?>
		<tr>
			<th style="width: 50px;">ID</th>
			<th style="width: auto; padding: 0;">Tên Sections</th>
			<th style="width: 150px;">Poster</th>
			<th style="width: 150px;">Ảnh Nền</th>
			<th style="width: 100px;">PL - CAT</th>
			<th style="width: 100px;">TC - SX</th>
			<th style="width: 100px;">Vị Trí</th>
			<th style="width: 100px;">Thao Tác</th>
		</tr>
		<tr>
			<td colspan="8" class="td-addsp"><button class="btn btn-primary btn-add them">Thêm Section +</button></td>
		</tr>
		<?php foreach ($tdbc as $value => $item) { ?>
			<tr class="bocuc">
				<td rowspan="2" class="text-center p-0"><?php echo $item['id'] ?></td>
				<td rowspan="2" class="text-center" id="tenbc"><?php echo $item['name'] ?></td>
				<td rowspan="2" class="text-center" id="posbc">
					<?php echo $item['poster'] != null ? "<img src=\"".$item['poster']."\">" : "Chưa Thiết Lập" ?>
				</td>
				<td rowspan="2" class="text-center" id="bgrbc">
					<?php echo $item['ebd_img'] != null ? "<img src=\"".$item['ebd_img']."\">" : "Chưa Thiết Lập" ?>
				</td>
				<td class="text-center" id="plbc"><?php echo $item['id_type'] ?></td>
				<td class="text-center" id="refbc"><?php echo $item['ref'] ?></td>
				<td rowspan="2" class="text-center" id="idobc"><?php echo $item['ido'] ?></td>
				<td rowspan="2" class="text-center">
					<button class="btn btn-primary suaxoa sua suabc" data-idbc="<?php echo $item['id'] ?>"><i class="fa-solid fa-gear"></i></button>
					<button class="btn btn-danger suaxoa xoa xoabc" data-idbc="<?php echo $item['id'] ?>"><i class="fa-solid fa-trash"></i></button>
				</td>
			</tr>
			<tr>
				<td class="text-center" id="catbc"><?php echo $item['id_cata'] ?></td>
				<td class="text-center" id="ordbc"><?php echo $item['ord'] ?></td>
			</tr>
		<?php } ?>
	<?php } ?>
	<?php if ($_SESSION['mng'] == 'qlsp') { ?>
		<tr>
			<th style="width: 50px;">ID</th>
			<th style="width: 150px; padding: 0;">IMG</th>
			<th style="width: 200px;">Tên</th>
			<th style="width: auto;">Thông Tin</th>
			<th style="width: 100px;">Giá</th>
			<th style="width: 100px;">Sale</th>
			<th style="width: 120px;">Thao Tác</th>
		</tr>
		<tr>
			<td colspan="7" class="td-addsp"><button class="btn btn-primary btn-add them">Thêm sản phẩm +</button></td>
		</tr>
		<?php foreach ($sanpham as $value => $item) { ?>
			<tr class="sanpham">
				<td rowspan="2" class="text-center"><?php echo $item['id'] ?></td>
				<td rowspan="2" class="text-center"><img src="<?php echo $item['img'] ?>" alt=""></td>
				<td rowspan="2" id="tensp"><?php echo $item['name'] ?></td>
				<td rowspan="2" id="in4sp" style="overflow-hidden"><?php echo $item['detail'] ?></td>
				<td id="min4sp" hidden><?php echo $item['mdetail'] ?></td>
				<td id="id_caplth" data-pl="<?php echo $item['id_type'] ?>" data-ca="<?php echo $item['id_cata'] ?>" data-th="<?php echo $item['id_brand'] ?>" hidden></td>
				<td id="giasp" class="text-center"><?php echo number_format($item['price'],0,'','.') ?></td>
				<td id="salesp" class="text-center"><?php echo number_format($item['price_sale'],0,'','.') ?></td>
				<td rowspan="2" class="text-center">
					<button class="btn btn-primary suaxoa sua suasp" data-idsp="<?php echo $item['id'] ?>"><i class="fa-solid fa-gear"></i></button>
					<button class="btn btn-danger suaxoa xoa xoasp" data-idsp="<?php echo $item['id'] ?>"><i class="fa-solid fa-trash"></i></button>
					<?php 
						if($item['hidden'] == 0) echo"<button class=\"btn btn-warning suaxoa hidden hidsp\" data-idsp=\"".$item['id']."\"><i class=\"fa-solid fa-eye-slash\"></i></button>"; 
						else echo"<button class=\"btn btn-success suaxoa hidden unhidsp\" data-idsp=\"".$item['id']."\"><i class=\"fa-solid fa-eye\"></i></button>"
					?>
				</td>
			</tr>
			<tr class="sanpham">
				<td colspan="2">Đã bán : <?php echo $item['saled'] ?></td>
			</tr>
		<?php } ?>
	<?php } ?>
	<?php if ($_SESSION['mng'] == 'qldm') { ?>
		<tr>
			<th style="width: 50px;">ID</th>
			<th style="width: 200px;">Tên</th>
			<th style="width: 200px;">Mã Phân Loại</th>
			<th style="width: auto;">IMG</th>
			<th style="width: 120px;">Thao Tác</th>
		</tr>
		<tr>
			<td colspan="7" class="td-adddm"><button class="btn btn-primary btn-add them">Thêm danh mục +</button></td>
		</tr>
		<?php foreach ($danhmuc as $value => $item) { ?>
			<tr>
				<td style="text-align: center;"><?php echo $item['id'] ?></td>
				<td style="text-align: center;" id="tendm"><?php echo $item['name'] ?></td>
				<td style="text-align: center;" id="pldm"><?php echo $item['loai'] ?></td>
				<td style="text-align: center;" id="imgdm"><?php echo $item['img'] ?></td>
				<td style="text-align: center;">
					<button class="btn btn-primary suaxoa sua suadm" data-iddm="<?php echo $item['id'] ?>"><i class="fa-solid fa-gear"></i></button>
					<button class="btn btn-danger suaxoa xoa xoadm" data-iddm="<?php echo $item['id'] ?>"><i class="fa-solid fa-trash"></i></button>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	<?php if ($_SESSION['mng'] == 'qlus') { ?>
		<tr>
			<th style="width: 40px;">ID</th>
			<th style="width: 200px; padding: 0;">Tài Khoản</th>
			<th style="width: 250px;">Họ Tên</th>
			<th style="width: 125px;">SĐT</th>
			<th style="width: auto;">Email</th>
			<th style="width: 70px;">Role</th>
			<th style="width: 120px;">Thao Tác</th>
		</tr>
		<tr>
			<td colspan="7" class="td-adddm"><button class="btn btn-primary btn-add them">Thêm User +</button></td>
		</tr>
		<?php foreach ($user as $value => $item) { ?>
			<tr class="taikhoan">
				<td class="text-center"><?php echo $item['id'] ?></td>
				<td id="tenus"><?php echo $item['user'] ?></td>
				<td id="htus" data-ho="<?php echo $item['ho'] ?>" data-ten="<?php echo $item['ten'] ?>"><?php echo $item['ho']." ".$item['ten'] ?></td>
				<td id="sdtus"><?php echo $item['sdt'] ?></td>
				<td id="emailus" class="text-center"><?php echo $item['email'] ?></td>
				<td id="roleus" class="text-center"><?php echo $item['role'] ?></td>
				<td class="text-center">
					<button class="btn btn-primary suaxoa sua suaus" data-idus="<?php echo $item['id'] ?>"><i class="fa-solid fa-gear"></i></button>
					<button class="btn btn-danger suaxoa xoa xoaus" data-idus="<?php echo $item['id'] ?>"><i class="fa-solid fa-trash"></i></button>
					<?php 
						if($item['ban'] == 1) echo"<button class=\"btn btn-warning suaxoa ban banus\" data-idus=\"".$item['id']."\"><i class=\"fa-solid fa-ban\"></i></button>"; 
						else echo"<button class=\"btn btn-success suaxoa ban unbanus\" data-idus=\"".$item['id']."\"><i class=\"fa-solid fa-check\"></i></button>"
					?>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
	<?php if ($_SESSION['mng'] == 'hddh') { ?>
		<tr>
			<th style="width: 30px;">ID</th>
			<th style="width: 120px;">Tên</th>
			<th style="width: 20%;">Liên Hệ</th>
			<th style="width: auto;">Danh Sách Sản Phẩm</th>
			<th style="width: 100px;">Thành tiền</th>
			<th style="width: 100px;">Tình Trạng</th>
			<th style="width: 100px;">Thao tác</th>
		</tr>
		<?php foreach ($hoadon as $value => $item) { 
			$dssp = json_decode($item['dssp'],true);
			if ($item['thanhtien2'] != 0) $tc = number_format($item['thanhtien2'],0,'','.')."<br><span style=\"font-size: 10px; color: red;\">".$item['mgg']."</span>";
			else $tc = number_format($item['thanhtien'],0,'','.');
			if (is_array($dssp)) $rp = count($dssp);
			else $rp = 0;
		?>
			<tr class="hoadon">
				<td rowspan="<?php echo $rp ?>" class="text-center p-0 id-hd"><?php echo $item['id'] ?></td>
				<td rowspan="<?php echo $rp ?>" class="text-start"><?php echo $item['name'] ?></td>
				<td rowspan="<?php echo $rp ?>" class="text-start">
					Email: <?php echo $item['email'] ?><br>
					SĐT: <?php echo $item['sdt'] ?><br>
					Đ/C: <?php echo $item['dc'] ?>
				</td>
				<td class="text-start"><?php echo "SL: ".$dssp[0]['soluong']." | ".$dssp[0]['name'] ?></td>
				<td rowspan="<?php echo $rp ?>" class="text-center p-0"><?php echo $tc ?></td>
				<td rowspan="<?php echo $rp ?>" class="text-center stt-hd"><?php echo $item['trangthai'] ?></td>
				<td rowspan="<?php echo $rp ?>" class="text-center">
					<select name="trangthai" class="hd-stt" id="hd-stt">
						<option value="Chuẩn Bị">Chuẩn Bị</option>
						<option value="Đang Giao">Đang Giao</option>
						<option value="Hoàn Thành">Hoàn Thành</option>
						<option value="Hủy">Hủy</option>
					</select>
					<button class="btn btn-success d-block mt-1 mx-auto hd-update" id="hd-update">Cập Nhật</button>
				</td>
			</tr>
			<?php for ($i = 1; $i < $rp ; ++$i) { ?>
				<tr class="hoadon">
					<td style="text-align: left;"><?php echo "SL: ".$dssp[$i]['soluong']." | ".$dssp[$i]['name'] ?></td>
				</tr>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<?php if ($_SESSION['mng'] == 'qlbl') { ?>
		<tr>
			<th style="width: 70px;">ID SP</th>
			<th style="width: auto;">Tên SP</th>
			<th style="width: 125px;">Lượt CMT</th>
			<th style="width: 125px;">Lượng User</th>
			<th style="width: 125px;">Thao Tác</th>
		</tr>
		<?php foreach ($binhluan as $value => $item) { ?>
			<tr>
				<td><?php echo $item['id'] ?></td>
				<td style="text-align: left;"><?php echo $item['name'] ?></td>
				<td><?php echo $item['cmts'] ?></td>
				<td><?php echo $item['users'] ?></td>
				<td><button class="btn btn-success chitiet chitietbl" data-idbl="<?php echo $item['id'] ?>">Chi tiết</button></td>
			</tr>
		<?php } ?>
	<?php } ?>
	<?php if ($_SESSION['mng'] == 'magg') { ?>
		<tr>
			<th style="width: 40px;">ID</th>
			<th style="width: auto;">Tên Mã</th>
			<th style="width: 100px;">S.Lượng</th>
			<th style="width: 100px;">Còn Lại</th>
			<th style="width: 125px;">Từ Ngày</th>
			<th style="width: 125px;">Đến Ngày</th>
			<th style="width: 100px;">% Giảm</th>
			<th style="width: 120px;">Thao Tác</th>
		</tr>
		<tr>
			<td colspan="8" class="td-adddm"><button class="btn btn-primary btn-add them">Thêm MGG +</button></td>
		</tr>
		<?php foreach ($mgg as $value => $item) { ?>
			<tr class="voucher">
				<td><?php echo $item['id'] ?></td>
				<td id="tengg"><?php echo $item['name'] ?></td>
				<td id="maxgg"><?php echo $item['max'] ?></td>
				<td id="remgg"><?php echo $item['remaining'] ?></td>
				<td hidden id="fdgg"><?php echo $item['f_date'] ?></td>
				<td hidden id="tdgg"><?php echo $item['t_date'] ?></td>
				<td><?php echo date("d-m-Y",strtotime($item['f_date'])) ?></td>
				<td><?php echo date("d-m-Y",strtotime($item['t_date'])) ?></td>
				<td id="ptgg"><?php echo $item['percent'] ?></td>
				<td>
					<button class="btn btn-primary suaxoa sua suagg" data-idgg="<?php echo $item['id'] ?>"><i class="fa-solid fa-gear"></i></button>
					<button class="btn btn-danger suaxoa xoa xoagg" data-idgg="<?php echo $item['id'] ?>"><i class="fa-solid fa-trash"></i></button>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
</table>
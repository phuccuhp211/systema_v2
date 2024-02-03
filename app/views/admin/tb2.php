<table>
	<?php if ($_SESSION['mng'] == 'qldm') { ?>
		<tr>
			<th style="width: 50px;">ID</th>
			<th style="width: auto;">Tên</th>
			<th style="width: 120px;">Thao Tác</th>
		</tr>
		<tr>
			<td colspan="7" class="td-adddm"><button class="btn btn-primary btn-add them">Thêm phân loại +</button></td>
		</tr>
		<?php foreach ($phanloai as $value => $item) { ?>
			<tr>
				<td style="text-align: center;"><?php echo $item['id'] ?></td>
				<td style="text-align: center;" id="tenpl"><?php echo $item['name'] ?></td>
				<td style="text-align: center;">
					<button class="btn btn-primary suaxoa sua suapl" data-idpl="<?php echo $item['id'] ?>"><i class="fa-solid fa-gear"></i></button>
					<button class="btn btn-danger suaxoa xoa xoapl" data-idpl="<?php echo $item['id'] ?>"><i class="fa-solid fa-trash"></i></button>
				</td>
			</tr>
		<?php } ?>
	<?php } ?>
</table>
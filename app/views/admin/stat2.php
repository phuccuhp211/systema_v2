<?php if ($_SESSION['mng'] == 'qlsp') { ?>
	<div class="thongke">
		<?php foreach ($tksp as $value => $item) { ?>
			<div hidden class="dsdm-ten" data-soluong="<?php echo $item['soluong'] ?>" ><?php echo $item['name'] ?></div>
		<?php } ?>
		<div id="bieudo"></div>
	</div>
<?php } ?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<title>Tất Cả Sản Phẩm</title>
	<link rel="stylesheet" href="<?php echo plrc ?>css/sanpham.css">
	<script style="text/javascript" src="<?php echo plrc ?>jquery/sanpham.js"></script>
</head>
<body>
	<?php include './app/views/include/header.php' ?>
    <?php include './app/views/include/modal.php' ?>

    <div class="khungto">
        <div class="container">
            <div class="row">
                <div class="col-3 menu-trai d-none d-lg-block d-md-block">
                    <h2 class="h2-title">Danh Mục</h2>
                    <div class="menu-trai-tong">
                        <div class="menu-khungboc">
                            <?php foreach ($header['phanloai'] as $value => $item) { ?>
                                <div class="list-cap1">
                                    <a href="<?php echo urlmd.'/sanpham/phanloai/'.$item['id'].'/' ?>"><?php echo ucwords($item['name']) ?></a>
                                    <?php foreach ($header['danhmuc'] as $value2 => $item2) {
                                        if ($item['id'] == $item2['loai']) { ?>
                                            <button class="show-list-btn">+</button>
                                            <div class="list-cap2">
                                                <ul>
                                                    <?php foreach ($header['danhmuc'] as $value3 => $item3) {
                                                        if ($item['id'] == $item3['loai']) echo "<li><a href=\"".urlmd."/sanpham/danhmuc/".$item3['id']."/\">".strtoupper($item3['name'])."</a></li>";
                                                    } ?>
                                                </ul>
                                            </div>
                                        <?php break; }     
                                    } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-9 ldssp">
                    <div class="row">
                        <div class="col-9">
                            <?php 
                                if (!isset($tendanhmuc) && !isset($chuoitk) && !isset($tenphanloai)) echo "<h2 class=\"h2-title\">Tất cả sản phẩm</h2>";
                                if (isset($tendanhmuc)) echo "<h2 class=\"h2-title\">Danh mục : ".strtoupper($tendanhmuc[0]['name'])."</h2>";
                                if (isset($tenphanloai)) echo "<h2 class=\"h2-title\">Phân Loại : ".ucwords($tenphanloai[0]['name'])."</h2>";
                                if (isset($chuoitk))
                                    if ($chuoitk == "_") echo "<h2 class=\"h2-title\">Hiển thị kết quả cho : </h2>"; 
                                    else echo "<h2 class=\"h2-title\">Hiển thị kết quả cho : ".$chuoitk."</h2>";
                            ?>
                        </div>
                        <?php echo $bl ?>
                    </div>
                    <div class="row" id="list-sanpham">
                        <?php echo $this->showsp($fullsp,'col-3') ?>
                    </div>
                    <div class="row">
                        <div style="display:flex; justify-content: center; margin: 30px 0 0;" id="list-pt">
                            <?php echo $lpt; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include './app/views/include/footer.php' ?>
</body>
</html>

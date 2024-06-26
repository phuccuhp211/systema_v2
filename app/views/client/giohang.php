<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<title>Giỏ Hàng</title>
	<link rel="stylesheet" href="<?php echo plrc ?>css/giohang.css">
	<script style="text/javascript" src="<?php echo plrc ?>jquery/giohang.js"></script>
</head>
<body>
	<?php include './app/views/include/header.php' ?>
    <?php include './app/views/include/modal.php' ?>

    <div class="container" style="margin: 30px auto; min-height: 50vh;">
        <div class="row">
            <table id="listcart">
                <tr id="theader" name="theader">
                    <th>STT</th>
                    <th>IMG</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                    <th>Xóa</th>
                </tr>
                <?php if (isset($_SESSION['giohang'])) {
                    foreach ($_SESSION['giohang']['dssp'] as $value => $item) { ?>
                        <tr class="sanpham" name="sanpham" id="sanpham">
                            <td style="width : 50px;" class="text-center" id="keysp"><?php echo $value+1 ?></td>
                            <td style="width : 150px;" class="text-center"><img src="<?php echo genimg($item['img']) ?>" alt=""></td>
                            <td style="width : auto;"><?php echo $item['name'] ?></td>
                            <td style="width : 150px;" name="giasp" id="giasp">
                                <?php if ($item['price_sale'] != 0) echo gennum($item['price_sale']);
                                else echo gennum($item['price']); ?>
                            </td>
                            <td style="width : 80px;" class="text-center"><input type="number" min="1" value="<?php echo $item['soluong']; ?>" name="slsp" data-idsp="<?php echo $item['id']; ?>"></td>
                            <td style="width : 150px;" id="thanhtien"><?php echo gennum($item['thanhtien']) ?></td>
                            <td style="width : 70px;" class="text-center"><button class="btn btn-danger xoasp" name="xoasp" data-idsp="<?php echo $value ?>"><i class="fa-solid fa-trash"></i></i></button></td>
                        </tr>
                <?php }} ?>
                <?php 
                    if (!isset($_SESSION['giohang']['dssp'][0]) || count($_SESSION['giohang']['dssp']) == 0) { 
                        echo '<tr id="emptycart"><th colspan="7">Bạn không có sản phẩm nào trong giỏ hàng</th></tr>';
                    }
                    else {
                        echo '
                        <tr id="sanpham">
                            <td colspan="5" style="color: red; font-weight: bold; text-align : center;">Tổng tiền :</td>
                            <td colspan="2" style="color: red; font-weight: bold;" id="ttfn">'.gennum($_SESSION['giohang']['tong']).'</td>
                        </tr>';
                    }
                  ?>
            </table>
        </div>
        <?php if (isset($_SESSION['giohang']) && count($_SESSION['giohang']['dssp']) != 0) { ?>
            <div class="row" id="sanpham" style="margin: 15px 0 0;"><div class="col-4 offset-4"><a href="<?php echo genurl('thanhtoan') ?>" class="w-100 btn btn-success">Bắt Đầu Thanh Toán</a></div></div>
            <div class="row" style="margin: 15px 0 0;"><div class="col-4 offset-4"><button class="w-100 btn btn-danger delallcart">Xóa Giỏ Hàng</button></div></div>
        <?php } ?>
    </div>
    
    <?php include './app/views/include/footer.php' ?>
</body>
</html>
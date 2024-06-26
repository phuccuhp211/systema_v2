<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<title>Thanh Toán</title>
	<link rel="stylesheet" href="<?php echo plrc ?>css/thanhtoan.css">
	<script style="text/javascript" src="<?php echo plrc ?>jquery/thanhtoan.js"></script>
</head>
<body>
	<?php include './app/views/include/header.php' ?>
    <?php include './app/views/include/modal.php' ?>

    <div class="thongbao-thanhtoan hide-tbtt">
        <div class="box-noidung">
            <h2>...Đang Xử Lý...</h2>
        </div>
    </div>

    <div class="container">
        <h2 class="ttgh-top">thông tin giỏ hàng</h2>          
        <div class="row">
            <!-- bentrai -->
            <div class="col-4">
                <div class="col-12 khungto-khttdh">
                    <div class="td-khttdh">thông tin khách hàng</div>
                    <div class="khung-khttdh">
                        <?php if (isset($_SESSION['udone'])) { ?>    
                            <form action="" id="thongtin-kh">
                                <div class="khungchu">
                                    <p>Họ tên :</p><input type="text" id="tenkh" name="tenkh" value="<?php echo $header['nguoidung'][0]['user'] ?>">
                                </div>
                                <div class="khungchu">
                                    <p>Email :</p><input type="text" id="emailkh" name="emailkh" value="<?php echo $header['nguoidung'][0]['email'] ?>">
                                </div>
                                <div class="khungchu">
                                    <p>SĐT :</p><input type="text" id="sdtkh" name="sdtkh" value="<?php echo $header['nguoidung'][0]['sdt'] ?>">
                                </div>
                                <div class="khungchu">
                                    <p>Địa Chỉ :</p><input type="text" id="dckh" name="dckh" value="<?php echo $header['nguoidung'][0]['diachi'] ?>">
                                </div>
                                <div class="khungchu">
                                    <p>Ghi chú :</p><textarea id="memokh" name="memokh"></textarea>
                                </div>  
                            </form>
                        <?php } else { ?>  
                            <form action="" id="thongtin-kh">
                                <div class="khungchu">
                                    <p>Họ tên :</p><input type="text" id="tenkh" name="tenkh">
                                </div>
                                <div class="khungchu">
                                    <p>Email :</p><input type="text" id="emailkh" name="emailkh">
                                </div>
                                <div class="khungchu">
                                    <p>SĐT :</p><input type="text" id="sdtkh" name="sdtkh">
                                </div>
                                <div class="khungchu">
                                    <p>Địa Chỉ :</p><input type="text" id="dckh" name="dckh">
                                </div>
                                <div class="khungchu">
                                    <p>Ghi chú :</p><textarea id="memokh" name="memokh"></textarea>
                                </div>  
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12 khungto-khttdh">
                    <div class="td-khttdh">hình thức thanh toán</div>
                    <div class="khung-khttdh">
                        <form action="<?php echo urlmd ?>/app/api/vnpay_php/vnpay_create_payment.php" id="frmCreateOrder" method="post">
                            <input class="giatien" data-val="true" id="amount" name="amount" type="number" hidden/>
                            <input type="radio" id="language" Checked="True" name="language" value="vn" hidden>
                            <p>
                                <input type="radio" id="bankCode" name="bankCode" value="INTCARD" class="nut-cb-giohang"> 
                            Thanh toán qua thẻ quốc tế.
                            </p>
                            <p>
                                <input type="radio" id="bankCode" name="bankCode" value="VNBANK" class="nut-cb-giohang"> 
                            Thanh toán qua thẻ ATM/Tài khoản nội địa.
                            </p>
                            <p>
                                <input type="radio" id="bankCode" name="bankCode" class="nut-cb-giohang" value="COD" checked> 
                            Thanh toán khi nhận hàng(COD).
                            </p>
                            <p>+ Miễn phí giao hành trong phạm vi 10 Km (chỉ áp dụng với đơn hàng trên 500.000 đ).</p>
                        </form>
                    </div>     
                </div>
            </div>
            <!-- benphai -->
            <div class="col-8">
                <div class="td-khttdh td-giohang">giỏ hàng</div>
                <div class="giohang">

                    <?php if (isset($_SESSION['giohang'])) { foreach ($_SESSION['giohang']['dssp'] as $value => $item) {?>
                    <div class="sp-giohang">
                        <div class="col-2 anh-giohang">
                            <img src="<?php echo genimg($item['img']) ?>" class="hinhsp-giohang" alt="">
                        </div>
                        <div class="col-7 chu-giohang">
                            <p class="p-tt-giohang tensp-nho"><?php echo $item['name'] ?></p>
                            <p class="p-tt-giohang masp"><?php echo $item['detail'] ?></p>
                        </div>
                        <div class="col-3 gia-giohang">
                            <p class="p-sl-giohang">Số lượng : <?php echo $item['soluong'] ?></p>
                            <p class="p-gia-giohanh"><?php echo gennum($item['thanhtien']) ?> đ</p>
                        </div>
                    </div><hr class="hr">
                    <?php }} ?>
                    <div class="box-mgg">
                        <p>Sử dụng mã giảm giá :</p>
                        <form id="apply-mgg">
                            <input type="text" id="magiamgia">
                            <button type="submit" class="btn btn-success">Áp Dụng</button>
                        </form>
                    </div><hr>
                    <div class="row thanhtoanh">
                        <div class="col-12">
                            <div>
                                <p class="p-thanhtoan">tạm tính :</p>
                                <p class="p-gia" id="giagoc"><?php echo gennum($_SESSION['giohang']['tong']) ?></p>
                            </div>
                            <div class="giamgia hide-gg">
                                <p class="p-thanhtoan" id="stt-gg" trangtrai="">ưu đãi :</p>
                                <p class="p-gia tongcong"></p>
                            </div>
                            <div>
                                <p class="p-thanhtoan">phí vận chuyển :</p>
                                <p class="p-gia">20.000</p>
                            </div>
                            <div class="div-tongcong">
                                <p class="p-thanhtoan">tổng cộng :</p>
                                <p class="p-gia tongcong" id="tongtien"><?php echo gennum($_SESSION['giohang']['tong']+20000) ?></p>
                            </div>
                            <div>
                                <button class="btn nutsp thanhtoansp" id="thanhtoansp">Hoàn Tất Thanh Toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './app/views/include/footer.php' ?>
</body>
</html>
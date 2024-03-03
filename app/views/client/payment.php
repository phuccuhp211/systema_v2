<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './app/views/include/lib.php' ?>
	<title>Kết Quả Thanh Toán</title>
	<link rel="stylesheet" href="<?php echo plrc ?>css/payment.css">
</head>
<body>
	<?php include './app/views/include/header.php' ?>
    <?php include './app/views/include/modal.php' ?>

    <?php
    	if ($server == "vnpay") {
    		require_once("./app/api/vnpay_php/config.php");
	        $vnp_SecureHash = $_GET['vnp_SecureHash'];
	        $inputData = array();
	        foreach ($_GET as $key => $value) {
	            if (substr($key, 0, 4) == "vnp_") {
	                $inputData[$key] = $value;
	            }
	        }
	        unset($inputData['vnp_SecureHash']);
	        ksort($inputData);
	        $i = 0;
	        $hashData = "";
	        foreach ($inputData as $key => $value) {
	            if ($i == 1) {
	                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
	            } else {
	                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
	                $i = 1;
	            }
	        }
	        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    	}    
    ?>

    <div class="main-cont pmrs">
    	<?php if ($server == "vnpay") { ?>
    		<div class="dheader pmsv" pmsv="<?php echo $server ?>">
	            <h3 class="text-center m-0" style="color: #6246a8;">Cổng Thanh Toán VNPay</h3>
	        </div>
	        <div class="dbody">
	            <div class="form-group">
	                <label >Mã đơn hàng: </label><label><?php echo $_GET['vnp_TxnRef'] ?></label>
	            </div>    
	            <div class="form-group">
	                <label >Số tiền: </label><label><?php echo number_format($_GET['vnp_Amount']/100,0,",",".") ?> VNĐ</label>
	            </div>  
	            <div class="form-group">
	                <label >Nội dung thanh toán: </label><label><?php echo $_GET['vnp_OrderInfo'] ?></label>
	            </div> 
	            <div class="form-group">
	                <label >Mã phản hồi (vnp_ResponseCode): </label><label><?php echo $_GET['vnp_ResponseCode'] ?></label>
	            </div> 
	            <div class="form-group">
	                <label >Mã GD Tại VNPAY: </label><label><?php echo $_GET['vnp_TransactionNo'] ?></label>
	            </div> 
	            <div class="form-group">
	                <label >Mã Ngân hàng: </label><label><?php echo $_GET['vnp_BankCode'] ?></label>
	            </div> 
	            <div class="form-group">
	                <label >Thời gian thanh toán: </label><label><?php echo $_GET['vnp_PayDate'] ?></label>
	            </div> 
	            <div class="form-group">
	                <label >Kết quả: </label>
	                <label>
	                    <?php
	                    if ($secureHash == $vnp_SecureHash) {
	                        if ($_GET['vnp_ResponseCode'] == '00') {
	                            echo "<span style='color:blue; font-weight:600;'>Giao Dich Thanh cong</span>";
	                        } else {
	                            echo "<span style='color:red; font-weight:600;'>Giao Dich Khong thanh cong</span>";
	                        }
	                    } else {
	                        echo "<span style='color:red'>Chu ky khong hop le</span>";
	                    }
	                    ?>
	                </label>
	            </div> 
	        </div>
    	<?php } ?>    


    </div><a href="<?php echo urlmd ?>/" class="a-hoantat">Quay Về Tranh Chủ<a> 

    <?php include './app/views/include/footer.php' ?>
</body>
</html>
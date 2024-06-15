<?php 
namespace App\Controllers;

use App\Controllers\BaseController as Base;
use App\Models\user_model as UserM;
use DateTime;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

class user_controller extends Base{
	private $umodel;
	private $header;

    function __construct() {
    	parent::__construct('client');
        $this->umodel = new UserM();
        $this->header = $this->header();
    }

	function header() {
		$phanloai = $this->umodel->fullpl();
		$danhmuc = $this->umodel->fulldm();
		if(isset($_SESSION['udone'])) {
			$nguoidung = $this->umodel->getuser($_SESSION['phiennguoidung']);
			return [
            'phanloai' => $phanloai,
            'danhmuc' => $danhmuc,
            'nguoidung' => $nguoidung
        ];
		}
		return [
            'phanloai' => $phanloai,
            'danhmuc' => $danhmuc
        ];
	}

	function phantrang($loai_data=null, $dulieu=null, $soluong_page=null, $loai=null) {
		$lpt= "";
		$base_url = urlmd;
		if (isset($loai)) {
			if (isset($dulieu)) {
				for ($i = 1; $i <= $soluong_page; $i++) {
					$lpt.= " <button class=\"a-pt\" data-type=\"$loai_data\" data=\"$dulieu\" page=\"$i\" type=\"$loai\" >  $i </button>";
				}
			}
			else {
				for ($i = 1; $i <= $soluong_page; $i++) {
					$lpt.= " <button class=\"a-pt\" data-type=\"$loai_data\" page=\"$i\" type=\"$loai\" >  $i </button>";
				}
			}
		}
		else {
			if (isset($dulieu)) {
				for ($i = 1; $i <= $soluong_page; $i++) {
					$lpt.= " <button class=\"a-pt\" data-type=\"$loai_data\" data=\"$dulieu\" page=\"$i\">  $i </button>";
				}
			}
			else {
				for ($i = 1; $i <= $soluong_page; $i++) {
					$lpt.= " <button class=\"a-pt\" data-type=\"$loai_data\" page=\"$i\">  $i </button>";
				}
			}
		}
		return $lpt;
	}

	function boloc($loai_data=null, $dulieu=null) {
		$bl = "";
		$base_url = urlmd;
		if (isset($dulieu)) {
			$bl.= "
				<div class=\"col-3 phan-boloc\">
	                <div class=\"dropdown\">
	                    <button class=\"boloc dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Bộ Lọc</button>
	                    <ul class=\"dropdown-menu\">
	                        <li>
	                        	<button class=\"dropdown-item boloc-act\" data-type=\"$loai_data\" data=\"$dulieu\" data-phanloai=\"1\">Mới Nhất</button>
	                        </li>
	                        <li>
	                        	<button class=\"dropdown-item boloc-act\" data-type=\"$loai_data\" data=\"$dulieu\" data-phanloai=\"2\">Cũ Nhất</button>
	                        </li>
	                        <li>
	                        	<button class=\"dropdown-item boloc-act\" data-type=\"$loai_data\" data=\"$dulieu\" data-phanloai=\"3\">Giá Từ Thấp -> Cao</button>
	                        </li>
	                        <li>
	                        	<button class=\"dropdown-item boloc-act\" data-type=\"$loai_data\" data=\"$dulieu\" data-phanloai=\"4\">Giá Từ Cao -> Thấp</button>
	                        </li>
	                    </ul>
	                </div>
	            </div>
			";
			return $bl;
		}
		else {
			$bl.= "
				<div class=\"col-3 phan-boloc\">
	                <div class=\"dropdown\">
	                    <button class=\"boloc dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Bộ Lọc</button>
	                    <ul class=\"dropdown-menu\">
	                        <li>
	                        	<button class=\"dropdown-item boloc-act\" data-type=\"$loai_data\" data-phanloai=\"1\">Mới Nhất</button>
	                        </li>
	                        <li>
	                        	<button class=\"dropdown-item boloc-act\" data-type=\"$loai_data\" data-phanloai=\"2\">Cũ Nhất</button>
	                        </li>
	                        <li>
	                        	<button class=\"dropdown-item boloc-act\" data-type=\"$loai_data\" data-phanloai=\"3\">Giá Từ Thấp -> Cao</button>
	                        </li>
	                        <li>
	                        	<button class=\"dropdown-item boloc-act\" data-type=\"$loai_data\" data-phanloai=\"4\">Giá Từ Cao -> Thấp</button>
	                        </li>
	                    </ul>
	                </div>
	            </div>
			";
			return $bl;
		}
	}

	public function errorl() {
		$data = [
            'newsp' => $this->umodel->spnew(),
            'hotsp' => $this->umodel->sphot(),
            'header' => $this->header,
        ];
		$this->loadview('error',$data);
	}

	public function index() {
		$this->umodel->upview_index();
		$bocuc = $this->umodel->layout();
		$arr_bocuc = [];

		for ($i = 0; $i < count($bocuc) ; $i++) {
			$sanpham = $this->umodel->splay($bocuc[$i]['id_type'],$bocuc[$i]['id_cata'],$bocuc[$i]['ref'],$bocuc[$i]['ord']);
			array_push($arr_bocuc, [
				'tieude' => $bocuc[$i],
				'sanpham' => $sanpham
			]);
		}

		$data = [
			'header' => $this->header,
			'banner' => $this->umodel->gbanner(),
			'cbpc' => $this->umodel->cbpc(),
			'bocuc' => $arr_bocuc,
			'sanpham' => $this->umodel->fullsp1()
        ];
		$this->loadview('index',$data);
		/*$json = $this->umodel->manual();
		echo "<br>";
		echo json_encode($json);
		echo "</br>";*/
	}

	public function config() {
		if (isset($this->header['nguoidung'])) {
			if (isset($_POST['id']) && !isset($_POST['pass1']) && !isset($_POST['pass2'])) {
				$id = $_POST['id'];
				$ho = $_POST['ho'];
				$ten = $_POST['ten'];
				$sdt = $_POST['sdt'];
				$email = $_POST['email'];
				$diachi = $_POST['diachi'];
				$this->umodel->updatetk($id,$ho,$ten,$sdt,$email,$diachi);
				$_SESSION['update_popup'] = "Cập nhật thành công !!!";
			}
			else if (isset($_POST['pass1']) || isset($_POST['pass2'])) {
				$id = $_POST['id'];
				$pass1 = $_POST['pass1'];
				$pass2 = $_POST['pass2'];

				if ($pass1 == "" || $pass2 == "") $_SESSION['dmk-popup'] = "Vui lòng điền mật khẩu mới";
				else if ($pass1 != $pass2) $_SESSION['dmk-popup'] = "Mật khẩu không trùng khớp";

				if(!isset($_SESSION['dmk-popup'])) {
					$this->umodel->doimatkhau($id,md5($pass2));
					$_SESSION['update_popup'] = "Cập nhật thành công";
				}

				header("Location: ".urlmd."/config/");
				exit();
			}
			else {
				$list_hd = $this->umodel->gethd($this->header['nguoidung'][0]['user']);
				$data = [
					'header' => $this->header,
					'list_hd' => $list_hd,
				];
				$this->loadview('config', $data);
			}
		} 
		else {
			header("Location: ".urlmd."/");
			exit();
		} 
	}

	public function quenmatkhau() { 
		if (isset($_POST['tendn'])) {
			$tendn = $_POST['tendn'];
			$_SESSION['send_mail'] = true;
			if ($tendn == "" || $tendn == "rong") $_SESSION['qmkvl'] = "<h3 class=\"popup popup-do\">Điền tên tài khoản</h3>";
			else {
				$getuser = $this->umodel->checkuser();
				foreach ($getuser as $value => $item) {
					if ($tendn != $item['user']) {
						$_SESSION['qmkvl'] = "<h3 class=\"popup popup-do\">Tài khoản không tồn tại</h3>";
					}
					else {
						if ($item['email'] == "") {
							$_SESSION['qmkvl'] = "<h3 class=\"popup popup-do\">Chưa kích hoạt Email</h3>";
							break;
						}
						else {
							$_SESSION['qmkvl'] = "<h3 class=\"popup popup-xanh\">Đã gửi Mail, vui lòng kiểm tra</h3>";
							$_SESSION['rand_pass'] = rand(100000,999999);
							$duongdan = urlmd;
							$id = $item['id'];
							$noidung = "
							    <table style=\"width: 600; border-collapse: collapse; margin: 0 auto;\">
							    	<tr style=\"color: white; background: #927ec4;\">
							    		<td colspan=\"4\" style=\"border: 1px solid black; padding: 15px; font-size: 20px;\">Email xác nhận đổi mật khẩu.</td>
							    	</tr>
							        <tr>
							            <td colspan=\"3\" style=\"border: 1px solid black; text-align: center; padding: 10px 0; font-size: 18px;\">Mật khẩu mới :</th>
							            <td colspan=\"1\" style=\"border: 1px solid black; text-align: center; padding: 10px 0; font-size: 18px;\">".$_SESSION['rand_pass']."</th>
							        </tr>
							        <tr>
							        	<td colspan=\"4\" style=\"border: 1px solid black; padding: 10px 0; font-size: 18px;\">Nhấp vào đường link phía dưới để cập nhật Mật Khẩu</td>
							        </tr>
							        <tr>
							        	<td colspan=\"4\" style=\"border: 1px solid black; padding: 10px 0; font-size: 18px;\">
							        		<a href=\"".$duongdan."/admk/".$id."/\">".$duongdan."/admk/".$id."/</a>
							        	</td>
							        </tr>;
								</table>";

							$mail = new PHPMailer(true);
							$mail->SMTPDebug = SMTP::DEBUG_OFF;                    
						    $mail->isSMTP();                                          
						    $mail->Host       = 'smtp.gmail.com';                     
						    $mail->SMTPAuth   = true;                                   
						    $mail->Username   = 'phuccuhp211@gmail.com';                
						    $mail->Password   = 'gmwghhndjyfdmbzm';        
						    $mail->SMTPSecure = 'ssl';                       
						    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
						    $mail->Port       = 465;
						    $mail->setFrom('phuccuhp211@gmail.com', 'SYSTEMA');   
						    $mail->addAddress($item['email']);
						    $mail->isHTML(true);                                  
						    $mail->Subject = "Thu Xac Nhan Lay Lai Mat Khau";
						    $mail->Body    = $noidung;

						    try {
							    $mail->send();
							} catch (Exception $e) {
							    $_SESSION['qmkvl'] = "<h3 class=\"popup popup-do\">Không thể kết nối tới máy chủ</h3>";
							}

							break;
						}	
					}
				}
			}
			header("Location: ".urlmd."/quenmk/");exit();
			exit();
		}
		else $this->loadview('quenmatkhau', ['header' => $this->header]);
	}

	public function admk($id) {
		if ($_SESSION['send_mail'] == true) {
			$this->umodel->doimatkhau($id,md5($_SESSION['rand_pass']));
			unset($_SESSION['rand_pass']);
			unset($_SESSION['send_mail']);
			$_SESSION['qmkvl'] = "<h3 class=\"popup popup-xanh\">Đổi Mật Khẩu Thành Công</h3>";
			header("Location: ".urlmd."/quenmk/");
			exit();
		}
		else {
			$_SESSION['qmkvl'] = "<h3 class=\"popup popup-do\">Mail đã được sử dụng</h3>";
			header("Location: ".urlmd."/quenmk/");
			exit();
		}	
	}

	public function addcart() {
	    $id = $_POST['idsp'];
	    $sanpham = $this->umodel->spcart($id);
	   
	    unset($sanpham[0]['id_type'], $sanpham[0]['id_cata'], $sanpham[0]['id_brand'], $sanpham[0]['mdetail'], $sanpham[0]['viewed'], $sanpham[0]['hidden'], $sanpham[0]['saled']);
	    
	    $sanpham[0]['soluong'] = isset($_POST['slsp']) ? $_POST['slsp'] : 1;
	    $sanpham[0]['thanhtien'] = $sanpham[0]['price_sale'] != 0 ? $sanpham[0]['price_sale'] * $sanpham[0]['soluong'] : $sanpham[0]['price'] * $sanpham[0]['soluong'];
	    if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = ['dssp' => [], 'tong' => 0];

	    $trunglap = false;

	    foreach ($_SESSION['giohang']['dssp'] as $value => $item) {
	        if ($item['id'] == $id) {
	            $_SESSION['giohang']['dssp'][$value]['soluong'] += $sanpham[0]['soluong'];
	            $_SESSION['giohang']['dssp'][$value]['thanhtien'] += $sanpham[0]['thanhtien'];
	            $trunglap = true;
	            break;
	        }
	    }
	    if (!$trunglap) $_SESSION['giohang']['dssp'][] = $sanpham[0];
	    $_SESSION['giohang']['tong'] += $sanpham[0]['thanhtien'];
	    $this->total();
	    var_dump($_SESSION['giohang']);
	}

	public function delcart() {
	    $key = $_POST['delspcart'];
	    if (isset($_SESSION['giohang']['dssp'][$key])) {
	        $_SESSION['giohang']['tong'] -= $_SESSION['giohang']['dssp'][$key]['thanhtien'];
	        unset($_SESSION['giohang']['dssp'][$key]);
	    }
	    $this->loadview('giohang', ['header' => $this->header]);
	}

	public function delallcart() {
	    $_SESSION['giohang'] = ['dssp' => [], 'tong' => 0];
	    if (isset($_SESSION['udone'])) {
	        $nguoidung = $this->umodel->getuser($_SESSION['phiennguoidung']);
	        $this->umodel->update_cart($nguoidung[0]['id'], '');
	    }
	    $this->loadview('giohang', ['header' => $this->header]);
	}

	public function muangay($id) {
	    $this->umodel->upview_nonin();
	    $sanpham = $this->umodel->spcart($id);
	    unset($sanpham[0]['id_type'], $sanpham[0]['id_cata'], $sanpham[0]['id_brand'], $sanpham[0]['mdetail'], $sanpham[0]['viewed'], $sanpham[0]['hidden'], $sanpham[0]['saled']);

	    $sanpham[0]['soluong'] = isset($_POST['slsp']) ? $_POST['slsp'] : 1;
	    $sanpham[0]['thanhtien'] = $sanpham[0]['price_sale'] != 0 ? $sanpham[0]['price_sale'] * $sanpham[0]['soluong'] : $sanpham[0]['price'] * $sanpham[0]['soluong'];

	    if (!isset($_SESSION['giohang'])) {
	        $_SESSION['giohang'] = ['dssp' => [], 'tong' => 0];
	    }

	    $trunglap = false;
	    foreach ($_SESSION['giohang']['dssp'] as $value => $item) {
	        if ($item['id'] == $id) {
	            $_SESSION['giohang']['dssp'][$value]['soluong'] += $sanpham[0]['soluong'];
	            $trunglap = true;
	            break;
	        }
	    }

	    if (!$trunglap) {
	        $_SESSION['giohang']['dssp'][] = $sanpham[0];
	    }

	    $_SESSION['giohang']['tong'] += $sanpham[0]['thanhtien'];

	    $this->total();

	    if (!isset($_POST['slsp'])) {
	        header("Location: " . urlmd . "/thanhtoan/");
	    }
	}

	public function updatecart() {
		$keysp = $_POST['id'];
		$soluong = $_POST['num'];

		foreach ($_SESSION['giohang']['dssp'] as $value => &$item) {
            if ($item['id'] == $keysp) {
                $item['soluong'] = $soluong;
                $item = $this->cal_price($item);
                break;
            }
        }

        $this->total();

	    if (isset($_SESSION['udone'])) {
	        $nguoidung = $this->umodel->getuser($_SESSION['phiennguoidung']);
	        $this->umodel->update_cart($nguoidung[0]['id'], json_encode($_SESSION['giohang']));
	    }

	    echo "<pre>";
	    var_dump($_SESSION['giohang']);
	    echo "</pre>";
	}

	public function total() {
        $total = 0;
        foreach ($_SESSION['giohang']['dssp'] as $value => $item) {
            $item = $this->cal_price($item);
            $total += $item['thanhtien'];
        }
        $_SESSION['giohang']['tong'] = $total;
    }

    public function cal_price($prod) {
        $now = new DateTime();
	    $f_date = isset($prod['from_date']) ? new DateTime($prod['from_date']) : null;
	    $t_date = isset($prod['to_date']) ? new DateTime($prod['to_date']) : null;
        if ($f_date == null && $t_date == null ) $prod['thanhtien'] = (($prod['price_sale'] != 0) ? $prod['soluong'] * $prod['price_sale'] : $prod['soluong'] * $prod['price']);
        else if ($f_date > $now || $t_date < $now) $prod['thanhtien'] = $prod['soluong'] * $prod['price'];
        else $prod['thanhtien'] = $prod['soluong'] * $prod['price_sale'];
        return $prod;
    }

	public function ktbh() {
		if (isset($_POST['mahd'])) {
			$mahd = $_POST['mahd'];

			$ketqua = $this->umodel->kthd($mahd);
			if (!isset($ketqua[0])) echo "false";
			else {
				$hd_cr = date("d-m-Y", strtotime($ketqua[0]['created']));

				if ($ketqua[0]['submited'] != "0000-00-00" || !$ketqua[0]['submited']) {
					$date1 = $hd_su = date("d-m-Y", strtotime($ketqua[0]['submited']));
					$date2 = new DateTime($ketqua[0]['submited']);
					$date2->add(new DateInterval('P3Y'));
					$date3 = $date2->format('d-m-Y');
					$ndbh = "<h5>Đơn hàng được bảo hành từ : <strong style=\"color:red;\">$date1</strong> đến <strong style=\"color:red;\">$date3</strong></h5>";
				}
				else {
					$hd_su = "Đang chờ xác nhận";
					$ndbh = "<h5>Đơn hàng đang chờ được xác nhận bởi quản trị viên</h5>";
				}
					
				$list_sp = ""; $i = 1;
				$dssp = json_decode($ketqua[0]['dssp'],true);
				foreach ($dssp as $value => $item) {
					if ($item['price_sale'] != 0) $dg = number_format($item['price_sale'],0,",",".");
					else $dg = number_format($item['price'],0,",",".");
					$tt = number_format($item['thanhtien'],0,",",".");

					$list_sp .= "
						<tr>
							<td style=\"font-size: 16px; padding: 5px 0;text-align: center;\">".$i."</td>
							<td style=\"font-size: 16px; padding: 5px 0 5px 10px\">".$item['name']."</td>
							<td style=\"font-size: 16px; padding: 5px 0;text-align: center;\">".$item['soluong']."</td>
							<td style=\"font-size: 16px; padding: 5px 0 5px 10px\">$dg</td>
							<td style=\"font-size: 16px; padding: 5px 0 5px 10px\">$tt</td>
						</tr>
					";
					$i++;
				}

				if ($ketqua[0]['thanhtien2'] != 0) {
					$tongket = "
							<tr>
								<td colspan=\"3\" class=\"tc-dssp\"><strong>Tạm Tính :</strong></td>
								<td colspan=\"2\" class=\"tc-dssp\"><strong>".number_format($ketqua[0]['thanhtien'],0,",",".")."</strong></td>
							</tr>
							<tr>
								<td colspan=\"3\" class=\"tc-dssp\"><strong>Giá Giảm :</strong></td>
								<td colspan=\"2\" class=\"tc-dssp\"><strong>".number_format(($ketqua[0]['thanhtien']-$ketqua[0]['thanhtien2']+20000),0,",",".")."</strong></td>
							</tr>
							<tr>
								<td colspan=\"3\" class=\"tc-dssp\"><strong>Tổng Cộng :</strong></td>
								<td colspan=\"2\" class=\"tc-dssp\"><strong>".number_format($ketqua[0]['thanhtien2'],0,",",".")."</strong></td>
							</tr>
					";
				}
				else {
					$tongket = "
							<tr>
								<td colspan=\"3\" class=\"tc-dssp\"><strong>Tổng Cộng :</strong></td>
								<td colspan=\"2\" class=\"tc-dssp\"><strong>".number_format($ketqua[0]['thanhtien']+20000,0,",",".")."</strong></td>
							</tr>
					";
				}

				$response = "
					<div class=\"col-8 offset-2 cthd\">
						<h2>Thông Tin Hóa Đơn</h2>
						<div class=\"tt-ngmua\">
							<table style=\"margin: 0 0 20px; font-size: 18px;\">
								<tr>
									<td style=\"padding: 5px 0;width: 50%; border-bottom: 1px solid gray\" colspan=\"2\">
										Mã Hóa Đơn : <strong style=\"color: #6246a8;\">".$ketqua[0]['SHD']."</strong>
									</td>
								</tr>
								<tr>
									<td style=\"padding: 5px 0;width:50%;\">Ngày Tạo Đơn : 
										<strong style=\"color: #6246a8;\">$hd_cr</strong>
									</td>
									<td style=\"padding: 5px 0;\">Ngày Xác Nhận Đơn : 
										<strong style=\"color: #6246a8;\">$hd_su</strong>
									</td>
								</tr>
							</table>
							<table class=\"tt-user\">
								<tr>
									<td class=\"ttct-user\">Tên Người mua :</td>
									<td><strong>".$ketqua[0]['name']."</strong></td>
								</tr>
								<tr>
									<td class=\"ttct-user\">Số Điện Thoại :</td>
									<td><strong>".$ketqua[0]['sdt']."</strong></td>
								</tr>
								<tr>
									<td class=\"ttct-user\">Email : </td>
									<td><strong>".$ketqua[0]['email']."</strong></td>
								</tr>
								<tr>
									<td class=\"ttct-user\">Địa Chỉ :</td>
									<td><strong>".$ketqua[0]['dc']."</strong></td>
								</tr>
							</table>
						</div>
						<table class=\"dssp\">
							<tr>
								<th style=\"width: 8%;\">STT</th>
								<th style=\"width: 50%;\">Tên Hàng Hóa, Dịch Vụ</th>
								<th style=\"width: 8%;\">SL</th>
								<th style=\"width: 17%;\">Đơn Giá</th>
								<th style=\"width: 17%;\">Thành Tiền</th>
							</tr>
							$list_sp
							<tr>
								<td style=\"font-size: 16px; padding: 5px 0;text-align: center;\">X</td>
								<td style=\"font-size: 16px; padding: 5px 0 5px 10px\">Phí vận chuyển</td>
								<td style=\"font-size: 16px; padding: 5px 0;text-align: center;\">X</td>
								<td style=\"font-size: 16px; padding: 5px 0 5px 10px\">20.000</td>
								<td style=\"font-size: 16px; padding: 5px 0 5px 10px\">20.000</td>
							</tr>
							$tongket
						</table>
						$ndbh
						<h6>Lưu ý : Bảo hành áp dụng cho toàn bộ sản phẩm có trong đơn hàng, khi đi bảo hành, quý khách vui lòng mang theo hộp (hoặc bao bì) của sản phẩm và kèm theo hóa đơn.</h6>
					</div>
				";

				echo $response;
			};
				
		}
		else $this->loadview('ktbh', ['header' => $this->header]);
	}

	public function rating() {
		if (isset($_SESSION['udone'])) {
			$nguoidung = $this->umodel->getuser($_SESSION['phiennguoidung']);
			$exist = $this->umodel->rating($nguoidung[0]['id'], $_POST['idsp']);
			if (!isset($exist[0])) $this->umodel->rating($nguoidung[0]['id'], $_POST['idsp'], 'plus',$_POST['rate']);
			else $this->umodel->rating($nguoidung[0]['id'], $_POST['idsp'], 'rert',$_POST['rate'], $exist[0]['stars']);
		}
	}

	public function applymgg() {
		$mgg = $_POST['mgg'];
		$ketqua = $this->umodel->checkmgg($mgg);
		if (isset($ketqua[0])) {
			$now = new DateTime();
	        $f_date = new DateTime($ketqua[0]['f_date']);
	        $t_date = new DateTime($ketqua[0]['t_date']);

			if ($ketqua[0]['remaining'] == 0) echo json_encode("out");
        	else if ($f_date > $now) echo json_encode("not");
        	else if ($t_date < $now) echo json_encode("exp");
        	else echo json_encode($ketqua[0]);
		}
		else echo json_encode("false");
	}

	public function getsp($loai_data=null,$data=null,$page=1) {
		$this->umodel->upview_nonin();
		$base_url = urlmd;
		$dulieu = [ 
			'header' => $this->header
		];
		
		if($loai_data == "tatca") {
			$bl = $this->boloc('sanpham/tatca');
			$phantrang = $this->umodel->phantrang();
		}
		else if($loai_data == "danhmuc") {
			$dulieu['tendanhmuc'] = $this->umodel->fulldm($data);
			$bl = $this->boloc('sanpham/danhmuc',$data);
			$phantrang = $this->umodel->phantrang($data);
		}
		else if($loai_data == "timkiem") {
			if (isset($_POST['tksp'])) $chuoitk = $_POST['tksp'];
			else if (isset($data)) $chuoitk = str_replace("_", " ", $data);

			$dulieu['chuoitk'] = $chuoitk;
			$bientam = str_replace(" ", "_", $chuoitk);
			$bl = $this->boloc('sanpham/timkiem',$bientam);
			$phantrang = $this->umodel->phantrang(null,$chuoitk);
		}
		else if($loai_data == "phanloai"){
			$dulieu['tenphanloai'] = $this->umodel->fullpl($data);
			$phantrang = $this->umodel->phantrang(null,null,$data);
			$bl = $this->boloc('sanpham/phanloai',$data);
		}

		if(!isset($_POST['xacthuc2'])) {
			if ($loai_data == "tatca") {
				$data=$page;
				$fullsp = $this->umodel->getsp('sanpham/'.$loai_data,null,$data,null);
			}
			else if (isset($chuoitk)) $fullsp = $this->umodel->getsp('sanpham/'.$loai_data,$chuoitk,$page,null);
			else $fullsp = $this->umodel->getsp('sanpham/'.$loai_data,$data,$page,null);

			if (isset($bientam)) $lpt = $this->phantrang('sanpham/'.$loai_data,$bientam,$phantrang[0]['pt']);
			else $lpt = $this->phantrang('sanpham/'.$loai_data,$data,$phantrang[0]['pt']);

			$dulieu['fullsp'] = $fullsp;
			$dulieu['lpt'] = $lpt;
			$dulieu['bl'] = $bl;

			if (isset($_POST['xacthuc1'])) echo $this->showsp($fullsp);
			else $this->loadview('sanpham', $dulieu);
		}
		else {
			$type = $_POST['type'];

			if(isset($_POST['loai'])) $loai = $_POST['loai'];
			else $loai = null;

			if (isset($_POST['data'])) $data = $_POST['data'];
			else $data = null;

			if ($loai_data == "tatca") {
				$data=$page;
				$fullsp = $this->umodel->getsp($type,null,$data,$loai,(isset($_POST['limit'])) ? $_POST['limit'] : 0);
			}
			else if (isset($chuoitk)) $fullsp = $this->umodel->getsp($type,$chuoitk,$page,null,(isset($_POST['limit'])) ? $_POST['limit'] : 0);
			else $fullsp = $this->umodel->getsp($type,$data,$page,$loai,(isset($_POST['limit'])) ? $_POST['limit'] : 0);

			$lpt = $this->phantrang($type,$data,$phantrang[0]['pt'],$loai);
			if ($loai_data == "timkiem") $response = array('sanpham' => $fullsp);
			else $response = array('sanpham' => $this->showsp($fullsp,(isset($_POST['showsp'])) ? $_POST['showsp'] : null), 'phantrang' => $lpt);
			
			echo json_encode($response);
		}
	}

	public function chitietsp($id) {
		$chitiet = $this->umodel->chitietsp($id);
		$data = [
			'header' => $this->header,
			'chitiet' => $chitiet,
			'splq' => $this->umodel->splq($chitiet[0]['id_cata']),
			'thuonghieu' => $this->umodel->thuonghieu($chitiet[0]['id_brand']),
			'dscmt' => $this->umodel->dscmt($id),
		];

		$rating = $this->umodel->getrate(null,$id);

		if (isset($_SESSION['udone'])) {
			$usrt = $this->umodel->getrate($this->header['nguoidung'][0]['id'], $id);
			$chuoi_btn = "";
			if(isset($usrt[0])) {
	            $offset = $usrt[0]['stars'];
	            $class_btn = "";
	            $idsp = $chitiet[0]['id'];

	            for ($i=1; $i <= 5; $i++) {
	                if ($i == $offset) $class_btn = "select-star";
	                else $class_btn = "";
	                $chuoi_btn.= "<div class=\"btn-stars $class_btn\" data-rate=\"$i\" data-idsp=\"$idsp\">$i Sao</div>";
	            }
			}
			else {
				for ($i=1; $i <= 5; $i++) {
	                $chuoi_btn.= "<div class=\"btn-stars\" data-rate=\"$i\" data-idsp=\"$id\">$i Sao</div>";
	            }
			}
			$data['button_rt'] = "<div class=\"box-btn-stars\">$chuoi_btn</div>";
		}
		if (isset($rating[0])) {
			$ss = $rating[0]['stars']/$rating[0]['turn'];
			$chuoi_stars = "";
            $num_star = floor($ss);
            $class_star = "color-star";

            for ($i=1; $i <= 5; $i++) {
                if ($i > $num_star) $class_star = "";
                $chuoi_stars.= "
                <i class=\"fa-regular fa-star $class_star\"></i>
                ";
            }

            $sps = "
            	<div class=\"sum-stars\">
                    <h2>$ss trên 5</h2>
		            <h5>$chuoi_stars</h5>        
                </div>
            ";
            $data['sps'] = $sps;
		}
		else {
			$sps = "
            	<div class=\"sum-stars\">
		            <h5 style=\"color: #ee4d2d;\">Sản phẩm chưa được đánh giá</h5>        
                </div>
            ";
            $data['sps'] = $sps;
        }

		$this->loadview('chitietsanpham',$data);
	}

	public function comments() {
		$umodel= new user_model();
		$noidung = $_POST['noidung'];
		$id_sp = $_POST['idpd'];
		$id_user = $_POST['idu'];
		$date = $_POST['date'];
		$this->umodel->addcmt($noidung,$id_sp,$id_user,$date);
	}

	public function giohang() { $this->loadview('giohang', ['header' => $this->header]); }

	public function thanhtoan() { $this->loadview('thanhtoan', ['header' => $this->header]); }

	public function hoantat() { $this->loadview('hoantat', ['header' => $this->header]); }

	public function hoadon() {
		if (!isset($_SESSION['user_temp']['pmmt'])) {
			$tenkh = $_POST['tenkh'];
			$emailkh = $_POST['emailkh'];
			$sdtkh = $_POST['sdtkh'];
			$dckh = $_POST['dckh'];
			$dssp = json_encode($_SESSION['giohang']);
			$thanhtien = $_SESSION['giohang']['tong'];
			$mxn = $_POST['mxn'];
			$date = date("Y-m-d",time());
			$thanhtien2 = "";
			$magg = "";

			if (isset($_POST['newtt'])) {
				$thanhtien2 = $_POST['newtt'];
				$magg = $_POST['magg'];
			}
			$this->umodel->hoadon($tenkh, $emailkh, $sdtkh, $dckh, $dssp, $thanhtien, $date, $mxn,$magg,$thanhtien2);
		}
		else {
			$tenkh = $_SESSION['user_temp']['tenkh'];
			$emailkh = $_SESSION['user_temp']['emailkh'];
			$sdtkh = $_SESSION['user_temp']['sdtkh'];
			$dckh = $_SESSION['user_temp']['dckh'];
			$dssp = $_SESSION['user_temp']['dssp'];
			$thanhtien = $_SESSION['user_temp']['thanhtien'];
			$mxn = $_SESSION['user_temp']['mxn'];
			$date = $_SESSION['user_temp']['date'];
			$thanhtien2 = $_SESSION['user_temp']['thanhtien2'];
			$magg = $_SESSION['user_temp']['magg'];
			$this->umodel->hoadon($tenkh, $emailkh, $sdtkh, $dckh, $dssp, $thanhtien, $date, $mxn,$magg,$thanhtien2,$_SESSION['user_temp']['pmmt']);
		}
	}

	public function sendmail() {
		if (!isset($_SESSION['user_temp']['pmmt'])) {
			$tenkh = $_POST['tenkh'];
			$emailkh = $_POST['emailkh'];
			$sdtkh = $_POST['sdtkh'];
			$dckh = $_POST['dckh'];
			$mxn = $_POST['mxn'];
			$date = date("d - m - Y",time());
		}
		else {
			$tenkh = $_SESSION['user_temp']['tenkh'];
			$emailkh = $_SESSION['user_temp']['emailkh'];
			$sdtkh = $_SESSION['user_temp']['sdtkh'];
			$dckh = $_SESSION['user_temp']['dckh'];
			$mxn = $_SESSION['user_temp']['mxn'];
			$date = $_SESSION['user_temp']['date'];
		}

		$checkhd = $this->umodel->kthd($mxn);
		if(!isset($checkhd[0])) {
			if (isset($_POST['newtt']) || isset($_SESSION['user_temp']['thanhtien2']) && $_SESSION['user_temp']['thanhtien2'] > 0) {
				$giagoc = intval($_SESSION['giohang']['tong'] ? $_SESSION['giohang']['tong'] : $_SESSION['user_temp']['thanhtien']);
				$giamoi = intval(isset($_POST['newtt']) ? $_POST['newtt'] : $_SESSION['user_temp']['thanhtien2']);
				$giagiam = $giagoc - $giamoi + 20000;
				$thanhtien = intval(isset($_POST['newtt']) ? $_POST['newtt'] : $_SESSION['user_temp']['thanhtien2']);

				$tongket = "
						<tr style=\"color: white; background: #927ec4;\">
							<td style=\"border: 1px solid black; padding:3px; font-size: 20px; text-align: center;\" colspan=\"3\">Tạm Tính :</td>
						    <td style=\"border: 1px solid black; padding:3px; font-size: 20px; text-align: center;\">". number_format($giagoc, 0, '', '.') ."</td>
						</tr>
						<tr style=\"color: white; background: #927ec4;\">
							<td style=\"border: 1px solid black; padding:3px; font-size: 20px; text-align: center;\" colspan=\"3\">Giảm :</td>
						    <td style=\"border: 1px solid black; padding:3px; font-size: 20px; text-align: center;\">". number_format($giagiam, 0, '', '.') ."</td>
					    </tr>
					    <tr style=\"color: white; background: #927ec4;\">
						    <td style=\"border: 1px solid black; padding:3px; font-size: 20px; text-align: center;\" colspan=\"3\">Tổng Cộng :</td>
						    <td style=\"border: 1px solid black; padding:3px; font-size: 20px; text-align: center;\">". number_format($thanhtien+20000, 0, '', '.') ."</td>
						</tr>
						";
				$this->umodel->divineMGG(isset($_POST['magg']) ? $_POST['magg'] : $_SESSION['user_temp']['magg']);
			}
			else {
				$thanhtien = $_SESSION['giohang']['tong'] ? $_SESSION['giohang']['tong'] : $_SESSION['user_temp']['thanhtien'];
				$tongket = "
						<tr style=\"color: white; background: #927ec4;\">
						    <td style=\"border: 1px solid black; padding:3px; font-size: 20px; text-align: center;\" colspan=\"3\">Tổng Cộng :</td>
						    <td style=\"border: 1px solid black; padding:3px; font-size: 20px; text-align: center;\">". number_format($thanhtien+20000, 0, '', '.') ."</td>
						</tr>
						";
			}

			$noidung = "
			<div style=\"width: 700px; margin: 0 auto; border: solid 1px #ccc;\">

				<h1 style=\"text-align: center; color: #745caf; margin: 20px 0;\">Hóa Đơn Điện Tử</h1>
				<h3 style=\"margin: 30px 0 0 50px;\">Mã Hóa Đơn :	<strong>$mxn</strong></h3>
				<h3 style=\"margin: 0 0 0 50px;\">Ngày Tạo HD :	<strong>$date</strong></h3>
				<h3 style=\"margin: 0 0 0 50px;\">Kính gửi : <strong>$tenkh</strong></h3>
				<h3 style=\"margin: 0 0 0 50px;\">Địa Chỉ :  <strong>$dckh</strong></h3>
				<h4 style=\"text-align: center; margin: 20px 0;\"><strong>CHÚNG TÔI GỬI ĐẾN QUÝ KHÁCH HÀNG HÓA ĐƠN MUA HÀNG</strong></h4>

			    <table style=\"width: 600px; border-collapse: collapse; margin: 0 auto;\">
			        <tr style=\"color: white; background: #927ec4;\">
			            <th style=\"border: 1px solid black; text-align: center; padding: 5px 0; font-size: 18px;\">STT</th>
			            <th style=\"border: 1px solid black; text-align: center; padding: 5px 0; font-size: 18px;\">Tên Sản Phẩm</th>
			            <th style=\"border: 1px solid black; text-align: center; padding: 5px 0; font-size: 18px;\">Số lượng</th>
			            <th style=\"border: 1px solid black; text-align: center; padding: 5px 0; font-size: 18px;\">Thành tiền</th>
			        </tr>";
					foreach ($_SESSION['giohang'] ? $_SESSION['giohang']['dssp'] : json_decode($_SESSION['user_temp']['dssp'],true) as $value => $item) {
					    $noidung .= "<tr>
					        <td style=\"padding: 3px; font-size: 15px; border: 1px solid black; width: 50px; text-align: center;\">". $value+1 ."</td>
					        <td style=\"padding: 3px 5px; font-size: 15px; border: 1px solid black; width: 400px\">". $item['name'] ."</td>
					        <td style=\"padding: 3px; font-size: 15px; border: 1px solid black; width: 100px; text-align: center;\">". $item['soluong'] ."</td>
					        <td style=\"padding: 3px 10px; font-size: 15px; border: 1px solid black; width: 150px; text-align: right;\">". number_format($item['thanhtien'], 0, '', '.') ."</td>
					    </tr>";
					}
					$noidung .= 
					"<tr>
					    <td style=\"padding: 3px; font-size: 15px; border: 1px solid black; width: 50px; text-align: center;\">". (count($_SESSION['giohang']['dssp'])+1) ."</td>
					    <td style=\"padding: 3px 5px; font-size: 15px; border: 1px solid black; width: 400px\">Phí vận chuyển</td>
					    <td style=\"padding: 3px; font-size: 15px; border: 1px solid black; width: 100px; text-align: center;\">X</td>
					    <td style=\"padding: 3px 10px; font-size: 15px; border: 1px solid black; width: 150px; text-align: right;\">20.000</td>
					</tr>
					".$tongket."
				</table>

				<h4 style=\"margin: 50px 0;\">Chân thành cám ơn quý khách hàng đã tin tưởng dùng lựa chọn tại cửa hàng của chúng tôi. Chúng tôi sẽ chuẩn bị đơn hàng nhanh nhất có thể cho quý khách hàng.</h4>
			</div>";

			$mail = new PHPMailer(true);
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
		    $mail->isSMTP();                                          
		    $mail->Host       = 'smtp.gmail.com';           
		    $mail->SMTPAuth   = true;                                   
		    $mail->Username   = 'phuccuhp211@gmail.com';                
		    $mail->Password   = 'gmwghhndjyfdmbzm';        
		    $mail->SMTPSecure = 'ssl';                       
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
		    $mail->Port       = 465;
		    $mail->setFrom('phuccuhp211@gmail.com', 'SYSTEMA');   
		    $mail->addAddress($emailkh);
		    $mail->isHTML(true);                                  
		    $mail->Subject = "Hoa Don Dien Tu";
		    $mail->Body    = $noidung;
		    $mail->send();

		    unset($_SESSION['user_temp']);
		    $this->reset();
		}
	}

	public function pmrs($server,$step) {
		if($server == "vnpay") {
			if ($step == "s1") {
				if (!isset($_POST['tenkh'])) header("Location: ".urlmd);
				else {
					if (isset($_POST['newtt'])) {
						$thanhtien2 = $_POST['newtt'];
						$magg = $_POST['magg'];
					}
					else { $thanhtien2 = ""; $magg = ""; }
					$_SESSION['user_temp'] = [
						'tenkh' => $_POST['tenkh'],
						'emailkh' => $_POST['emailkh'],
						'sdtkh' => $_POST['sdtkh'],
						'dckh' => $_POST['dckh'],
						'dssp' => json_encode($_SESSION['giohang']),
						'thanhtien' => $_SESSION['giohang']['tong'],
						'mxn' => $_POST['mxn'],
						'date' => date("Y-m-d",time()),
						'thanhtien2' => $thanhtien2,
						'magg' => $magg,
						'pmmt' => $_POST['pmmt']
					];
				}
			}
			else if ($step == "s2") {
				if (isset($_GET['vnp_SecureHash'])) $this->loadview('payment', ['header' => $this->header, 'server' => $server]);
				else header("Location: ".urlmd);
			}
			else if ($step == "s3") {

			}
		}
	}

	public function reset() {
		unset($_SESSION['giohang']);
		if(isset($_SESSION['udone'])) {
			$nguoidung = $this->umodel->getuser($_SESSION['phiennguoidung']);
			$this->umodel->update_cart($nguoidung[0]['id'],'');
		}
	}

	public function login() {
		if (isset($_SESSION['udone'])) {
			header('Location: '.urlmd.'/'); 
		    exit();
		}
		else {
			$userpass = $this->umodel->checkuser();
			$uname = $_POST['user'];
			$upass = $_POST['pass'];
			$checkstep = 0;
			if ($uname == "") $_SESSION['dndk_err'] = "Vui lòng nhập tên tài khoản";
			if ($upass == "") $_SESSION['dndk_err'] = "Vui lòng nhập mật khẩu";
			foreach ($userpass as $value => $item) {
				if ($uname != $item['user']) {
					$_SESSION['dndk_err'] = "Tài khoản không tồn tại";
				}
				if ($uname == $item['user']) {
					unset($_SESSION['dndk_err']);
					if (md5($upass) != $item['pass']) {
						$_SESSION['dndk_err'] = "Sai mật khẩu";
						break;
					}
					if (md5($upass) == $item['pass']) {
						if ($item['ban'] == 2) {
							$_SESSION['dndk_err'] = "Tài khoản Đã Bị Khóa";
						}
						else {
							unset($_SESSION['dndk_err']);
							if($item['storage'] != '') $_SESSION['giohang'] = json_decode($item['storage'],true);
							else if (isset($_SESSION['giohang'])) $this->umodel->update_cart($item['id'],json_encode($_SESSION['giohang']['dssp']));
							$_SESSION['udone'] = "SUCESS";
						} 
						break;
					}
				}
			}
			if (isset($_SESSION['udone'])) {
			    $_SESSION['phiennguoidung'] = $uname;
			    header('Location: '.urlmd.'/'); 
			    exit();
			}
			else if (isset($_SESSION['dndk_err'])) {
			    header('Location: '.urlmd.'/'); 
			    exit();
			}
		}	
	}

	public function regis() {
		$userpass = $this->umodel->checkuser();
		
		$uname = $_POST['user'];
		$upass1 = $_POST['pass1'];
		$upass2 = $_POST['pass2'];

		$uho = $_POST['ho'];
		$uten = $_POST['ten'];
		$umail = $_POST['email'];
		$usdt = $_POST['sdt'];
		$udc = $_POST['diachi'];

		if ($uho==""||$uten==""||$umail==""||$usdt==""||$udc=="") $_SESSION['dndk_err'] = "Vui lòng điền đầy đủ thông tin";
		else if ($uname == "") $_SESSION['dndk_err'] = "Vui lòng nhập tên tài khoản";
		else if ($upass1 == "") $_SESSION['dndk_err'] = "Vui lòng nhập mật khẩu";
		else if ($upass2 == "") $_SESSION['dndk_err'] = "Vui lòng nhập lại mật khẩu";
		else if ($upass2 != "" && $upass1 != $upass2) $_SESSION['dndk_err'] = "Mật khẩu không khớp";

		foreach ($userpass as $value => $item) {
			if ($item['user'] == $uname) {
				$_SESSION['dndk_err'] = "Tài khoản đã tồn tại";
				break;
			}
		}

		if (isset($_SESSION['dndk_err'])) {
			header('Location: '.urlmd.'/'); 
			exit();
		}
		else {
			$_SESSION['udone2'] = "Đăng ký thành công";
			$this->umodel->regis($uname,md5($upass2),$uho,$uten,$usdt,$umail,$udc);
			header('Location: '.urlmd.'/'); 
			exit();
		}
	}

	public function logout() {
	    unset($_SESSION['udone']);
	    unset($_SESSION['dndk_err']);
	    header('Location: ' .urlmd. '/');
	    exit();
	}
} ?>
<?php 
namespace App\Controllers;

use App\Controllers\basecontroller as Base;
use App\Models\admin_model as AdminM;

class admin_controller extends Base {
	private $amodel;

    function __construct() {
    	parent::__construct('admin');
        $this->amodel = new AdminM();
    }

	public function index() {
		if (isset($_SESSION['adone'])) {
		    header('location: '.urlmd.'/manager/'); 
		    exit();
		}
		else $this->loadview('admin_log');
	}
	public function adlogin() {
		$userpass = $this->amodel->adlogin();
		$aname = $_POST['u_admin'];
		$apass = $_POST['p_admin'];
		if ($aname == "") $_SESSION['errlog'] = "Vui lòng nhập tên tài khoản";
		if ($apass == "") $_SESSION['errlog'] = "Vui lòng nhập mật khẩu";
		foreach ($userpass as $value => $item) {
			if ($aname != $item['user']) {
				$_SESSION['errlog'] = "Tài khoản không tồn tại";
			}
			if ($aname == $item['user']) {
				unset($_SESSION['errlog']);
				if (md5($apass) != $item['pass']) {
					$_SESSION['errlog'] = "Sai mật khẩu";
					break;
				}
				if (md5($apass) == $item['pass']) {
					unset($_SESSION['errlog']);
					$_SESSION['adone'] = "SUCESS";
					break;
				}
			}
		}
		if (isset($_SESSION['adone'])) {
		    header('location: '.urlmd.'/manager/'); 
		    exit();
		}
		else {
		    header('location: '.urlmd.'/admin/'); 
		    exit();
		}
	}
	public function manager($request = "") {
		if (!isset($_SESSION['adone'])) {
			unset($_SESSION['errlog']);
	        header('Location: ' .urlmd. '/admin/');
	        exit();
    	}
    	else {
    		unset($_SESSION['errlog']);
	    	if ($request != "") {
	    		if ($request == "qldm") {
	    			$data = [ 
	    				'danhmuc' => $this->amodel->fulldm(), 
	    				'phanloai' => $this->amodel->pldm()
	    			];
	    			$_SESSION['mng'] = "qldm";
	    		}
	    		else if ($request == "tdbc") {
	    			$data = [ 
	    				'tdbc' => $this->amodel->secs(),
	    				'danhmuc' => $this->amodel->fulldm(), 
	    				'phanloai' => $this->amodel->pldm()
	    			];
	    			$_SESSION['mng'] = "tdbc";
	    		}
	    		else if ($request == "slbn") {
	    			$data = [  'slbn' => $this->amodel->gbnn() ];
	    			$_SESSION['mng'] = "slbn";
	    		}
	    		else if ($request == "qlus") {
	    			$data = [ 'user' => $this->amodel->fullus() ];
	    			$_SESSION['mng'] = "qlus";
	    		}
	    		else if ($request == "qlsp") {
	    			$data = [
	    				'sanpham' => $this->amodel->fullsp(),
		    			'danhmuc' => $this->amodel->fulldm(),
		    			'phanloai' => $this->amodel->pldm(),
		    			'tksp' => $this->amodel->tksp(),
		    			'brand' => $this->amodel->fullth(),
	    			];
					$_SESSION['mng'] = "qlsp";
	    		}
	    		else if ($request == "hddh") {
	    			$data = [ 'hoadon' => $this->amodel->shd() ];
					$_SESSION['mng'] = "hddh";
	    		}
	    		else if ($request == "qlbl") {
	    			$data = [ 'binhluan' => $this->amodel->dsbl() ];
	    			$_SESSION['mng'] = "qlbl";
	    		}
	    		else if ($request == "magg") {
	    			$data = [ 'mgg' => $this->amodel->mgg() ];
	    			$_SESSION['mng'] = "magg";
	    		}
	    	}
	    	else {
	    		$data = [
    				'thunhap' => $this->amodel->thunhap(),
		    		'donhang' => $this->amodel->donhang(),
		    		'member' => $this->amodel->member(),
		    		'access' => $this->amodel->access(),
    			];
				$_SESSION['mng'] = "quanly";
	    	}
	    	$this->loadview('manager',$data);
    	}
	}
	public function adbl() {
		$filter = $_POST['data'];

		if ($filter == "sanpham") {
			if (isset($_POST['idsp'])) {
				$prod = $this->amodel->ajax($_POST['idsp'],null,null,'prod');
				if ($prod[0]['hidden'] == 0) $this->amodel->ajax($_POST['idsp'],1,null,'prod');
				if ($prod[0]['hidden'] == 1) $this->amodel->ajax($_POST['idsp'],0,null,'prod');
			}
			else if (isset($_POST['boloc'])) {
				$sanpham = $this->amodel->ajax(null,null,$_POST['boloc'],'prod');

				$show_sp = "";

				foreach ($sanpham as $value => $item) {
					$button ="";
					if($item['hidden'] == 0) {
						$button = "<button class=\"btn btn-warning suaxoa hidden hidsp\" data-idsp=\"".$item['id']."\"><i class=\"fa-solid fa-eye-slash\"></i></button>";
					} 
					else {
						$button = "<button class=\"btn btn-success suaxoa hidden unhidsp\" data-idsp=\"".$item['id']."\"><i class=\"fa-solid fa-eye\"></i></button>";
					}
					$show_sp .= "
						<tr class=\"sanpham\">
							<td rowspan=\"2\" class=\"text-center\">".$item['id']."</td>
							<td rowspan=\"2\" class=\"text-center\"><img src=\"".$item['img']."\" alt=\"\"></td>
							<td rowspan=\"2\" id=\"tensp\">".$item['name']."</td>
							<td rowspan=\"2\" id=\"in4sp\" style=\"overflow-hidden\">".$item['detail']."</td>
							<td id=\"min4sp\" hidden>".$item['mdetail']."</td>
							<td id=\"giasp\" class=\"text-center\">".number_format($item['price'],0,'','.')."</td>
							<td id=\"salesp\" class=\"text-center\">".number_format($item['price_sale'],0,'','.')."</td>
							<td rowspan=\"2\" class=\"text-center\">
								<button class=\"btn btn-primary suaxoa sua suasp\" data-idsp=\"".$item['id']."\"><i class=\"fa-solid fa-gear\"></i></button>
								<button class=\"btn btn-danger suaxoa xoa xoasp\" data-idsp=\"".$item['id']."\"><i class=\"fa-solid fa-trash\"></i></button>
								$button
							</td>
						</tr>
						<tr class=\"sanpham\">
							<td colspan=\"2\">Đã bán : ".$item['saled']."</td>
						</tr>
					";
				}

				echo $show_sp;
			}
		}
		else if ($filter == "taikhoan") {
			if (isset($_POST['idtk'])) {
				$user = $this->amodel->ajax($_POST['idtk'],null,null,'user');
				if ($user[0]['ban'] == 1) $this->amodel->ajax($_POST['idtk'],2,null,'user');
				if ($user[0]['ban'] == 2) $this->amodel->ajax($_POST['idtk'],1,null,'user');
			}
			else if (isset($_POST['boloc'])) {
				$taikhoan = $this->amodel->ajax(null,null,$_POST['boloc'],'user');

				$show_tk = "";
				$nut = "";

				foreach ($taikhoan as $value => $item) {
					if($item['ban'] == 1) {
						$nut = "
							<button class=\"btn btn-warning suaxoa ban banus\" data-idus=\"".$item['id']."\">
								<i class=\"fa-solid fa-ban\"></i>
							</button>";
					}
					else {
						$nut = "
							<button class=\"btn btn-success suaxoa ban unbanus\" data-idus=\"".$item['id']."\">
								<i class=\"fa-solid fa-check\"></i>
							</button>";
					}

					$show_tk .= "
						<tr class=\"taikhoan\">
							<td class=\"text-center\">".$item['id']."</td>
							<td id=\"tenus\">".$item['user']."</td>
							<td>".$item['ho']." ".$item['ten']."</td>
							<td id=\"sdtus\">".$item['sdt']."</td>
							<td id=\"emailus\" class=\"text-center\">".$item['email']."</td>
							<td id=\"roleus\" class=\"text-center\">".$item['role']."</td>
							<td class=\"text-center\">
								<button class=\"btn btn-primary suaxoa sua suaus\" data-idus=\"".$item['id']."\">
									<i class=\"fa-solid fa-gear\"></i>
								</button>
								<button class=\"btn btn-danger suaxoa xoa xoaus\" data-idus=\"".$item['id']."\">
									<i class=\"fa-solid fa-trash\"></i>
								</button>
								$nut
							</td>
						</tr>
					";
				}

				echo $show_tk;
			}
		}
		else if ($filter == "hoadon") {
			if (isset($_POST['id'])) {
				$this->amodel->ajax($_POST['id'],$_POST['stt'],null,'invo');
				if ($_POST['stt'] == "Hoàn Thành") {
					$hoadon = $this->amodel->ajax($_POST['id'],null,null,'invo');
					$dssp = json_decode($hoadon[0]['dssp'], true);
					foreach ($dssp as $value => $item) {
						$this->amodel->upsaled($item['id'],$item['soluong']);
					}
				}
			}
			else if (isset($_POST['boloc'])) {
				$hoadon = $this->amodel->ajax(null,null,$_POST['boloc'],'invo');

				$show_hd = "";

				foreach ($hoadon as $value => $item) {
					$dssp = json_decode($item['dssp'],true);
					$tc = number_format($item['thanhtien'],0,'','.');
					if (is_array($dssp)) $rp = count($dssp);
					else $rp = 0;
					$show_hd .= "
						<tr class=\"hoadon\">
							<td rowspan=\"$rp\" class=\"text-center p-0 id-hd\">".$item['id']."</td>
							<td rowspan=\"$rp\" class=\"text-start\">".$item['name']."</td>
							<td rowspan=\"$rp\" class=\"text-start\">
								Email: ".$item['email']."<br>
								SĐT: ".$item['sdt']."<br>
								Đ/C: ".$item['dc']."
							</td>
							<td class=\"text-start\">SL: ".$dssp[0]['soluong']." | ".$dssp[0]['name']."</td>
							<td rowspan=\"$rp\" class=\"text-center p-0\">$tc</td>
							<td rowspan=\"$rp\" class=\"text-center stt-hd\">".$item['trangthai']."</td>
							<td rowspan=\"$rp\" class=\"text-center\">
								<select name=\"trangthai\" class=\"hd-stt\" id=\"hd-stt\">
									<option value=\"Chuẩn Bị\">Chuẩn Bị</option>
									<option value=\"Đang Giao\">Đang Giao</option>
									<option value=\"Hoàn Thành\">Hoàn Thành</option>
									<option value=\"Hủy\">Hủy</option>
								</select>
								<button class=\"btn btn-success d-block mt-1 mx-auto hd-update\" id=\"hd-update\">Cập Nhật</button>
							</td>
						</tr>
					";
					for ($i = 1; $i < $rp ; ++$i) {
						$show_hd .="
							<tr class=\"hoadon\">
								<td style=\"text-align: left;\">SL: ".$dssp[$i]['soluong']." | ".$dssp[$i]['name']."</td>
							</tr>
						";
					}
				}

				echo $show_hd;
			}
		}
	}
	/*-----------------------------------------*/
	public function bnn_mng($rq = "", $id = 0) {
		if ($rq == "add") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$title = $_POST['ttbn'];
			$text = $_POST['txbn'];

			$img = $url_img = "";

			if (isset($_FILES["img"]) && $_FILES["img"]["error"] === UPLOAD_ERR_OK) {
				$img = urlmd . "/public/data/" . basename($_FILES["img"]["name"]);
				$url_img = "././public/data/" . basename($_FILES["img"]["name"]);
				$dinhdang = strtolower(pathinfo($img,PATHINFO_EXTENSION));
				if (file_exists($img)) $_SESSION['error_log'] .= "Poster đã tồn tại<br>";
				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg"
				&& $dinhdang != "gif" && $dinhdang != "pdf" && $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}
			}
			else $_SESSION['error_log'] = "Vui Lòng Chọn Banner";

			if (!isset($_SESSION['error_log'])) {
				if ($img != "") move_uploaded_file($_FILES["img"]["tmp_name"], $url_img);
				$this->amodel->addbnn($img,$title,$text);
			}
			
			header('Location: ' .urlmd. '/manager/slbn/');
		    exit();
		}
		else if ($rq == "fix") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$title = $_POST['ttbn'];
			$text = $_POST['txbn'];

			$img = $url_img = "";

			if (isset($_FILES["img"]) && $_FILES["img"]["error"] === UPLOAD_ERR_OK) {
				$img = urlmd . "/public/data/" . basename($_FILES["img"]["name"]);
				$url_img = "././public/data/" . basename($_FILES["img"]["name"]);
				$dinhdang = strtolower(pathinfo($img,PATHINFO_EXTENSION));
				if (file_exists($img)) $_SESSION['error_log'] .= "Poster đã tồn tại<br>";
				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg"
				&& $dinhdang != "gif" && $dinhdang != "pdf" && $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}
			}

			if (!isset($_SESSION['error_log'])) {
				if ($img != "") move_uploaded_file($_FILES["img"]["tmp_name"], $url_img);
				else $img = $_POST['old_img'];
				$this->amodel->fixbnn($id,$img,$title,$text);
			}
			header('Location: ' .urlmd. '/manager/slbn/');
		    exit();
		}
		else if ($rq == "del") {
			$this->amodel->delbnn($id);
			header('Location: ' .urlmd. '/manager/slbn/');
		    exit();
		}
	}
	/*-----------------------------------------*/
	public function lay_mng($rq = "", $id = 0) {
		if ($rq == "add") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$name = $_POST['name'];
			$type = $_POST['phanloai'];
			$cata = $_POST['danhmuc'];
			$refe = $_POST['ref'];
			$sxtt = $_POST['ord'];
			$sovt = $_POST['position'];

			$img1 =	 $img2 = "";
			$url_img1 =	 $url_img2 = "";

			if ($name == "") $_SESSION['error_log'] .= "Không để trống tên Layout";
			if ($sovt == "") $_SESSION['error_log'] .= "Không để trống vị trí";

			if (isset($_FILES["poster"]) && $_FILES["poster"]["error"] === UPLOAD_ERR_OK) {
				$img1 = urlmd . "/public/data/" . basename($_FILES["poster"]["name"]);
				$url_img1 = "././public/data/" . basename($_FILES["poster"]["name"]);
				$dinhdang = strtolower(pathinfo($img1,PATHINFO_EXTENSION));
				if (file_exists($img1)) $_SESSION['error_log'] .= "Poster đã tồn tại<br>";
				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg"
				&& $dinhdang != "gif" && $dinhdang != "pdf" && $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}
			}
			if (isset($_FILES["backgr"]) && $_FILES["backgr"]["error"] === UPLOAD_ERR_OK) {
				$img2 = urlmd . "/public/data/" . basename($_FILES["backgr"]["name"]);
				$url_img2 = "././public/data/" . basename($_FILES["backgr"]["name"]);
				$dinhdang = strtolower(pathinfo($img2,PATHINFO_EXTENSION));
				if (file_exists($img2)) $_SESSION['error_log'] .= "Ảnh Nền đã tồn tại<br>";
				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg"
				&& $dinhdang != "gif" && $dinhdang != "pdf" && $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}
			}

			if (!isset($_SESSION['error_log'])) {
				if ($img1 != "") move_uploaded_file($_FILES["poster"]["tmp_name"], $url_img1);
				if ($img2 != "") move_uploaded_file($_FILES["backgr"]["tmp_name"], $url_img2);
				$this->amodel->addlay($name,$img1,$img2,$type,$cata,$sovt,$refe,$sxtt);
			}
			header('Location: ' .urlmd. '/manager/tdbc/');
		    exit();
		}
		else if ($rq == "fix") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$name = $_POST['name'];
			$type = $_POST['phanloai'];
			$cata = $_POST['danhmuc'];
			$refe = $_POST['ref'];
			$sxtt = $_POST['ord'];
			$sovt = $_POST['position'];

			$img1 = $img2 = "";
			$url_img1 = $url_img2 = "";

			if ($name == "") $_SESSION['error_log'] .= "Không để trống tên Layout";
			if ($sovt == "") $_SESSION['error_log'] .= "Không để trống vị trí";

			if (isset($_FILES["poster"]) && $_FILES["poster"]["error"] === UPLOAD_ERR_OK) {
				$img1 = urlmd . "/public/data/" . basename($_FILES["poster"]["name"]);
				$url_img1 = "././public/data/" . basename($_FILES["poster"]["name"]);
				$dinhdang = strtolower(pathinfo($img1,PATHINFO_EXTENSION));
				if (file_exists($img1)) $_SESSION['error_log'] .= "Poster đã tồn tại<br>";
				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg"
				&& $dinhdang != "gif" && $dinhdang != "pdf" && $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}
			}
			if (isset($_FILES["backgr"]) && $_FILES["backgr"]["error"] === UPLOAD_ERR_OK) {
				$img2 = urlmd . "/public/data/" . basename($_FILES["backgr"]["name"]);
				$url_img2 = "././public/data/" . basename($_FILES["backgr"]["name"]);
				$dinhdang = strtolower(pathinfo($img2,PATHINFO_EXTENSION));
				if (file_exists($img2)) $_SESSION['error_log'] .= "Ảnh Nền đã tồn tại<br>";
				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg"
				&& $dinhdang != "gif" && $dinhdang != "pdf" && $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}
			}

			if (!isset($_SESSION['error_log'])) {
				if (isset($_FILES['poster']) && $_FILES['poster']['name'] != '' ) move_uploaded_file($_FILES["poster"]["tmp_name"], $url_img1);
				else $img1 = $_POST['old_img1'];
				if (isset($_FILES['backgr']) && $_FILES['backgr']['name'] != '' ) move_uploaded_file($_FILES["backgr"]["tmp_name"], $url_img2);
				else $img2 = $_POST['old_img2'];
				$this->amodel->fixlay($id,$name,$img1,$img2,$type,$cata,$sovt,$refe,$sxtt);
			}
			header('Location: ' .urlmd. '/manager/tdbc/');
		    exit();
		}
		else if ($rq == "del") {
			$this->amodel->dellay($id);
			header('Location: ' .urlmd. '/manager/tdbc/');
		    exit();
		}
	}
	/*-----------------------------------------*/
	public function pro_mng($rq = "", $id = 0) {
		if ($rq == "add") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$name = $_POST['name'];
			$price = $_POST['price'];
			$sale = $_POST['sale'];
			$salef = $_POST['salef'];
			$salet = $_POST['salet'];
			$pdtype = $_POST['pdtype'];
			$catalog = $_POST['catalog'];
			$brand = $_POST['brand'];
			$info = $_POST['info'];
			$infoct = $_POST['detail'];
			$checksp = $this->amodel->checksp($name);

			if ($name == "") $_SESSION['error_log'] .= "Không để trống tên sản phẩm !<br>";
			if (isset($checksp[0])) $_SESSION['error_log'] .= "sản phẩm đã tồn tại !<br>";
			if ($price == "") $_SESSION['error_log'] .= "Không để trống giá sản phẩm !<br>";
			if ($catalog == "" || $brand == "") $_SESSION['error_log'] .= "Không để trống danh mục hoặc hãng sản phẩm !<br>";
			if ($info == "") $_SESSION['error_log'] .= "Không để trống mô tả sản phẩm !<br>";

			if ($pdtype == 3) {
				if ($infoct == "") $_SESSION['errlog'] .= "Vui lòng nhập cấu hình và mã của máy !<br>";
				else  {
					preg_match('/(.*?)<p>end_info_pc<\/p>(.*?)/s', $infoct, $matches);
					$cbpc = json_encode([
						'doan1' => htmlspecialchars(str_replace('<p>end_info_pc</p>','',$matches[0])),
						'doan2' => htmlspecialchars($matches[1])
					]);
				}
			}

			$duongdan = urlmd . "/public/data/" . basename($_FILES["img"]["name"]);
			$duongdan_2nd = "././public/data/" . basename($_FILES["img"]["name"]);
			$dinhdang = strtolower(pathinfo($duongdan,PATHINFO_EXTENSION));

			if (file_exists($duongdan)) $_SESSION['error_log'] .= "File đã tồn tại<br>";
			if ($_FILES["img"]["size"] > 4096000) $_SESSION['error_log'] .= "Chỉ chấp nhận file dưới 4mb<br>";

			if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg" &&  $dinhdang != "webp") {
				$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
			}

			if (!isset($_SESSION['error_log'])) {
				move_uploaded_file($_FILES["img"]["tmp_name"], $duongdan_2nd);
				if ($pdtype == !3) $this->amodel->addpro($name,$duongdan,$price,$sale,$salef,$salet,$pdtype,$catalog,$brand,$info,htmlspecialchars($infoct));
				else $this->amodel->addpro($name,$duongdan,$price,$sale,$salef,$salet,$pdtype,$catalog,$brand,$info,$cbpc);
			}
			header('Location: ' .urlmd. '/manager/qlsp/');
		    exit();
		}
		else if ($rq == "fix") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$name = $_POST['name'];
			$price = $_POST['price'];
			$sale = $_POST['sale'];
			$salef = $_POST['salef'];
			$salet = $_POST['salet'];
			$pdtype = $_POST['pdtype'];
			$catalog = $_POST['catalog'];
			$brand = $_POST['brand'];
			$info = $_POST['info'];
			$infoct = $_POST['detail'];

			if ($name == "") $_SESSION['error_log'] .= "Không để trống tên sản phẩm !<br>";
			if ($price == "") $_SESSION['error_log'] .= "Không để trống giá sản phẩm !<br>";
			if ($catalog == "" || $brand == "") $_SESSION['error_log'] .= "Không để trống danh mục hoặc hãng sản phẩm !<br>";
			if ($info == "") $_SESSION['error_log'] .= "Không để trống mô tả sản phẩm !<br>";

			if ($pdtype == 3) {
					if ($infoct == "") $_SESSION['errlog'] .= "Vui lòng nhập cấu hình và mã của máy !<br>";
					else  {
						preg_match('/(.*?)<p>end_info_pc<\/p>(.*?)/s', $infoct, $matches);
						$matches[0] = str_replace(["\n", "\r"], "",$matches[0]);
						$matches[1] = str_replace(["\n", "\r"], "",$matches[1]);
						$cbpc = json_encode([
							htmlspecialchars(str_replace('<p>end_info_pc</p>','',$matches[0])),
							htmlspecialchars($matches[1])
						]);
					}
				}

			if (isset($_FILES['img']) && $_FILES['img']['name'] != '') {
				$duongdan = urlmd . "/public/data/" . basename($_FILES["img"]["name"]);
				$duongdan_2nd = "././public/data/" . basename($_FILES["img"]["name"]);
				$dinhdang = strtolower(pathinfo($duongdan,PATHINFO_EXTENSION));

				if (file_exists($duongdan)) $_SESSION['error_log'] .= "File đã tồn tại<br>";
				if ($_FILES["img"]["size"] > 4096000) $_SESSION['error_log'] .= "Chỉ chấp nhận file dưới 4mb<br>";

				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg" &&  $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}

				if (!isset($_SESSION['error_log'])) {
					move_uploaded_file($_FILES["img"]["tmp_name"], $duongdan_2nd);
					if ($pdtype == !3) $this->amodel->fixpro($id,$name,$duongdan,$price,$sale,$salef,$salet,$pdtype,$catalog,$brand,$info,htmlspecialchars($infoct));
					else $this->amodel->fixpro($id,$name,$duongdan,$price,$sale,$salef,$salet,$pdtype,$catalog,$brand,$info,$cbpc);
				}
				header('Location: ' .urlmd. '/manager/qlsp/');
			    exit();
			}

			else {
				$img_cu = $_POST['old_img'];
				if (!isset($_SESSION['error_log'])) {
					if ($pdtype == !3) $this->amodel->fixpro($id,$name,$img_cu,$price,$sale,$salef,$salet,$pdtype,$catalog,$brand,$info,htmlspecialchars($infoct));
					else $this->amodel->fixpro($id,$name,$img_cu,$price,$sale,$salef,$salet,$pdtype,$catalog,$brand,$info,$cbpc);
				}
				header('Location: ' .urlmd. '/manager/qlsp/');
			    exit();
			}
		}
		else if ($rq == "del") {
			$this->amodel->delpro($id);
			header('Location: ' .urlmd. '/manager/');
		    exit();
		}
	}
	/*-----------------------------------------*/
	public function cat_mng($rq = "", $id = 0) {
		if ($rq == "add") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$name = $_POST['name'];
			$phanloai = $_POST['phanloai'];
			$checkdm = $this->amodel->checkdm($name);

			if ($name == "") $_SESSION['error_log'] .= "Không để trống tên danh mục<br>";
			if (isset($checkdm[0])) $_SESSION['error_log'] .= "Danh mục đã tồn tại<br>";

			if (isset($_FILES["img"]) && $_FILES["img"]["error"] === UPLOAD_ERR_OK) {
				$duongdan = urlmd . "/public/data/" . basename($_FILES["img"]["name"]);
				$duongdan_2nd = "./public/data/" . basename($_FILES["img"]["name"]);
				$dinhdang = strtolower(pathinfo($duongdan,PATHINFO_EXTENSION));

				if (file_exists($duongdan)) $_SESSION['error_log'] .= "File đã tồn tại<br>";
				if ($_FILES["img"]["size"] > 4096000) $_SESSION['error_log'] .= "Chỉ chấp nhận file dưới 4mb<br>";

				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg"
				&& $dinhdang != "gif" && $dinhdang != "pdf" && $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}

				if (!isset($_SESSION['error_log'])) {
					move_uploaded_file($_FILES["img"]["tmp_name"], $duongdan_2nd);
					$this->amodel->addcat($name,$phanloai,$duongdan);
				}
			}
			if (!isset($_SESSION['error_log'])) $this->amodel->addcat($name,$phanloai);
				
			header('Location: ' .urlmd. '/manager/qldm/');
		    exit();
		}
		else if ($rq == "fix") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$name = $_POST['name'];
			$phanloai = $_POST['phanloai'];

			if ($name == "") $_SESSION['error_log'] .= "Không để trống tên danh mục<br>";
			if (isset($_FILES['img']) && $_FILES['img']['name'] != '') {
				$duongdan = urlmd . "/public/data/" . basename($_FILES["img"]["name"]);
				$duongdan_2nd = "./public/data/" . basename($_FILES["img"]["name"]);
				$dinhdang = strtolower(pathinfo($duongdan,PATHINFO_EXTENSION));

				if (file_exists($duongdan)) $_SESSION['error_log'] .= "File đã tồn tại<br>";
				if ($_FILES["img"]["size"] > 4096000) $_SESSION['error_log'] .= "Chỉ chấp nhận file dưới 4mb<br>";

				if($dinhdang != "jpg" && $dinhdang != "png" && $dinhdang != "jpeg"
				&& $dinhdang != "gif" && $dinhdang != "pdf" && $dinhdang != "webp") {
					$_SESSION['error_log'] .= "Chỉ chấp nhận file jpg, png, jpeg, gif, pdf<br>";
				}

				if (!isset($_SESSION['error_log'])) {
					move_uploaded_file($_FILES["img"]["tmp_name"], $duongdan_2nd);
					$this->amodel->fixcat($id,$name,$phanloai,$duongdan);
				}
				header('Location: ' .urlmd. '/manager/qldm/');
			    exit();
			}
			else {
				$img_cu = $_POST['old_img'];
				if (!isset($_SESSION['error_log'])) {
					move_uploaded_file($_FILES["img"]["tmp_name"], $duongdan_2nd);
					$this->amodel->fixcat($id,$name,$phanloai,$img_cu);
				}
				header('Location: ' .urlmd. '/manager/qldm/');
			    exit();
			}
		}
		else if ($rq == "del") {
			$this->amodel->delcat($id);
			header('Location: ' .urlmd. '/manager/qldm/');
		    exit();
		}
	}
	/*-----------------------------------------*/
	public function top_mng($rq = "", $id = 0) {
		if ($rq == "add") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$name = $_POST['name'];
			$checkpl = $this->amodel->checkpl($name);

			if ($name == "") $_SESSION['error_log'] .= "Không để trống tên phân loại<br>";
			if (isset($checkpl[0])) $_SESSION['error_log'] .= "\"Phân loại\" này đã tồn tại<br>";

			if (!isset($_SESSION['error_log'])) $this->amodel->addpl($name);
				
			header('Location: ' .urlmd. '/manager/qldm/');
		    exit();
		}
		else if ($rq == "fix") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);
			$name = $_POST['name'];
			$checkpl = $this->amodel->checkpl($name);

			if ($name == "") $_SESSION['error_log'] .= "Không để trống tên phân loại<br>";
			if (isset($checkpl[0])) $_SESSION['error_log'] .= "\"Phân loại\" này đã tồn tại<br>";

			if (!isset($_SESSION['error_log'])) $this->amodel->fixpl($id,$name);
				
			header('Location: ' .urlmd. '/manager/qldm/');
		    exit();
		}
		else if ($rq == "del") {
			$this->amodel->delpl($id);
			header('Location: ' .urlmd. '/manager/qldm/');
		    exit();
		}
	}
	/*-----------------------------------------*/
	public function unc_mng($rq = "", $id = 0) {
		if ($rq == "add") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);

			$name = $_POST['name'];
			$ho = $_POST['ho'];
			$ten = $_POST['ten'];
			$pass = $_POST['pass'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$diachi = $_POST['diachi'];
			$role = $_POST['role'];
			$checkus = $this->amodel->checkus($name);

			if ($ho==""||$ten==""||$email==""||$phone==""||$diachi=="") $_SESSION['error_log'] = "Vui lòng điền đầy đủ thông tin";
			else if ($name == "") $_SESSION['error_log'] .= "Không để trống tên người dùng<br>";
			else if ($pass == "") $_SESSION['error_log'] .= "Vui lòng nhập khẩu<br>";
			else if (isset($checkus[0])) $_SESSION['error_log'] .= "Người dùng đã tồn tại<br>";

			if (!isset($_SESSION['error_log'])) $this->amodel->addus($name,md5($pass),$ho,$ten,$phone,$email,$diachi,$role);
			header('Location: ' .urlmd. '/manager/qlus/');
		    exit();
		}
		else if ($rq == "fix") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);

			$name = $_POST['name'];
			$ho = $_POST['ho'];
			$ten = $_POST['ten'];
			$pass = $_POST['pass'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$diachi = $_POST['diachi'];
			$role = $_POST['role'];
			$checkus = $this->amodel->checkus($name);

			if ($ho==""||$ten==""||$email==""||$phone==""||$diachi=="") $_SESSION['dndk_err'] = "Vui lòng điền đầy đủ thông tin";
			else if ($name == "") $_SESSION['error_log'] .= "Không để trống tên người dùng<br>";
			else if ($pass == "") $_SESSION['error_log'] .= "Vui lòng nhập khẩu<br>";
			else if (isset($checkus[0])) $_SESSION['error_log'] .= "Người dùng đã tồn tại<br>";

			if (!isset($_SESSION['error_log'])) $this->amodel->fixus($id,$name,md5($pass),$ho,$ten,$phone,$email,$diachi,$role);
			header('Location: ' .urlmd. '/manager/qlus/');
		    exit();
		}
		else if ($rq == "del") {
			$this->amodel->delus($id);
			header('Location: ' .urlmd. '/manager/qlus/');
		    exit();
		}
	}
	/*-----------------------------------------*/
	public function dis_mng($rq = "", $id = 0) {
		if ($rq == "add") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);

			$name = $_POST['name'];
			$soluong = $_POST['soluong'];
			$fdate = $_POST['fd'];
			$tdate = $_POST['td'];
			$discount = $_POST['discount'];
			
			$checkus = $this->amodel->checkmgg($name);

			if ($name==""||$soluong==""||$fdate==""||$tdate==""||$discount=="") $_SESSION['error_log'] = "Vui lòng điền đầy đủ thông tin";
			else if (date('m-d-Y', strtotime($fdate)) >= date('m-d-Y', strtotime($tdate))) $_SESSION['error_log'] = "Thời hạn tối thiểu 1 ngày";
			else if (isset($checkus[0])) $_SESSION['error_log'] = "Mã đã tồn tại";

			if (!isset($_SESSION['error_log'])) $this->amodel->addmgg($name,$soluong,$soluong,$fdate,$tdate,$discount);
			header('Location: ' .urlmd. '/manager/magg/');
		    exit();
		}
		else if ($rq == "fix") {
			if(isset($_SESSION['error_log'])) unset($_SESSION['error_log']);

			$name = $_POST['name'];
			$fdate = $_POST['fd'];
			$tdate = $_POST['td'];
			$discount = $_POST['discount'];

			$checkus = $this->amodel->checkmgg($name);

			if ($name==""||$fdate==""||$tdate==""||$discount=="") $_SESSION['error_log'] = "Vui lòng điền đầy đủ thông tin";
			else if (date('m-d-Y', strtotime($fdate)) >= date('m-d-Y', strtotime($tdate))) $_SESSION['error_log'] = "Thời hạn tối thiểu 1 ngày";
			else if (isset($checkus[1])) $_SESSION['error_log'] = "Mã đã tồn tại";

			if (!isset($_SESSION['error_log'])) $this->amodel->fixmgg($id,$name,$fdate,$tdate,$discount);
			header('Location: ' .urlmd. '/manager/magg/');
		    exit();
		}
		else if ($rq == "del") {
			$this->amodel->delmgg($id);
			header('Location: ' .urlmd. '/manager/magg/');
		    exit();
		}
	}
	/*-----------------------------------------*/
	public function delbl($id) {
		$this->amodel->delbl($id);
		header('Location: ' .urlmd. '/manager/qlbl/');
	    exit();
	}
	public function info_cmt() {
		$data = $this->amodel->infobl($_POST['spcmt']);
		echo json_encode($data);
	}
	/*-----------------------------------------*/
	public function dangxuat() {
	    unset($_SESSION['adone']);
	    unset($_SESSION['errlog']);
	    header('Location: ' .urlmd. '/admin/');
	    exit();
	}
} ?>
<?php 
namespace App\Models;

use App\Models\basemodel as BaseM;

class user_model extends BaseM {
	public function manual() {return $this->getdata("SELECT * FROM hoadon");}
	public function gbanner() {return $this->getdata("SELECT * FROM banner");}
	public function layout() {return $this->getdata("SELECT * FROM sections WHERE ido > 0 ORDER BY id ASC");}
	public function upview_index() {$this->iuddata("UPDATE accessed SET trangchu = trangchu + 1");}
	public function upview_nonin() {$this->iuddata("UPDATE accessed SET trangcon = trangcon + 1");}
	public function fullsp1() {return $this->getdata("SELECT * FROM product WHERE hidden = 0 LIMIT 10");}
	public function cbpc() {return $this->getdata("SELECT * FROM product WHERE id_type = 3 OR id_type = 1 ORDER BY rand() LIMIT 2");}
	public function spnew() {return $this->getdata("SELECT * FROM product WHERE hidden = 0 ORDER BY id DESC LIMIT 5");}
	public function sphot() {return $this->getdata("SELECT * FROM product WHERE hidden = 0 ORDER BY viewed DESC LIMIT 5");}
	public function gethd($name) {return $this->getdata("SELECT * FROM hoadon WHERE name = '$name' ORDER BY id DESC");}
	public function kthd($mahd) {return $this->getdata("SELECT * FROM hoadon WHERE SHD = $mahd");}
	public function splq($idcata) {return $this->getdata("SELECT * FROM product WHERE id_cata = $idcata AND hidden = 0 LIMIT 5");}
	public function thuonghieu($brand) {return $this->getdata("SELECT name FROM brand WHERE id_brand = $brand");}
	public function addcmt($noidung, $spid, $uid, $ngay) {$this->iuddata("INSERT INTO comments VALUES ('','$noidung','$spid','$uid','$ngay')");}
	public function checkuser() {return $this->getdata("SELECT * FROM user WHERE role = 1");}
	public function checkmgg($mgg) {return $this->getdata("SELECT * FROM voucher WHERE name = '$mgg'");}
	public function divineMGG($name) {$this->iuddata("UPDATE voucher SET remaining = remaining - 1 WHERE name = '$name'");}
	public function getuser($name) {return $this->getdata("SELECT * FROM user where user = '$name'");}
	public function spcart($id) {return $this->getdata("SELECT * FROM product WHERE id = $id AND hidden = 0");}
	public function doimatkhau($id,$pass){$this->iuddata("UPDATE user SET pass = '$pass'WHERE id = $id");}
	public function update_cart($id,$cart) { $this->iuddata("UPDATE user SET storage = '$cart' WHERE id = $id");}

	public function fullsp($page) {
		$vitri = ($page*12)-12;
		return $this->getdata("SELECT * FROM product WHERE hidden = 0 LIMIT $vitri,12 ");
	}
	public function fullpl($id=null) {
		if (isset($id)) return $this->getdata("SELECT * FROM phanloai WHERE id = $id");
		if (!isset($id)) return $this->getdata("SELECT * FROM phanloai");
	}
	public function fulldm($id=null) {
		if (isset($id)) return $this->getdata("SELECT * FROM catalog WHERE id = $id");
		if (!isset($id)) return $this->getdata("SELECT * FROM catalog");
	}
	public function rating($idus=null, $idsp=null, $exist=null, $rate=null, $old_rt=null) {
		if (!isset($exist)) return $this->getdata("SELECT * FROM turnrt WHERE idus = $idus AND idsp = $idsp");
		
		else if ($exist == "plus") {
			$this->iuddata("INSERT INTO turnrt VALUES('','$idus','$idsp','$rate')");
			$ketqua = $this->getdata("SELECT * FROM rating WHERE idsp = $idsp");

			if (!isset($ketqua[0])) $this->iuddata("INSERT INTO rating VALUES('','$idsp','$rate',1)");
			else $this->iuddata("UPDATE rating SET stars = stars + $rate, turn = turn + 1 WHERE idsp = $idsp");
		}

		else if ($exist == "rert") {
			$this->iuddata("UPDATE turnrt SET stars = $rate");
			$this->iuddata("UPDATE rating SET stars = stars - $old_rt + $rate WHERE idsp = $idsp");
		}
	}
	public function getrate($idus=null, $idsp=null) {
		if (isset($idus)) return $this->getdata("SELECT * FROM turnrt WHERE idus = $idus AND idsp = $idsp");
		else return $this->getdata("SELECT * FROM rating WHERE idsp = $idsp");
	}
	public function getsp($type=null,$data=null,$page,$sapxep, $limit = 0) {
		$vitri = ($page*12)-12;
		$order= "";
		($limit != 0) ? $slsp = "LIMIT $limit" : $slsp = "LIMIT $vitri,12";
		

		if(isset($sapxep)) {
			if ($sapxep == 1) $order = "ORDER BY id DESC";
			else if ($sapxep == 2) $order = "ORDER BY id ASC";
			else if ($sapxep == 3) $order = "ORDER BY price ASC";
			else if ($sapxep == 4) $order = "ORDER BY price DESC";
		}
		else $order = "";
			
		if ($type == "sanpham/tatca") $sql = "SELECT * FROM product WHERE hidden = 0 $order $slsp";
		else if ($type == "sanpham/danhmuc") $sql = "SELECT * FROM product WHERE hidden = 0 AND  id_cata = $data $order $slsp";
		else if ($type == "sanpham/timkiem") $sql = "SELECT * FROM product WHERE hidden = 0 AND  name like \"%$data%\" $order $slsp";
		else if ($type == "sanpham/phanloai") {
			if ($data == 6) $sql = "SELECT * FROM product WHERE price_sale != 0 $order $slsp";
			if ($data == 7) $sql = "SELECT * FROM product ORDER BY saled DESC";
			else $sql = "SELECT * FROM product WHERE id_type = $data $order $slsp";
		}

		return $this->getdata($sql);
	}
	public function phantrang($iddm=null,$chuoitk=null,$idpl=null) {
		if (isset($iddm)) $sql = "SELECT CEILING(COUNT(*)/12) as pt FROM product WHERE id_cata = $iddm";
		else if (isset($chuoitk)) $sql = "SELECT CEILING(COUNT(*)/12) as pt FROM product WHERE name like  '%$chuoitk%'";
		else if (isset($idpl)) $sql = "SELECT CEILING(COUNT(*)/12) as pt
								FROM phanloai pl INNER JOIN catalog cat INNER JOIN product sp
								ON pl.id = cat.loai AND sp.id_cata = cat.id
								WHERE pl.id = $idpl";
		else {$sql = "SELECT CEILING(COUNT(*)/12) as pt FROM product";}

		return $this->getdata($sql);
	}
	public function chitietsp($id) {
		$this->iuddata("UPDATE product SET viewed = viewed + 1 WHERE id = $id");
		return $this->getdata("SELECT * FROM product WHERE id = $id AND hidden = 0");
	}
	public function splay($type,$cata,$ref,$ord) {
	    switch ($ord) {
	        case 1: $sx = "ORDER BY $ref ASC LIMIT 20"; break;
	        case 2: $sx = "ORDER BY $ref DESC LIMIT 20"; break;
	        case 3: $sx = "ORDER BY RAND() LIMIT 20"; break;
	        default: $sx = ""; break;
	    }
	    if ($type != 0 && $cata == 0) $sql = "SELECT * FROM product WHERE id_type = $type $sx";
	    else if ($type != 0 && $cata != 0 ) $sql = "SELECT * FROM product WHERE id_cata = $cata $sx";
	    else $sql = "SELECT * FROM product $sx";

	    return $this->getdata($sql);
	}
	public function dscmt($id) {
		return $this->getdata("SELECT * FROM comments INNER JOIN user WHERE comments.id_user = user.id AND id_pd = $id ORDER BY date DESC");
	}
	public function regis($name,$pass,$ho,$ten,$sdt,$email,$diachi) {
		$this->iuddata("INSERT INTO user VALUES ('','$name','$pass','$ho','$ten','$sdt','$email','$diachi','1','','1','')");
	}
	public function updatetk($id,$ho,$ten,$sdt,$email,$diachi){
		$this->iuddata("UPDATE user SET ho = '$ho', ten = '$ten', sdt = '$sdt', email = '$email', diachi = '$diachi' WHERE id = $id");
	}
	public function hoadon($ten,$email,$sdt,$dc,$dssp,$thanhtien,$date,$mxn,$mgg,$thanhtien2,$pmmt=null) {
		if (!$pmmt) $this->iuddata("INSERT INTO hoadon VALUES('','$ten','$sdt','$email','$dc','$dssp','$thanhtien','Chờ Xác Nhận','$date','','$mxn','$mgg','$thanhtien2')");
		else {
			$hoadon = $this->getdata("SELECT * FROM hoadon WHERE SHD = $mxn");
			if (!isset($hoadon[0])) {
				$this->iuddata("INSERT INTO hoadon VALUES('','$ten','$sdt','$email','$dc','$dssp','$thanhtien','Chờ Xác Nhận','$date','','$mxn','$mgg','$thanhtien2','$pmmt')");
			}
		} 
	}
} ?>
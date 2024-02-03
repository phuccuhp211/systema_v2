<?php 
namespace App\Models;

use App\Models\basemodel as BaseM;

class admin_model extends BaseM {
	public function adlogin() { return $this->getdata('SELECT * FROM user WHERE role = 0'); }

    public function secs() { return $this->getdata('SELECT * FROM sections ORDER BY id DESC'); }

    public function gbnn() { return $this->getdata('SELECT * FROM banner ORDER BY id DESC'); }

    public function fullsp() { return $this->getdata('SELECT * FROM product ORDER BY id DESC'); }

    public function fulldm() { return $this->getdata('SELECT * FROM catalog'); }

    public function pldm() { return $this->getdata('SELECT * FROM phanloai'); }

    public function fullus() { return $this->getdata('SELECT * FROM user'); }

    public function fullth() { return $this->getdata('SELECT * FROM brand'); }

    public function shd() { return $this->getdata("SELECT * FROM hoadon WHERE id > 0 ORDER BY id DESC"); }

    public function mgg() { return $this->getdata("SELECT * FROM voucher ORDER BY id DESC"); }

	public function upsaled($id,$soluong) { $this->iuddata("UPDATE product SET saled = saled + $soluong WHERE id = $id"); }

	public function ajax($id=null, $data=null, $filter=null, $type=null) {
		if ($type == "prod") {
			if (isset($data)) $this->iuddata("UPDATE product SET hidden = '$data' WHERE id = $id");

			else if (isset($id)) return $this->getdata("SELECT * FROM product WHERE id = $id");

			else if (isset($filter)) {
				if ($filter == 1) $sql = "SELECT * FROM product ORDER BY id DESC";
				else if ($filter == 2) $sql = "SELECT * FROM product ORDER BY saled DESC";
				else if ($filter == 3) $sql = "SELECT * FROM product ORDER BY viewed DESC";
				else if ($filter == 4) $sql = "SELECT * FROM product WHERE price_sale > 0 ORDER BY id DESC";
				else if ($filter == 5) $sql = "SELECT * FROM product WHERE hidden = 1 ORDER BY id DESC";
				return $this->getdata($sql);
			}
		}
		else if ($type == "user") {
			if (isset($data)) $this->iuddata("UPDATE user SET ban = $data WHERE id = $id");
			
			else if (isset($id)) return $this->getdata("SELECT * FROM user WHERE id = $id");

			else if (isset($filter)) {
				if ($filter == 1) $sql = "SELECT * FROM user ORDER BY id DESC";
				else if ($filter == 2) $sql = "SELECT * FROM user WHERE ban = 2 ORDER BY id DESC";
				else if ($filter == 3) $sql = "SELECT * FROM user WHERE ban = 1 ORDER BY id DESC";
				else if ($filter == 4) $sql = "SELECT * FROM user WHERE role = 1 ORDER BY id DESC";
				else if ($filter == 5) $sql = "SELECT * FROM user WHERE role = 0 ORDER BY id DESC";
				return $this->getdata($sql);
			}
		}
		else if ($type == "invo") {
			if (isset($id) && isset($data)) {
				$date = date("Y-m-d",time());
				$sql = "SELECT * FROM hoadon WHERE id = $id";
				$ketqua = $this->getdata($sql);
				if($ketqua[0]['submited'] == "0000-00-00") $this->iuddata("UPDATE hoadon SET trangthai = '$data', submited = '$date' WHERE id = $id");

				else {
					$this->iuddata("UPDATE hoadon SET trangthai = '$data' WHERE id = $id");
					if ($data == "Hoàn Thành") $this->iuddata("UPDATE accessed SET tt = tt + ".$ketqua[0]['thanhtien']);
				}
			}
			else if (isset($id)) return $this->getdata("SELECT * FROM hoadon WHERE id = $id");

			else if (isset($filter)) {
				if ($filter == 1) $sql = "SELECT * FROM hoadon ORDER BY id DESC";
				else if ($filter == 2) $sql = "SELECT * FROM hoadon WHERE trangthai = 'Chưa Xong' OR trangthai = 'Chờ Xác Nhận' ORDER BY id DESC";
				else if ($filter == 3) $sql = "SELECT * FROM hoadon WHERE trangthai = 'Chuẩn Bị' ORDER BY id DESC";
				else if ($filter == 4) $sql = "SELECT * FROM hoadon WHERE trangthai = 'Đang Giao' ORDER BY id DESC";
				else if ($filter == 5) $sql = "SELECT * FROM hoadon WHERE trangthai = 'Hoàn Thành' ORDER BY id DESC";
				else if ($filter == 6) $sql = "SELECT * FROM hoadon WHERE trangthai = 'Đã Hủy' ORDER BY id DESC";
				return $this->getdata($sql);
			}
		}
	}
	/*-----------------------------------------*/
	public function addlay($name,$img1,$img2,$type,$cata,$sovt,$refe,$sxtt) { $this->iuddata("INSERT INTO sections VALUES('','$name','$img1','$img2','$type','$cata','$sovt','$refe','$sxtt')"); }
	public function fixlay($id,$name,$img1,$img2,$type,$cata,$sovt,$refe,$sxtt) { $this->iuddata($sql = "UPDATE sections SET name = '$name', poster = '$img1', ebd_img = '$img2', id_type = '$type', id_cata = '$cata', ido = '$sovt', ref = '$refe', ord = '$sxtt' WHERE id = $id"); }
	public function dellay($id) { $this->iuddata("DELETE FROM sections WHERE id = $id");}
	/*-----------------------------------------*/
	public function thunhap() { return $this->getdata("SELECT SUM(thanhtien) as dutinh, tb.thunhap FROM hoadon INNER JOIN (SELECT SUM(thanhtien) as thunhap FROM hoadon WHERE trangthai = \"Hoàn Thành\") as tb"); }
	public function donhang() { return $this->getdata("SELECT COUNT(id) as tonghd, tb.hdht FROM hoadon INNER JOIN (SELECT COUNT(id) as hdht FROM hoadon WHERE trangthai = \"Hoàn Thành\")as tb"); }
	public function member() { return $this->getdata("SELECT COUNT(us.user) as ddk, cdk FROM user us, (SELECT COUNT(name) as cdk FROM (SELECT name FROM hoadon WHERE name NOT IN (SELECT user FROM user) GROUP BY name) as tb) as tb WHERE us.role = 1"); }
	public function access() { return $this->getdata("SELECT * FROM accessed"); }
	/*-----------------------------------------*/
	public function checksp($name) { return $this->getdata("SELECT * FROM product WHERE name = \"$name\""); }
	public function delpro($id) { $this->iuddata("DELETE FROM product WHERE id = $id"); }
	public function tksp() { return $this->getdata("SELECT dm.name, COUNT(pd.id) as soluong FROM catalog dm LEFT JOIN product pd ON dm.id = pd.id_cata GROUP BY dm.name"); }
	public function addpro($name,$duongdan,$price,$sale,$salef,$salet,$pdtype,$catalog,$brand,$info,$infoct) { $this->iuddata("INSERT INTO product VALUES('','$name','$duongdan','$info','$infoct','$pdtype','$catalog','$brand','$price','$sale','$salef','$salet','','','')"); }
	public function fixpro($id,$name,$duongdan,$price,$sale,$salef,$salet,$pdtype,$catalog,$brand,$info,$infoct) {
		$sql = "UPDATE product SET 
			name = '$name', 
			img = '$duongdan', 
			detail = '$info', 
			mdetail = '$infoct', 
			id_type = '$pdtype', 
			id_cata = '$catalog', 
			id_brand = '$brand', 
			price = '$price', 
			price_sale = '$sale', 
			from_date = '$salef', 
			to_date = '$salet' 
			WHERE id = $id";
		$this->iuddata($sql);
	}
	/*-----------------------------------------*/
	public function checkdm($name) { return $this->getdata("SELECT * FROM catalog WHERE name = \"$name\""); }
	public function addcat( $name, $phanloai, $duongdan = "") { $this->iuddata("INSERT INTO catalog VALUES('','$name','$phanloai','$duongdan')");}
	public function fixcat($id,$name, $phanloai, $duongdan) { $this->iuddata("UPDATE catalog SET name = '$name', loai = '$phanloai', img = '$duongdan' WHERE id = $id");}
	public function delcat($id) { $this->iuddata("DELETE FROM catalog WHERE id = $id"); }
	/*-----------------------------------------*/
	public function checkpl($name) { return $this->getdata("SELECT * FROM phanloai WHERE name = \"$name\"");}
	public function addpl($name) { $this->iuddata("INSERT INTO phanloai VALUES('','$name')"); }
	public function fixpl($id,$name) { $this->iuddata("UPDATE phanloai SET name = '$name' WHERE id = $id");}
	public function delpl($id) { $this->iuddata("DELETE FROM phanloai WHERE id = $id");}
	/*-----------------------------------------*/
	public function checkus($name) { return $this->getdata("SELECT * FROM user WHERE user = \"$name\"");}
	public function addus($name,$pass,$ho,$ten,$phone,$email,$diachi,$role) { $this->iuddata("INSERT INTO user VALUES('','$name','$pass','$ho','$ten','$phone','$email','$diachi','$role','','','')"); }
	public function fixus($id,$name,$pass,$ho,$ten,$phone,$email,$diachi,$role) { $this->iuddata($sql = "UPDATE user SET user = '$name', pass = '$pass', ho = '$ho', ten = '$ten', sdt = '$phone', email = '$email', diachi = '$diachi', role = '$role'WHERE id = $id"); }
	public function delus($id) { $this->iuddata("DELETE FROM user WHERE id = $id");}
	/*-----------------------------------------*/
	public function checkmgg($name) { return $this->getdata("SELECT * FROM voucher WHERE name = '$name'");}
	public function addmgg($name,$max,$remaining,$fd,$ft,$percent) {$this->iuddata("INSERT INTO voucher VALUES('','$name','$max','$remaining','$fd','$ft','$percent')");}
	public function fixmgg($id,$name,$fd,$td,$percent) { $this->iuddata("UPDATE voucher SET name = '$name', f_date = '$fd', t_date = '$td', percent = '$percent' WHERE id = $id"); }
	public function delmgg($id) { $this->iuddata("DELETE FROM voucher WHERE id = $id"); }
	/*-----------------------------------------*/
	public function dsbl() {
		$sql = "
		SELECT id, name, SUM(luot) as cmts, COUNT(id_user) as users FROM (
			SELECT id, name, COUNT(id_pd) as luot, id_user
			FROM product pd INNER JOIN comments cmt ON pd.id = cmt.id_pd
			GROUP BY id_pd, id_user) 
		AS TB GROUP BY name";
		return $this->getdata($sql);
	}
	public function delbl($id) { $this->iuddata("DELETE FROM comments WHERE id_cmt = $id"); }
	public function infobl($idsp) { return $this->getdata("SELECT * FROM comments WHERE id_pd = $idsp"); }
} ?>
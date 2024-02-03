<?php
	namespace App\Controllers;

	class basecontroller {
		public $permis;

		public function __construct($permis = '') {
	        $this->permis = $permis;
	    }

		public function loadview($file,array $data = null){
			$views = 'app/views/'.$this->permis.'/'.$file.'.php';
			if (file_exists($views)) {
				if(!is_null($data)) { extract($data); require_once $views; } 
				else require_once $views;
			}
			else echo 'Đường dẫn không hợp lệ';
		}

	    public function showsp($mangsp, $col = null, $advl = '') {
			$chuoisp = "";
			$colums = ($col) ? $col : "col-3";
		    foreach ($mangsp as $value => $item) {
		    	if ($item['price_sale'] != 0) { 
		    		$sale ="
		    			<span>"
		    				.number_format($item['price'],0,",",".")."
		    			</span>"
		    			.number_format($item['price_sale'],0,",",".");
		    	}
		    	else { $sale = number_format($item['price']);}
		    	$chuoisp.= "
		    	<div class=\"$colums text-center $advl\">
	                <div class=\"khungsp\">
	                    <div class=\"khungxam nav-item\">
	                        <a href=\"".urlmd."/chitiet/".$item['id']."/\" class=\"nav-link\">
	                        	<img src=\"".$item['img']."\" class=\"anhsp nav-link\" alt=\"\">
	                        </a>                               
	                    </div>                                
	                    <p class=\"tt tensp\">".$item['name']."</p>
	                    <p class=\"tt giasp\">".$sale."</p>
	                    <div class=\"nut_sp\">
	                        <a href=\"".urlmd."/muangay/".$item['id']."/\" class=\"btn nutsp\">Mua Ngay</a>
	                        <button class=\"btn nutsp addcart\" data-idsp=\"".$item['id']."\"><i class=\"fa-solid fa-cart-plus\"></i></button>
	                    </div>
	                </div>                    
	            </div>";
		    }
		    return $chuoisp;
		}
		public function showsp2($mangsp, $col = null, $advl = '') {
			$chuoisp = "";
			$colums = ($col) ? $col : "col-3";
		    foreach ($mangsp as $value => $item) {
		    	if ($item['price_sale'] != 0) { 
		    		$sale ="
		    			<span>"
		    				.number_format($item['price'],0,",",".")."
		    			</span>"
		    			.number_format($item['price_sale'],0,",",".");
		    	}
		    	else { $sale = number_format($item['price']);}
		    	$chuoisp.= "
		    	<div class=\"$colums text-center $advl\">
	                <div class=\"khungsp2\">
	                    <div class=\"khungxam nav-item\">
	                        <a href=\"".urlmd."/chitiet/".$item['id']."/\" class=\"nav-link\">
	                        	<img src=\"".$item['img']."\" class=\"anhsp nav-link\" alt=\"\">
	                        </a>                               
	                    </div>                                
	                    <p class=\"tt tensp\">".$item['name']."</p>
	                    <p class=\"tt giasp\">".$sale."</p>
	                    <p class=\"tt vnssp\">Lượt Xem : ".$item['viewed']." | Đã Bán : ".$item['saled']."</p>
	                    <div class=\"nut_sp\">
	                        <a href=\"".urlmd."/muangay/".$item['id']."/\" class=\"btn nutsp\">Mua Ngay</a>
	                        <button class=\"btn nutsp addcart\" data-idsp=\"".$item['id']."\"><i class=\"fa-solid fa-cart-plus\"></i></button>
	                    </div>
	                </div>                    
	            </div>";
		    }
		    return $chuoisp;
		}
	}
?>
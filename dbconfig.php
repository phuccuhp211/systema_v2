<?php 
	class dbconfig {
	    private $servername = "localhost";
	    private $username = "root";
	    private $password = "889484";
	    private $database = "systema_v2";
	    protected $ketnoi;

	    function __construct() {
	        try {
	            $this->ketnoi = new PDO("mysql:host={$this->servername};port=4940;dbname={$this->database};charset=utf8mb4", $this->username, $this->password);
	            $this->ketnoi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        } catch (PDOException $e) {
	            echo "Lỗi kết nối: " . $e->getMessage();
	            exit;
	        }
	    }

	    public function getKetnoi() {
	        return $this->ketnoi;
	    }
	}
?>
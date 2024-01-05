<?php 
	require_once '././dbconfig.php';

	class basemodel {
	    private $dbconfig;

	    function __construct() {
	        $this->dbconfig = new dbconfig();
	    }

	    public function getdata($sql) {
	        $data_args = array_slice(func_get_args(), 1);
	        $data = $this->dbconfig->getKetnoi()->prepare($sql);
	        $data->execute($data_args);
	        $row = $data->fetchAll(PDO::FETCH_ASSOC);
	        return $row;
	    }

	    public function iuddata($sql) {
	        $data_args = array_slice(func_get_args(), 1);
	        $data = $this->dbconfig->getKetnoi()->prepare($sql);
	        $data->execute($data_args);
	    }
	}
?>
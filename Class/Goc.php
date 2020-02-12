<?php require_once("Config.php") ?>
<?php 
 class Goc{
	protected $db;
	function __construct(){
		$this->db=new MySQLi(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$this->db->set_charset("utf8");
		
		
	}
}

?>
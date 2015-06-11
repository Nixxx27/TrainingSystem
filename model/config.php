<?php
include $model->page('connection.php');

class newEmployee {
	public $db,$countAll,$sql,$stmt;
	public function __construct(){
		$this->db = new connection();
		$this->db=$this->db->hrDbConnect();
	}

	public function countAll(){
		$this->sql ="SELECT COUNT(*) AS total FROM tms_notify";
		$this->stmt =$this->db->prepare($this->sql);
		$this->stmt->execute();
		$this->countAll =$this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

}//newEmployee

?>
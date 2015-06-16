<?php
include 'connection.php';

class connect{
		public $db,$dbConn,
			$hrConn,$stmt,$sql;

		public function __construct(){
		
		$this->db = new connection();
		$this->dbConn = $this->db->dbConnect();
		$this->hrConn = $this->db->hrDbConnect();
	}
}//connect


class newEmployee extends connect{
	public $countAll;

	public function __construct(){
		parent::__construct();
	}

	public function countAll(){
		$this->sql ="SELECT COUNT(*) AS total FROM tms_notify";
		$this->stmt =$this->hrConn->prepare($this->sql);
		$this->stmt->execute();
		return $this->countAll =$this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

}//newEmployee


class employee extends connect{
	public $idnum;

	public function __construct(){
		parent::__construct();
	}

	public function getEmpDetails($idNum,$empName){
	$this->idNum = $idNum;

	}
	public function viewEmpDetails(){

	$this->sql = "SELECT * FROM tms_notify WHERE stridnumber=?";
	$this->stmt = $this->hrConn->prepare($this->sql);
	$this->stmt->bindParam(1,$this->idNum, PDO::PARAM_STR);
	$this->stmt->execute();
	return $this->employee = $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

}//employee

?>
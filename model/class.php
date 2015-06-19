<?php
include 'connection.php';

class connect{
		public $db,$dbConn,
			$hrConn,$stmt,$sql,$rows;

		public function __construct(){
		
		$this->db = new connection();
		$this->db = $this->db->dbConnect();
	}
}//connect


class newEmployee extends connect{
	public $countAll;

	public function __construct(){
	parent::__construct();
	}

	public function countAll(){
		$this->sql ="SELECT COUNT(*) AS total FROM tms_notify";
		$this->stmt =$this->db->prepare($this->sql);
		$this->stmt->execute();
		return $this->countAll =$this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

}//newEmployee


class employee extends connect{
	public $idnum,$noRecord;
	public $strpicture,$stridnumber,$strfullname,$strcompany,
			$strdepartment,$strdateofhire,$stremploymentstatus,$strposition;
	public 	$training,$buttonAction;

	public function __construct(){
	parent::__construct();
	}

	public function getEmpDetails($idNum,$empName){
	$this->idNum = $idNum;

	}
	public function viewEmpDetails(){

	$this->sql = "SELECT * FROM tms_notify WHERE stridnumber=?";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->idNum, PDO::PARAM_STR);
	$this->stmt->execute();
	//return $this->employee = $this->stmt->fetchAll(PDO::FETCH_OBJ);
	if($this->stmt->rowCount()==1){
		while($this->rows= $this->stmt->fetch(PDO::FETCH_OBJ)){
			$this->noRecord = NULL;
			$this->strpicture = $this->rows->strpicture;
			$this->stridnumber = $this->rows->stridnumber;
			$this->strfullname = $this->rows->strfullname;
			$this->strcompany = $this->rows->strcompany;
			$this->strdepartment = $this->rows->strdepartment;
			$this->strdateofhire = $this->rows->strdateofhire;
			$this->stremploymentstatus = $this->rows->stremploymentstatus;
			$this->strposition = $this->rows->strposition;
		}
	}else{
		$this->strpicture = 'no_pics.png';
		$this->noRecord = '<h3><strong> No Record Found !</strong></h3>';
	}

	}

	public function getTraining($training,$stridnumber){
		$this->training =$training;
		$this->stridnumber =$stridnumber;
	}

	public function checkIfEnroll(){
	
	$this->sql = "SELECT * FROM tms_ml WHERE strtraining=? AND stridnumber=?";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->training, PDO::PARAM_INT);
	$this->stmt->bindParam(2,$this->stridnumber, PDO::PARAM_STR);
	$this->stmt->execute();
	//return $this->employee = $this->stmt->fetchAll(PDO::FETCH_OBJ);
	if($this->stmt->rowCount()){
		while($this->rows= $this->stmt->fetch(PDO::FETCH_OBJ)){
			$this->strtrainstat = $this->rows->strtrainstat;
			$this->buttonAction = "<form action='employeeTrainingDetails.php'>
			<button class='btn btn-info btn-sm'>view details</button>
			<input type='hidden' name='strstatus' value='$this->strtrainstat'>
			<input type='hidden' name='strtraining' value='$this->training'>
			</form>";

		}
	}else{
		$this->strtrainstat = "n/a";
		$this->buttonAction = "<button class='btn btn-primary btn-sm'>Enroll now</button>";
	}

	}


}//employee


class training extends connect {
	public $position;

	public function __construct(){
		parent::__construct();
	}

	public function getPosition($position){
		$this->position = $position;
	}

	public function trainingPerPosition(){
		$this->sql =
		"SELECT t.train_num_id,t.strtraining,t.strrecurrent 
		FROM pos_train_db p
		INNER JOIN training_tbl t ON
		t.train_num_id=p.train_num
		WHERE pos_name LIKE ?";

		$this->stmt = $this->db->prepare($this->sql);
		$this->stmt->bindParam(1,$this->position,PDO::PARAM_STR);
		$this->stmt->execute();

		return $this->rows = $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}
}//training

?>


<!--



-->
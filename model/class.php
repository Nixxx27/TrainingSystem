<?php
include 'connection.php';


function escape($string){
	return htmlentities(trim($string), ENT_QUOTES, 'UTF-8');

}

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
			$strdepartment,$strdateofhire,$stremploymentstatus,$strposition,
			$strtrainstat,$strtraindate,$strtraintimein,$strtraintimeout,
			$strtrainven,$strtrainor;

	public 	$training,$buttonAction;

	public function __construct(){
	parent::__construct();
	}

	public function getEmpDetails($idNum,$empName=null){
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
			<input type='hidden' name='tr' value='$this->training'>
			<input type='hidden' name='id' value='$this->stridnumber'>
			</form>";

		}
	}else{
	$this->strtrainstat = "n/a";
	$this->buttonAction = "<button class='btn btn-primary btn-sm'>Enroll now</button>";
	}

	}

	public function viewMLByIdNumber(){
	$this->sql = "SELECT * FROM tms_ml WHERE strtraining=? AND stridnumber=?";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->training,PDO::PARAM_STR);
	$this->stmt->bindParam(2,$this->stridnumber,PDO::PARAM_STR);
	$this->stmt->execute();

	if($this->stmt->rowCount()==1){
			while($this->rows = $this->stmt->fetch(PDO::FETCH_OBJ)){
				$this->strpicture 			= $this->rows->strpicture;
				$this->stridnumber 			= $this->rows->stridnumber;
				$this->strfullname 			= $this->rows->strfullname;
				$this->strcompany 			= $this->rows->strcompany;
				$this->strdepartment 		= $this->rows->strdepartment;
				$this->strdateofhire 		= $this->rows->strdateofhire;
				$this->stremploymentstatus 	= $this->rows->stremploymentstatus;
				$this->strposition 			= $this->rows->strposition;
				$this->strtraining 			= $this->rows->strtraining;
				$this->strtrainstat			= $this->rows->strtrainstat;
				$this->strtraindate			= $this->rows->strtraindate;
				$this->strtraintimein 		= $this->rows->strtraintimein;
				$this->strtraintimeout 		= $this->rows->strtraintimeout;
				$this->strtrainven			= $this->rows->strtrainven;
				$this->strtrainor			= $this->rows->strtrainor;

			}

		}
	}


}//employee


class training extends connect {
	public $position,$trainId,$trainingName;

	public function __construct(){
		parent::__construct();
	}

	public function getPosition($position){
		$this->position = $position;
	}

	public function getTrainingNumber($train_num_id){
		$this->trainId = $train_num_id;
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

	public function convertTrainNumber(){
		$this->sql = "SELECT strtraining,strrecurrent FROM training_tbl WHERE train_num_id =?";
		$this->stmt = $this->db->prepare($this->sql);
		$this->stmt->bindParam(1,$this->trainId,PDO::PARAM_INT);
		$this->stmt->execute();

		if($this->stmt->rowCount()==1){
			while($this->rows= $this->stmt->fetch(PDO::FETCH_OBJ)){
				$this->trainingName = $this->rows->strtraining;

			}

		}
	}

}//training

?>
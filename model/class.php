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
	public $id,$strpicture,$stridnumber,$strfullname,$strcompany,
			$strdepartment,$strdateofhire,$stremploymentstatus,$strposition,
			$strtrainstat,$strtraindate,$strtraintimein,$strtraintimeout,
			$strtrainven,$strtrainor,$positionLIstOption,
			$session_num,$session_date;

	public 	$training,$buttonAction;

	public function __construct(){
	parent::__construct();
	}

	public function getEmpDetails($idNum,$empName=null){
	$this->idNum = $idNum;

	}
	public function viewEmpDetails(){

	$this->sql = "SELECT * FROM emp_db WHERE emp_idnum =?";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->idNum, PDO::PARAM_STR);
	$this->stmt->execute();
	//return $this->employee = $this->stmt->fetchAll(PDO::FETCH_OBJ);
	if($this->stmt->rowCount()==1){
		while($this->rows= $this->stmt->fetch(PDO::FETCH_OBJ)){
			$this->noRecord = NULL;
			$this->emp_idnum = $this->rows->emp_idnum;
			$this->emp_pic = $this->rows->emp_pic;
			$this->emp_fullname = $this->rows->emp_fullname;
			$this->emp_company = $this->rows->emp_company;
			$this->emp_department  = $this->rows->emp_department ;
			$this->emp_dateofhire  = $this->rows->emp_dateofhire ;
			$this->emp_empstatus = $this->rows->emp_empstatus;
			$this->emp_position  = $this->rows->emp_position ;
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
			$this->buttonAction = "<form action='emp_TrainingDetails.php'>
			<button class='btn btn-info btn-sm'>view details</button>
			<input type='hidden' name='tr' value='$this->training'>
			<input type='hidden' name='id' value='$this->stridnumber'>
			</form>";

		}
	}else{
	$this->strtrainstat = "n/a";
	$this->buttonAction = "<form action='emp_EnrollEmployee.php'>
			<button class='btn btn-primary btn-sm'>Enroll now</button>
			<input type='hidden' name='tr' value='$this->training'>
			<input type='hidden' name='id' value='$this->stridnumber'>
			</form>";
	}

	}

	public function viewMLByIdNumber(){
	$this->sql = "SELECT *
	FROM tms_ml t INNER JOIN emp_db e
		ON  e.emp_idnum = t.stridnumber
	INNER JOIN trn_session s
		ON t.session_num_id = s.session_num
	WHERE strtraining=? AND stridnumber=?";
		$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->training,PDO::PARAM_STR);
	$this->stmt->bindParam(2,$this->stridnumber,PDO::PARAM_STR);
	$this->stmt->execute();

	if($this->stmt->rowCount()==1){
		while($this->rows = $this->stmt->fetch(PDO::FETCH_OBJ)){
			$this->emp_pic 				= $this->rows->emp_pic;
			$this->emp_idnum 			= $this->rows->emp_idnum;
			$this->emp_fullname 		= $this->rows->emp_fullname;
			$this->emp_company 			= $this->rows->emp_company;
			$this->emp_department 		= $this->rows->emp_department;
			$this->emp_dateofhire 		= $this->rows->emp_dateofhire;
			$this->emp_empstatus 		= $this->rows->emp_empstatus;
			$this->emp_position 		= $this->rows->emp_position;

			$this->strtraining 			= $this->rows->session_train_id;
			$this->strtrainstat			= $this->rows->strtrainstat;
			$this->session_date 		= $this->rows->session_date;
			$this->session_in 			= $this->rows->session_in;
			$this->session_out	 		= $this->rows->session_out;
			
			$this->strtraintimein 		= $this->rows->strtraintimein;
			$this->strtraintimeout 		= $this->rows->strtraintimeout;
			$this->session_venue		= $this->rows->session_venue;
			$this->session_trainor		= $this->rows->session_trainor ;
			}

		}
	}

	public function positionList(){
	$this->hrdb = new connection();
	$this->hrdb = $this->hrdb->hrDbConnect();
	
	$this->sql = "SELECT DISTINCT pos FROM depttable ORDER BY pos";
	$this->stmt = $this->hrdb->prepare($this->sql);
	$this->stmt->execute();

		if($this->stmt->rowCount()){
			while($this->rows = $this->stmt->fetch(PDO::FETCH_OBJ)){
			echo "<option>" . $this->rows->pos . "</option>";
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

	public function getTrainingID($id){
		$this->id = $id;
	}

	public function trainingPerPosition(){
		$this->sql =
		"SELECT t.train_num_id,t.strtraining,t.strrecurrent,p.ID
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

	public function trainingList(){
	$this->sql = "SELECT * FROM training_tbl ORDER BY strtraining";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->execute();

		if($this->stmt->rowCount()){
			while($this->rows = $this->stmt->fetch(PDO::FETCH_OBJ)){
			echo "<option value='" . $this->rows->train_num_id . "''>" . $this->rows->strtraining . "</option>";
			}
		}
	}


	public function trainingRecurrent($train_id){
	$this->sql = "SELECT train_num_id,strrecurrent 
			FROM training_tbl
			WHERE train_num_id =? LIMIT 1";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$train_id,PDO::PARAM_STR);
	$this->stmt->execute();

		if($this->stmt->rowCount()==1){
			while($this->rows = $this->stmt->fetch(PDO::FETCH_OBJ)){
			return $this->rows->strrecurrent;
			}
		}
	}


	public function addNewTrainingPerPosition(){
	$this->sql = "SELECT pos_name,train_num FROM pos_train_db WHERE pos_name =? AND train_num=?";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->position,PDO::PARAM_INT);
	$this->stmt->bindParam(2,$this->trainId,PDO::PARAM_INT);
	$this->stmt->execute();

		if($this->stmt->rowCount()==1){
			echo "<script type=text/javascript>alert('Error: Position and Training Already exist!');window.location.href='tr_TrainingPerPosition.php?search=$this->position';</script>";
		}else{
			$this->sql = "INSERT INTO pos_train_db (pos_name,train_num) VALUES (?,?)";
			$this->stmt = $this->db->prepare($this->sql);
			$this->stmt->bindParam(1,$this->position,PDO::PARAM_INT);
			$this->stmt->bindParam(2,$this->trainId,PDO::PARAM_INT);
			$this->stmt->execute();
				if($this->stmt->rowCount()==1){
				echo "<script type=text/javascript>alert('Successfully Added!');window.location.href='tr_TrainingPerPosition.php?search=$this->position';</script>";
				}
			}
	}


	public function editTrainingPerPosition(){
	$this->sql = "SELECT pos_name,train_num FROM pos_train_db WHERE pos_name =? AND train_num=?";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->position,PDO::PARAM_INT);
	$this->stmt->bindParam(2,$this->trainId,PDO::PARAM_INT);
	$this->stmt->execute();

		if($this->stmt->rowCount()==1){
			echo "<script type=text/javascript>alert('Error Duplicate Record found!');window.location.href='tr_TrainingPerPosition.php?search=$this->position';</script>";
		}else{
			$this->sql = "UPDATE pos_train_db SET pos_name=?,train_num=? WHERE ID=?";
			$this->stmt = $this->db->prepare($this->sql);
			$this->stmt->bindParam(1,$this->position,PDO::PARAM_INT);
			$this->stmt->bindParam(2,$this->trainId,PDO::PARAM_INT);
			$this->stmt->bindParam(3,$this->id,PDO::PARAM_INT);
			$this->stmt->execute();
				if($this->stmt->rowCount()==1){
					echo "<script type=text/javascript>alert('Successfully Updated!');window.location.href='tr_TrainingPerPosition.php?search=$this->position';</script>";
				}
			}
	}


	public function deleteTrainingPerPosition(){
	$this->sql = "DELETE FROM pos_train_db WHERE pos_name =? AND train_num=?";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->position,PDO::PARAM_INT);
	$this->stmt->bindParam(2,$this->trainId,PDO::PARAM_INT);
	$this->stmt->execute();

		if($this->stmt->rowCount()==1){
			echo 'success';  //for ajax
		}else{
			echo 'error';
		}
	}
	
	public function trainingSession(){
	$this->sql = "SELECT * FROM trn_session WHERE session_train_id =? ORDER BY ID DESC LIMIT 5";
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->bindParam(1,$this->trainId,PDO::PARAM_INT);
	$this->stmt->execute();

	if($this->stmt->rowCount()){
		return $this->rows = $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}else{
		$this->noTrainingSession= "<tr><td colspan='9' style='color:red;font-weight:bold'>No Training Schedule for this training! <button class='btn btn-primary btn-md'><i class='fa fa-calendar'></i> Create</button></td></tr>";
	}


	}



}//training



class pagination extends connect{
	public $employees,$total,$pages,$perPage;

	public function __construct(){
		parent::__construct();		
	}

	public function getSql($sql){
	$this->sql = $sql;
	}

	public function query(){
	$this->stmt = $this->db->prepare($this->sql);
	$this->stmt->execute();
	$this->employees = $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getPerPage($perPage){
	$this->perPage = $perPage;
	}

	public function pages(){
	$this->total = $this->db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
	$this->pages = ceil($this->total / $this->perPage);
	}

}


?>
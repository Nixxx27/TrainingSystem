<?php
//User input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 10;

//Order by ID Number
if(isset($_GET['orderById'])){
	$_SESSION['sortby'] = 'stridnumber';
}elseif(isset($_GET['orderByName'])){
	$_SESSION['sortby'] = 'strfullname';
}elseif(isset($_GET['orderByDept'])){
	$_SESSION['sortby'] = 'strdepartment';
}

//SearchBy
if(isset($_GET['search'])){
	$_SESSION['where']=$_GET['search'];
	$whereClauseKey ='%'. $_SESSION['where'] . '%';
}else{
	$whereClauseKey ='%';
}

$orderBy = (isset($_SESSION['sortby']))?$_SESSION['sortby']:'pos_name';

// Positioning
$start = ($page >1) ? ($page * $perPage) - $perPage : 0;

//Query
$db = new connection();
$db=$db->dbConnect();

$sql = 
	// "SELECT SQL_CALC_FOUND_ROWS	
	// ID, pos_name, train_num
	// FROM pos_train_db 
	// 	WHERE (pos_name LIKE '{$whereClauseKey}')
	// 	ORDER BY pos_name
	// LIMIT {$start}, {$perPage}"; //start with 0 & LIMIT 5
	
	"SELECT SQL_CALC_FOUND_ROWS	
		p.ID,p.pos_name,t.train_num_id,t.strtraining,t.strrecurrent 
	FROM pos_train_db p
	INNER JOIN training_tbl t ON
		t.train_num_id=p.train_num
	WHERE (p.pos_name LIKE '{$whereClauseKey}' 
			OR t.strtraining LIKE '{$whereClauseKey}' 
			OR t.strrecurrent LIKE '{$whereClauseKey}')
	ORDER BY pos_name
	LIMIT {$start}, {$perPage}"; //start with 0 & LIMIT 5


$stmt = $db->prepare($sql);
$stmt->execute();
$employees =$stmt->fetchAll(PDO::FETCH_OBJ);

//Pages
$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages =ceil($total / $perPage) //rounding up

?>
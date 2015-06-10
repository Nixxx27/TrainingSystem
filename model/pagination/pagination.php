<?php
//User input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 15;

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

//echo $orderBy =$_SESSION['sortby'];
$orderBy = (isset($_SESSION['sortby']))?$_SESSION['sortby']:'strfullname';

// Positioning
$start = ($page >1) ? ($page * $perPage) - $perPage : 0;

//Query
$db = new connection();
$db=$db->hrDbConnect();

$sql = 
	"SELECT SQL_CALC_FOUND_ROWS	
	ID, strpicture, stridnumber, strfullname, strcompany, strdepartment, strposition, strdateofhire
	FROM tms_notify 
		WHERE (stridnumber LIKE '{$whereClauseKey}' 
			OR strfullname LIKE '{$whereClauseKey}' 
			OR strdepartment LIKE '{$whereClauseKey}'
			OR strposition LIKE '{$whereClauseKey}')
		ORDER BY {$orderBy}
	LIMIT {$start}, {$perPage}"; //start with 0 & LIMIT 5

$stmt = $db->prepare($sql);
$stmt->execute();
$employees =$stmt->fetchAll(PDO::FETCH_OBJ);

//Pages
$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages =ceil($total / $perPage) //rounding up

?>
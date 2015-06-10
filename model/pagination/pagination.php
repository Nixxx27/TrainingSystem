<?php
//User input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 15;

//Order by ID Number
if(isset($_GET['orderById'])){
	$_SESSION['sortby'] = 'stridnumber';
		$_SESSION['orderByColorId']= "style='color:#1d1d1d'";
		$_SESSION['orderByColorName']= "";
		$_SESSION['orderByColorDept']= "";
}elseif(isset($_GET['orderByName'])){
	$_SESSION['sortby'] = 'strfullname';
		$_SESSION['orderByColorId']= "";
		$_SESSION['orderByColorName']= "style='color:#1d1d1d'";
		$_SESSION['orderByColorDept']= "";
}elseif(isset($_GET['orderByDept'])){
	$_SESSION['sortby'] = 'strdepartment';
		$_SESSION['orderByColorId']= "";
		$_SESSION['orderByColorName']= "";
		$_SESSION['orderByColorDept']= "style='color:#1d1d1d'";
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
	WHERE stridnumber LIKE '1111%'
	ORDER BY {$orderBy}
	LIMIT {$start}, {$perPage}"; //start with 0 & LIMIT 5

$stmt = $db->prepare($sql);
$stmt->execute();
$employees =$stmt->fetchAll(PDO::FETCH_OBJ);

//Pages
$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages =ceil($total / $perPage) //rounding up

?>
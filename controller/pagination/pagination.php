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

$orderBy = (isset($_SESSION['sortby']))?$_SESSION['sortby']:'strfullname';

// Positioning
$start = ($page >1) ? ($page * $perPage) - $perPage : 0;


include $model->page('pagination.php');

<?php
//Query
include $model->page('connection.php');

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
<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php include $controller->page('buttons.php');?>

<?php
$pagination = new pagination();
//User input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 10;

//Order by ID Number
if(isset($_GET['orderById'])){
	$_SESSION['sortby'] = 'emp_idnum';
}elseif(isset($_GET['orderByName'])){
	$_SESSION['sortby'] = 'emp_fullname';
}elseif(isset($_GET['orderByDept'])){
	$_SESSION['sortby'] = 'emp_department';
}

$orderBy = (isset($_SESSION['sortby']))?$_SESSION['sortby']:'strfullname';

//SearchBy
if(isset($_GET['search'])){
	$_SESSION['where']=$_GET['search'];
	$whereClauseKey ='%'. $_SESSION['where'] . '%';
}else{
	$whereClauseKey ='%';
}


// Positioning
$start = ($page >1) ? ($page * $perPage) - $perPage : 0;

$sql = 
	"SELECT SQL_CALC_FOUND_ROWS	
	e.*,t.*
	FROM tms_notify t INNER join
	emp_db e ON t.stridnumber  = e.emp_idnum
		WHERE (e.emp_idnum LIKE '{$whereClauseKey}' 
			OR e.emp_fullname LIKE '{$whereClauseKey}' 
			OR e.emp_department LIKE '{$whereClauseKey}'
			OR e.emp_company LIKE '{$whereClauseKey}'
			OR e.emp_position LIKE '{$whereClauseKey}')
		ORDER BY {$orderBy}
	LIMIT {$start}, {$perPage}"; //start with 0 & LIMIT 5

$pagination->getSql($sql);
$pagination->query();
$pagination->getPerPage($perPage);
$pagination->pages();

?>


<!DOCTYPE html>
<html lang="en">
	<?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>
	<div class="row">
 		<div class="col-sm-6 col-md-6">
 			<h4> <strong><?php $buttons->btnImage('employee.png','40px','auto'); ?> New Employee </strong></h4>
 		</div>

 		<div class="col-sm-6 col-md-6" style="padding-bottom:10px;">
 			<form action="" id='searchByForm' method="GET">
	 			<table class="pull-right">
	 				<tr>
	 					<td style="padding-right:5px;">
	 						<input type="text" class="form-control" name="search" id="searchInputBox">
	 					</td>
	 					<td style="padding-right:5px;"><button class="btn btn-primary btn-sm" id="searchButton">Search <i class="fa fa-search"></i></button></td>
	 					<td>
	 						<a href="?page=1&per-page=<?php echo $perPage ?>&search=&orderById=q">
	 							<?php $buttons->btnImage('reset.png','35px','auto'); ?>
							</a>
						</td>
	 				</tr>
	 			</table>
			</form>

 		</div>


		<table class="table" >
			<th>PICTURE</th>
			<th title='Order by ID' >
				<a href="?page=<?php echo $page ?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>&orderById=q">
					ID # <i class="fa fa-caret-down"></i>
				</a>
			</th>
			<th title='Order by Name'>
				<a href="?page=<?php echo $page ?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>&orderByName=q">
					NAME <i class="fa fa-caret-down"></i>
				</a>
			</th>
			
			<th>COMPANY</th>
			<th title='Order by Department'>
				<a href="?page=<?php echo $page ?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>&orderByDept=q">
					DEPARTMENT <i class="fa fa-caret-down"></i>
				</a>
			</th>
			<th>POSITION</th>
			<th>DATE OF HIRE</th>
			<th></th>
			<?php foreach($pagination->employees as $employees):?>
				<tr>

					<td align='center'><a href="<?php $buttons->imgSrc($employees->strpicture) ?>" target="_blank" title='click to enlarge'><?php $buttons->EmpImage($employees->emp_pic,'30px','auto');?></a></td>
					<td><?php echo $employees->emp_idnum; ?></td>
					<td style="background-color:#d4d6d7"><?php echo strtoupper($employees->emp_fullname); ?></td>
					<td><?php echo $employees->emp_company ?></td>
					<td><?php echo $employees->emp_department; ?></td>
					<td><?php echo $employees->emp_position; ?></td>
					<td><?php echo $employees->emp_dateofhire; ?></td>
					<td style="width:50px">
						<form action="<?php echo $views->page('emp_NewEmployeeDetails.php') ?>" method="GET">
							<button style="font-weight:bold">Details </button> 
							<input type='hidden' name='id' value='<?php echo $employees->emp_idnum; ?>'>
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
		<div class="control">
			<!--Dropdown-->
			<p>
			<select name='selectedPage' onchange="selectPage_func('<?php echo $perPage ?>','<?php echo $_SESSION['where'] ?>');">
				<option><?php echo (isset($_GET['page'])) ?  $_GET['page'] : 1; ?></option>
				<?php for($x = 1; $x <= $pagination->pages; $x++): ?>
				<option><?php echo $x;  ?></option>
				<?php endfor; ?>
			</select>
			</p>
			<!--previous-->
			<?php $p =$page; ($p > 1)?$previous = $p-1:$previous =1?> 
				<a href="?page=<?php echo $previous?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>"> <i class="fa fa-chevron-circle-left fa-2x"></i></a>
			<!--next-->
			<?php $n =$page; ($n < $pagination->pages)?$next = $n+1:$next =$page;?> 
				<a href="?page=<?php echo $next?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>"> <i id="next" class="fa fa-chevron-circle-right fa-2x"></i></a>
			<!--Pagination number-->
			<!--<p>
				<?php for($x = 1; $x <= $pages; $x++): ?>
				<a href="?page=<?php echo $x ?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>"
					<?php echo($page===$x)? "class='selected'" : "";?>
					><?php echo $x ?></a>
				<?php endfor; ?>
			</p>-->
		</div>

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $libs->page('css/newEmployee.css')?>">
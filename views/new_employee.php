<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php require $model->page('pagination.php');?>
<?php include $controller->page('buttons.php');?>


<!DOCTYPE html>
<html lang="en">
	<?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>
	<div class="row">
 		<div class="col-sm-6 col-md-6">
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
	 						<a href="?page=<?php echo $page ?>&per-page=<?php echo $perPage ?>&search=&orderById=q">
	 							<?php $buttons->btnImage('reset.png','35px','auto'); ?>
							</a>
						</td>
	 				</tr>
	 			</table>
			</form>
 		</div>

		<table class="table">
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
			<?php foreach($employees as $employees):?>
				<tr>

					<td align='center'><a href="<?php $buttons->imgSrc($employees->strpicture) ?>" target="_blank" title='click to enlarge'><?php $buttons->EmpImage($employees->strpicture,'30px','auto');?></a></td>
					<td><?php echo $employees->stridnumber; ?></td>
					<td style="background-color:#d4d6d7"><?php echo strtoupper($employees->strfullname); ?></td>
					<td><?php echo $employees->strcompany ?></td>
					<td><?php echo $employees->strdepartment; ?></td>
					<td><?php echo $employees->strposition; ?></td>
					<td><?php echo $employees->strdateofhire; ?></td>
					<td align='center'>
						<form action="<?php echo $views->page('viewdetails.php') ?>" method="GET">
							<button id="<?php echo $employees->ID; ?>" style="font-weight:bold">Details </button> 
							<input type='hidden' name='id' value='<?php echo $employees->stridnumber; ?>'>
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
		<div class="control">
			<!--previous-->
			<?php $p =$page; ($p > 1)?$previous = $p-1:$previous =1?> 
				<a href="?page=<?php echo $previous?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>"> <i class="fa fa-chevron-circle-left fa-2x"></i></a>
			<!--next-->
			<?php $n =$page; ($n < $pages)?$next = $n+1:$next =$page;?> 
				<a href="?page=<?php echo $next?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>"> <i id="next" class="fa fa-chevron-circle-right fa-2x"></i></a>
			<!--Pagination number-->
			<p>
				<?php for($x = 1; $x <= $pages; $x++): ?>
				<a href="?page=<?php echo $x ?>&per-page=<?php echo $perPage ?>&search=<?php echo $_SESSION['where'] ?>"
					<?php echo($page===$x)? "class='selected'" : "";?>
					><?php echo $x ?></a>
				<?php endfor; ?>
			</p>
		</div>

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $libs->page('css/newEmployee.css')?>">

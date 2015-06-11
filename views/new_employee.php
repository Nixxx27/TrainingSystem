<?php require '../init/config.php';?>
<?php require '../init/securityAccess.php';?>
<?php include $controller->page('pagination/pagination.php');?>

<!DOCTYPE html>
<html lang="en">
	<?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>

	<div class="row" style="margin-top:3px;padding-bottom:4px" >
 		<div class="col-sm-6 col-md-6" >
 		</div>

 		<div class="col-sm-6 col-md-6">
 			<form action="" id='searchByForm' method="GET">
	 			<table class="pull-right">
	 				<tr>
	 					<td style="padding-right:5px;">
	 						<input type="text" class="form-control" name="search" id="searchInputBox">
	 					</td>
	 					<td style="padding-right:5px;"><button class="btn btn-primary btn-sm" id="searchButton">Search <i class="fa fa-search"></i></button></td>
	 					<td>
	 						<a href="?page=<?php echo $page ?>&per-page=<?php echo $perPage ?>&search=&orderById=q">
								<img src="<?php echo $libs->page('img/system/buttons/reset.png')?>" width="auto" height="40px">
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
			<?php include $controller->page('pagination/view.php') ?>
		</table>
	</div>
		<div class="control">
			<?php include $controller->page('pagination/controller.php'); ?>
		</div>
	
<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $libs->page('css/newEmployee.css')?>">

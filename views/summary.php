<?php require '../init/config.php';?>
<?php require '../init/securityAccess.php';?>
<?php
$newEmployee = New newEmployee(); 
$newEmployee->countAll();
?>

<!DOCTYPE html>
<html lang="en">
    <?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>

<h3 style='margin-top:20px'><strong>Hi, <?php echo $_SESSION['tmsFullname'];?> </strong></h3>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<table class="table pull-left" border='1px'>
				<tr>
					<td>New Employees:</td>
					<td title="view details">
						<a href="<?php echo $views->page('new_employee.php')?>?page=1&per-page=10&search=">
							<?php foreach($newEmployee->countAll as $count){echo $count->total;}?>
						</a>
					</td>
				</tr>
				<tr>
					<td>Enrolled Employees:</td>
					<td>100</td>
				</tr>
			</table>
        </div>
	</div>
	

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>

   
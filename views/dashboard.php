<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php include $controller->page('buttons.php');?>
<?php
$newEmployee = New newEmployee(); 
$newEmployee->countAll();
?>

<!DOCTYPE html>
<html lang="en">
    <?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>

<div class="row"  style="margin-top:50px">
	<div class="col-sm-3"> 
		<div id="summary" class="panel panel-default border-blue">
			<div class="panel-heading">
   			 	<h3 class="panel-title"> <strong><i class="fa fa-th-large"></i> Summary</strong></h3>
  			</div>
  			<div class="panel-body">
    			<table class="table">
				<tr>
					<td><strong>New Employees:</strong></td>
					<td title="view details">
						<a href="<?php echo $views->page('new_employee.php')?>?page=1&per-page=10&search=">
							<?php foreach($newEmployee->countAll as $count){echo $count->total;}?>
						</a>
					</td>
				</tr>
				<tr>
					<td><strong>Enrolled Employees:</strong></td>
					<td>100</td>
				</tr>
			</table>
  			</div>
		</div>
	</div><!--col-sm-3-->

	<div class="col-sm-3"> 
		<div class="panel panel-default border-blue ">
			<div class="panel-heading">
   			 	<h3 class="panel-title"> <strong><i class="fa fa-bell-o"></i> Notification</strong></h3>
  			</div>
  			<div class="panel-body">
    			 <ul style="list-style:none">
    			 	<li><span class="badge">1</span> New Friend Request</li>
    			 	<li><span class="badge">3</span> New Messages</li>
    			 </ul>
    			
  			</div>
		</div>
	</div>

	<div class="col-sm-3"> 
		<div class="panel panel-default border-blue ">
			<div class="panel-heading">
   			 	<h3 class="panel-title"> <strong>How's the weather</strong></h3>
  			</div>
  			<div class="panel-body">
  				weather
    		</div>
		</div>
	</div>
</div><!-- row -->
<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>

<script type="text/javascript">
	skyGroupName();
</script>
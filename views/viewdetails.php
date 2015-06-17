<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php include $controller->page('buttons.php');?>

<!DOCTYPE html>
<html lang="en">
    <?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>

<?php
$id = $_GET['id'];
$employeeDetails = new employee;
$employeeDetails->getEmpDetails($id,NULL);
$employeeDetails->viewEmpDetails();
?>
<table>
	<tr>
		<td style="padding-right:20px"><span style="cursor:pointer" onClick="backHistory();" title='Back'><?php $buttons->btnImage('back.png','40px','auto'); ?></span></td>
		<td><h2><strong><?php echo $employeeDetails->strfullname; ?></strong></h2></td>
	</tr>
</table>


	<hr>
	<div class="row">
		<div class="col-md-3">
			<?php $buttons->empImage($employeeDetails->strpicture,'250px','auto'); ?>
		</div>

		<div class="col-md-9">
			<?php 
				$strcompany = $employeeDetails->strcompany;
				switch ($strcompany ) {
					case 'SkyKitchen':
						$strcompany = 'SkyKitchen Philippines Inc.';
						$color = '#e73e97';
					break;
				default:
						$strcompany = 'SkyLogistics Philippines Inc.';
						$color = '#e51b24';
					break;
				}
			?>
			<table>
				<tr>
					<td  colspan="2"><h3 style="color:<?php echo $color ?>"><strong><?php echo $strcompany;?></strong></h3></td>
				</tr>
				<tr>
					<td style="padding-right:10px"><h4><strong><small>Department: </small></td>
					<td><h4><strong><?php echo $employeeDetails->strdepartment; ?></strong></h4></td>
				</tr>
				<tr>
					<td><h4><strong><small>Position: </small></td>
					<td><h4><strong><?php echo $employeeDetails->strposition; ?></strong></h4></td>
				</tr>

				<tr>
					<td><h4><strong><small>Date Hired: </small></td>
					<td><h4><strong><?php echo $employeeDetails->strdateofhire; ?></strong></h4></td>
				</tr>
			</table>
		</div>
	</div><!--row-->

	
	<!-- REQUIRED TRAINING -->
	<?php
	$training = new training();
	$training->getPosition($employeeDetails->strposition);
	$training->trainingPerPosition();
	?>
	<br/>
	<div class="row">
	
		<div class="col-md-6">
			
			<table class="table">
				<th>Required Training </th>
				<th>Status </th>
				<th>Recurrent </th>
				<th> </th>
				<?php foreach ($training->trainingPerPosition() as $training): ?>
					<tr>
						<td><?php echo $training->strtraining ?></td>
						<td>Enrolled</td>
						<td>2 years</td>
						<td><button class="btn btn-primary btn-sm" disabled>Enroll</button></td>
					</tr>
				<?php endforeach; ?>
			</table>
			
		</div>
	
	</div><!--row-->
	


<?php echo $employeeDetails->noRecord; ?>

        

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>

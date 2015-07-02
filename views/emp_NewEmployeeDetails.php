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
		<td style="padding-right:20px"><span style="cursor:pointer" onClick="backHistory();" title='Back'><?php $buttons->backButton(); ?></span></td>
		<td><h2><strong><?php echo $employeeDetails->emp_fullname; ?></strong></h2></td>
	</tr>
</table>


	<hr>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3">
			<?php $buttons->empImage($employeeDetails->emp_pic,'150px','auto'); ?>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 ">
			<?php 
				$strcompany = $employeeDetails->emp_company;
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
					<td colspan="2"><h3 style="color:<?php echo $color ?>"><strong><?php echo $strcompany;?></strong></h3></td>
				</tr>
				<tr>
					<td style="padding-right:10px"><h4><strong><small>Department: </small></td>
					<td><h4><strong><?php echo $employeeDetails->emp_department; ?></strong></h4></td>
				</tr>
				<tr>
					<td><h4><strong><small>Position: </small></td>
					<td><h4><strong><?php echo $employeeDetails->emp_position; ?></strong></h4></td>
				</tr>

				<tr>
					<td><h4><strong><small>Date Hired: </small></td>
					<td><h4><strong><?php echo $employeeDetails->emp_dateofhire; ?></strong></h4></td>
				</tr>
			</table>
		</div>

		<div class="col-md-3">
			<table class="table">
				<tr>
					<td><button class='btn btn-primary btn-xs' onClick="backHistory('tr_TrainingPerPosition.php');"> New Training </button></td>
				</tr>
			</table>
		</div>
	</div><!--row-->

	
	<!-- REQUIRED TRAINING -->
	<?php
	$requiredTraining = new training();
	$requiredTraining->getPosition($employeeDetails->emp_position);
	$requiredTraining->trainingPerPosition();

	$employeeRecord = new employee();
	?>
	<br/>
	<div class="row">
	
		<div class="col-md-6">
			<table class="table">
				<th>Required Training </th>
				<th>Status </th>
				<th>Recurrent </th>
				<th> </th>
				<?php foreach ($requiredTraining->trainingPerPosition() as $requiredTraining): ?>
				<?php
					$employeeRecord->getTraining($requiredTraining->train_num_id,$employeeDetails->emp_idnum);
				 	$employeeRecord->checkIfEnroll();
				 ?>
					<tr>
						<td><?php echo $requiredTraining->strtraining ?></td>
						<td><?php echo $employeeRecord->strtrainstat ?></td>
						<td><?php echo $requiredTraining->strrecurrent . "mos." ?></td>
						<td><?php echo $employeeRecord->buttonAction ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
			
		</div>
	
	</div><!--row-->
	


<?php echo $employeeDetails->noRecord; ?>

        

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>

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
	
	$training_id =  intval(escape(trim($_GET['tr'])));
	$bioId =  escape(trim($_GET['id']));

	$employeeDetails = new employee;
	$employeeDetails->getEmpDetails($bioId);
	$employeeDetails->viewEmpDetails();
	$employeeDetails->getTraining($training_id,$bioId);
	$employeeDetails->viewMLByIdNumber();

	$training = new training();
	$training->getTrainingNumber($training_id);
	$training->convertTrainNumber();
	
	?>
<table>
	<tr>
		<td style="padding-right:20px"><span style="cursor:pointer" onClick="backHistory();" title='Back'><?php $buttons->backButton(); ?></span></td>
		<td><h2><strong><?php echo $training->trainingName; ?></strong></h2></td>
	</tr>
</table>
	<hr>
	<div class="row">
		<div class="col-md-5">
			<table class="table" border="1">
				<tr>
					<td>Status:</td>
					<td><?php 
						$strtrainstat = $employeeDetails->strtrainstat;
						if($strtrainstat=='enrolled'){
							$statusPic = 'enroll.png';
							$statusPicAlt = 'Enrolled';
						}else{
							$statusPic = 'scheduled.png';
							$statusPicAlt = 'Scheduled';
						}


					$buttons->btnImage($statusPic,'25px','auto','',$statusPicAlt); ?> <?php echo ucfirst($strtrainstat); ?> </td>
				</tr>
				<tr>
					<td>Name:</td>
					<td><?php echo $employeeDetails->strfullname; ?></td>
				</tr>
				<tr>
					<td>Company:</td>
					<td><?php echo $employeeDetails->strcompany;?> </span>
					</td>
				</tr>
				<tr>
					<td>Training Date:</td>
					<td><?php echo $employeeDetails->strtraindate; ?></td>
				</tr>
				<tr>
					<td>Time In:</td>
					<td><?php echo $employeeDetails->strtraintimein; ?></td>
				</tr>
				<tr>
					<td>Time Out:</td>
					<td><?php echo $employeeDetails->strtraintimeout; ?></td>
				</tr>
				<tr>
					<td>Venue:</td>
					<td><?php echo $employeeDetails->strtrainven; ?></td>
				</tr>
				<tr>
					<td>Venue:</td>
					<td><?php echo $employeeDetails->strtrainor; ?></td>
				</tr>
		</table>


		</div>
	</div>



<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>
   
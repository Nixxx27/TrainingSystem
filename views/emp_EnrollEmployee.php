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
	$employeeDetails->getEmpDetails($bioId,NULL);
	$employeeDetails->viewEmpDetails();

	$employeeDetails->getTraining($training_id,$bioId);
	$employeeDetails->viewMLByIdNumber();

	$training = new training();
	$training->getTrainingNumber($training_id);
	$training->convertTrainNumber();

?>
<style type="text/css">
	th,td {
		text-align:center;
	}
</style>
<table>
	<tr>
		<td style="padding-right:20px"><span style="cursor:pointer" onClick="backHistory();" title='Back'><?php $buttons->backButton(); ?></span></td>
		<td><h2><strong><?php echo $employeeDetails->emp_fullname; ?></strong></h2></td>
	</tr>
</table>
<hr>
<div class="row">
	<div class="col-md-8 col-sm-8 col-lg-8">
		<table class="table" border='1'>
			<tr>
				<td colspan='9'><h3><strong><?php echo $training->trainingName; ?></strong></h3></td>
			</tr>
			<tr>
				<td colspan='9'><strong>Training Sessions</strong></td>
			</tr>
				<?php $training->trainingSession(); echo $training->noTrainingSession?>
			<tr>
			    <th>Course ID</th>
			    <th>Date</th>
			    <th>Start</th>
			    <th>End</th>
			    <th>Venue</th>
			    <th>Trainor</th>
			    <th>Status</th>
			    <th></th>
			    <th></th>
			 </tr>
			<?php foreach ($training->trainingSession() as $trainingSession) : ?>
			<tr>		
				<td><?php echo strtoupper($trainingSession->session_num); ?></td>
				<td><?php echo $trainingSession->session_date; ?></td>
				<td><?php echo $trainingSession->session_in; ?></td>
				<td><?php echo $trainingSession->session_out; ?></td>
				<td><?php echo $trainingSession->session_venue; ?></td>
				<td><?php echo $trainingSession->session_trainor; ?></td>
				<td>20/30</td>
				<td><form><button class="btn btn-primary btn-sm">Enroll</button></form></td>
				<td><form><button class="btn btn-primary btn-sm">View</button></form></td>
			</tr>	
			<?php endforeach; ?>
		</table>
	</div>
</div>


        

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>
   
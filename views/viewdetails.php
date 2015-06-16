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
<span style="cursor:pointer" onClick="backHistory();" title='Back'><?php $buttons->btnImage('back.png','40px','auto'); ?></span>

<?php foreach ($employeeDetails->viewEmpDetails() as $employees): ?>
	<hr>
	<h4><small><strong>Name:</small> <strong><?php echo $employees->strfullname; ?></strong> </h4>
	<h4><small><strong>Position:</small> <strong><?php echo $employees->strposition; ?></strong> </h4>

<?php endforeach; ?>

<hr>
<h4><strong>Required Training: </strong></h4>
        

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>

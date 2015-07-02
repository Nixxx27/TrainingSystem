<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php include $controller->page('buttons.php');?>

<?php
$pagination = new pagination();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <=50 ? (int)$_GET['per-page'] : 10;

//SearchBy
if(isset($_GET['search'])){
	$_SESSION['where_tr']=$_GET['search'];
	$whereClauseKey ='%'. $_SESSION['where_tr'] . '%';
}else{
	$whereClauseKey ='%';
}

$orderBy = (isset($_SESSION['sortby']))?$_SESSION['sortby']:'pos_name';
$start = ($page >1) ? ($page * $perPage) - $perPage : 0;

$sql = "SELECT SQL_CALC_FOUND_ROWS	
		p.ID,p.pos_name,t.train_num_id,t.strtraining,t.strrecurrent 
	FROM pos_train_db p
	INNER JOIN training_tbl t ON
		t.train_num_id=p.train_num
	WHERE (p.pos_name LIKE '{$whereClauseKey}' 
			OR t.strtraining LIKE '{$whereClauseKey}' 
			OR t.strrecurrent LIKE '{$whereClauseKey}')
	ORDER BY pos_name
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
 			<h4> <strong><?php $buttons->btnImage('trainingperposition.png','40px','auto'); ?> Training Per Position <small>Edit Record</small> </strong></h4>
 		</div>
	</div>
<?php $employee = new employee(); $training = new training();?>
<?php
	$training->getTrainingNumber($_GET['tid']);
	$training->convertTrainNumber();
?>
	<div class="row">
		<div class="col-md-12 col-sm-12">
		<table>
		<tr>
			<td style="padding-right:5px;padding-bottom:5px"><span style="cursor:pointer" onClick="backHistory('tr_TrainingPerPosition.php');" title='Back'><?php $buttons->backButton(); ?></span></td>
		</tr>

		</table>
<hr>
<?php
	
	if (isset($_POST['pos_name']) || isset($_POST['train_num'])){
	$id = escape(trim($_POST['id']));
	$position = escape(trim($_POST['pos_name']));
	$trainingPerPosition = escape(trim($_POST['train_num']));

	$training->getTrainingID($id);
	$training->getPosition($position);
	$training->getTrainingNumber($trainingPerPosition);
	$training->editTrainingPerPosition();
	}


?>
<div class="row">
    <div class="col-sm-6">
      	<form method="POST" action="">
      		<input type='hidden' name='id' value='<?php echo $_GET['id']; ?>'>
      		<table class="table">
				<tr>
					<td>POSITION</td>
					<td><select class="form-control" required name="pos_name" >
						<option><?php echo $_GET['p']?></option>
						<?php $employee->positionList(); ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>TRAINING</td>
					<td><select class="form-control" name="train_num" id="train_num" required onChange="trainingRecurrent();" >
						<option value="<?php echo $training->trainId?>"><?php echo $training->trainingName?></option>
						<?php $training->trainingList(); ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>RECURRENT</td>
						<td><label><span style="font-weight:bold" id="recurrent"></span> mos.</label></td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" onclick="return confirm('Submit Changes?')" class="btn btn-primary">Submit</button></td>
				</tr>
		
			</table>
		</form>
	</div>
        

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>


<script>
	$(document).ready(function(){
		var $recurrentText = '<?php echo $_GET['rec']; ?>';
		$('#recurrent').html($recurrentText);
	})
</script>
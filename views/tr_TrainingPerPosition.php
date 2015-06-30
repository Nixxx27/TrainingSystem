<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php require $model->page('pagination/trainingPerPosition.php');?>
<?php include $controller->page('buttons.php');?>

<!DOCTYPE html>
<html lang="en">
	<?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>
	<div class="row">
 		<div class="col-sm-6 col-md-6">
 			<h4> <strong><?php $buttons->btnImage('trainingperposition.png','40px','auto'); ?> Training Per Position </strong></h4>
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
	 						<a href="?page=1&per-page=<?php echo $perPage ?>&search="><?php $buttons->btnImage('reset.png','35px','auto'); ?></a>
						</td>
					</tr>
	 			</table>
			</form>
		</div>
 	</div>
<?php $employee = new employee(); $training = new training();?>
	<div class="row">
		<div class="col-md-12 col-sm-12">
		<table>
		<tr>
			<td style="padding-right:5px;padding-bottom:5px"><span style="cursor:pointer" onClick="backHistory();" title='Back'><?php $buttons->backButton(); ?></span></td>
			<td style="padding-right:5px;padding-bottom:5px"><?php $attr="data-toggle='modal' data-target='#addNewTrainingPerPosition'"; $buttons->btnImage('addnew-training-per-position.png','35px','auto','cursorpointer onhover','Add New',$attr); ?>
			</td>
		</tr>
		</table>
		<table class="table">
				<th>POSITION</th>
				<th>TRAINING NAME</th>
				<th>RECURRENT</th>
				<th></th>
				<th></th>
				<?php foreach($employees as $employees):?>
					<tr>
						<td style="background-color:#d4d6d7"><?php echo ucfirst($employees->pos_name); ?></td>
						<td><?php echo ucfirst($employees->strtraining); ?></td>
						<td><?php echo $employees->strrecurrent . " mos."; ?></td>
						<td  style="width:50px">
							<form action="" method="GET" id="deleteForm">
								<button style="font-weight:bold;margin-right:0px">Delete </button> 
								<input type='hidden' name='p' value='<?php echo $employees->pos_name; ?>'>
								<input type='hidden' name='tid' value='<?php echo $employees->train_num_id; ?>'>
							</form>
						</td>
						<td style="width:50px">
							<form action="<?php echo $views->page('tr_TrainingEditPerPosition.php') ?>" method="GET">
								<button style="font-weight:bold">Edit </button> 
								<input type='hidden' name='id' value='<?php echo $employees->ID; ?>'>
								<input type='hidden' name='p' value='<?php echo $employees->pos_name; ?>'>
								<input type='hidden' name='tid' value='<?php echo $employees->train_num_id; ?>'>
								<input type='hidden' name='rec' value='<?php echo $employees->strrecurrent; ?>'>
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
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



<script type="text/javascript">

//Delete Training
	var p = "<?php echo $_GET['p'] ?>";
   	var tid = "<?php echo $_GET['tid'] ?>";
	if(p && tid !==''){
		if(confirm('Are you sure you want to Delete this record?')){
    	$.ajax({
		type: 'POST',
		url: "../model/ajax.php", 
		data: {func: 'deleteTrainingPerPosition',
		pos_name: p,
		train_num_id: tid},
		 	success: function(result){
		 		if(result==='success'){
		 			alert('Successfully Deleted!');
	 			}
	 			window.location.href = "tr_TrainingPerPosition.php";
				p='';
				tid='';}
		 	
			})
    	}else{
    		window.location.href = "tr_TrainingPerPosition.php";
    	}
	};

</script>


<?php
//Add New Training
if (isset($_POST['pos_name']) || isset($_POST['train_num'])){
	$position = escape(trim($_POST['pos_name']));
	$trainingPerPosition = escape(trim($_POST['train_num']));

	$training->getPosition($position);
	$training->getTrainingNumber($trainingPerPosition);
	$training->addNewTrainingPerPosition();
	}
?>
<div class="modal fade" id="addNewTrainingPerPosition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     	<div class="modal-header">
	        <div class="pull-left">
	            <i class="fa fa-question-circle fa-lg"></i></h2>
	        </div>
	         <div class="pull-right">
	            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	         </div>
		</div>
       
       <div class="row">
          <div class="col-sm-10">
              <h3><strong>Add New</strong></h3>
          </div> 
        </div>
    
      <div class="modal-body">
      	<form method="POST" action="">
      		<table class="table">
				<tr>
					<td>POSITION</td>
					<td><select class="form-control" required name="pos_name" >
						<option value="">--Please Select--</option>
						<?php $employee->positionList(); ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>TRAINING</td>
					<td><select class="form-control" name="train_num" id="train_num" required onChange="trainingRecurrent();" >
						<option value="">--Please Select--</option>
						<?php $training->trainingList(); ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>RECURRENT</td>
					<td><label><span style="font-weight:bold" id="recurrent"></span> mos.</label></td>
				</tr>
				<tr>
					<td colspan="2"><button type="submit" onclick="return confirm('Are you sure you want to Add this Training?')" class="btn btn-primary">Submit</button></td>
				</tr>
		
			</table>
		</form>
	<div class="modal-footer">
      	<span class="pull-left">
          </span>
     	<button type="button" class="btn btn-primary" data-dismiss="modal" ><i class="fa fa-times"></i> Close</button>
       </div>
    </div>
  </div>
</div>
</div>
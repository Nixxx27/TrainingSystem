<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php include $controller->page('buttons.php');?>

<!DOCTYPE html>
<html lang="en">
    <?php include $views->page('config/head.php');?>
    <?php pageTitle('AJAX Database');?>
    <?php include $views->page('config/header.php');?>


    Training ID: <input type="text" name="train_num_id" id="train_num_id">
    <input type="submit" id="id-submit" value="Grab">
    <select id="training-name"></select>
        <div id="no-data"></div>

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>


<script type="text/javascript">
	$('#train_num_id').on('keyup',function(){
		var train_num_id = $('input#train_num_id').val();
		var trainingName = $('#training-name');
		var hello = $('#hello');
		
		if ($.trim(train_num_id) != ''){
			$.ajax({
				type: 'POST',
				url: "../model/ajax.php", 
				data: {func:'fname',
						id: train_num_id},
				success: function(result){
		       		trainingName.html(result);
		       		}
				});
			}//if


	})

</script>


<!--
init.php
// <?php

// spl_autoload_register(function($class){
// 	require_once "classes/{$class}.php";

// });

// ?>


//index.php
// <?php

// <?php require 'init.php' ?>
<html>
<head>
	<title>Nikko Zabala</title>
</head>
<body>
// <?php 
// 	$login = new login();
// 	$connect = new connect();
// ?>

</body>
</html>

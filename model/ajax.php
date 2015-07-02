<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php include $controller->page('buttons.php');?>


<?php
$employee = new employee();
$training = new training();
$selectedFunction = escape(trim($_POST['func']));


switch ($selectedFunction) {
	case 'fname':
		$value = escape(trim($_POST['value']));
		echo $training->trainingRecurrent($value);
		break;
	case 'deleteTrainingPerPosition':
		$pos_name = escape(trim($_POST['pos_name']));
		$train_num_id = escape(trim($_POST['train_num_id']));
		$training->getPosition($pos_name);
		$training->getTrainingNumber($train_num_id);
		$training->deleteTrainingPerPosition();
		break;

	default:
		echo 'Error in Page';
		break;
}



?>
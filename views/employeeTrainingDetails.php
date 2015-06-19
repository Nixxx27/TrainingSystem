<?php require '../init/securityAccess.php';?>
<?php require '../init/page.php';?>
<?php require $model->page('class.php');?>
<?php include $controller->page('buttons.php');?>

<!DOCTYPE html>
<html lang="en">
    <?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>
    <table>
	<tr>
		<td style="padding-right:20px"><span style="cursor:pointer" onClick="backHistory();" title='Back'><?php $buttons->btnImage('back.png','40px','auto'); ?></span></td>
	</tr>
</table>


	<h1><strong> Training: <?php echo $_GET['strtraining']; ?><small>(note:convert to equivalent training name)</small></strong></h1>
		<h1><?php echo $_GET['strstatus']; ?></h1>

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>
   
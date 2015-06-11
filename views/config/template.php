<?php require '../init/config.php';?>
<?php require '../init/securityAccess.php';?>

<!DOCTYPE html>
<html lang="en">
    <?php include $views->page('config/head.php');?>
    <?php pageTitle('Summary');?>
    <?php include $views->page('config/header.php');?>

<h3 style='margin-top:20px'><strong>Hi, <?php echo $_SESSION['tmsFullname'];?> </strong></h3>


        

<?php include $views->page('config/about.php');?>
<?php include $views->page('config/footer.php'); ?>
   
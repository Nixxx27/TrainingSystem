<?php
    require 'sec_access.php';
    include 'class.php';
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include 'head.php';
        echo pageTitle("Notification"); 
    ?>
</head>

<body> 
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-sm-1  col-md-1"><i class="fa fa-cube fa-spin fa-5x"></i> </div>
            <div class="col-sm-6 col-md-6"><img src='img/tmslogotop.png' class="img-responsive"></div>
            <div class="col-sm-5  col-md-5">
                <label>Date:</label>    <br / >
                <label>Time:</label>    <br / >
            </div>
        </div><!-- row -->
        <?php include('menu.php');?>
    <hr>


        <?php echo $_SESSION['tmsFullname'] ?>


        
        <?php include('about.php');?>
    </div> <!-- /.container -->

</body>
</html>

<?php include('footer.php'); ?>

   
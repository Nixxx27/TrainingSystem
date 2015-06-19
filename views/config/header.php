<body> 
    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6  col-md-8 col-lg-9">
            <h4> <i class="fa fa-cube fa-spin fa-2x"></i> <strong>SkyGroup Training Management System</strong> </h4>
             </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <table class="pull-right">
                    <tr>
                        <td style="padding-right:5px"><p style='border:2px solid #8e8f90'><?php $buttons->empImage('koala.jpg','40px','auto'); ?></p></td>
                        <td><span style="font-size:1.5em;font-weight:bold">Hi, </span><span id='userId' style='font-size:1em;font-weight:bold'> <?php echo strtoupper($_SESSION['tmsFullname']) ;?></span></strong></td>
                    </tr>
                </table>
            </div>
    </div><!-- row -->
<p class="blue"></p>
<div class="row ">
    <div class="col-sm-4 col-md-2"><?php include $views->page('config/menu.php');?></div>
    <div class="col-sm-8 col-md-offset-1 col-md-9" style="padding-right:50px">


<?php include '../init/page.php'; ?>
<?php include $controller->page('user/login.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $views->page('config/head.php');?>
    <?php pageTitle('Login Page');?>
    <style type="text/css">

    td {
        padding:5px
    }
    </style>

</head>

<body>
    <form method="POST" action="" name="loginForm" id="loginForm">
    <!-- Container -->
    <div class="container">
        <section class="row">
            <div class="col-lg-7 col-md-7 col-sm-6">
                <h3><i class="fa fa-cube fa-spin fa-5x"></i></h3>
                <p style="font-size:40px;font-weight:bold"> <span style="color:#337ab7">Training</span> Management System</p>
                <p>
                     <table>
                    <tr>
                        <td><h5><i class="fa fa-user"></i> User Name</h5></td>
                        <td><input type="text" class="form-control"  name="username" id="username" /></td>
                    </tr>  
                    <tr>
                        <td><h5><i class="fa fa-unlock-alt"></i> Password</h5></td>
                        <td><input type="password" class="form-control" name="password" id="password" /></td>
                    </tr>  
                    <tr>
                        <td colspan="2" align="right">
                            <button type="button" id='signIn' onClick="userValidation()" class="btn btn-primary">Sign In</button>
                            <button type="submit" class="btn btn-info">CLEAR <i class="fa fa-times-circle"></i></button>
                        </td>
                    </tr>  
                    <tr>
                        <td colspan="2"> 
                          <?php echo $user->error_msg; ?>
                        </td>
                    </tr>
                    <tr> 
                        <td colspan="2"> 
                          <div id="msg" style="font-weight:bold;display:none">Please Complete Required Fields!</div>
                        </td>
                    </tr>
                </table>    
                </p>
            </div>
            
            <div style="margin-top:70px" class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-5 col-sm-offset-1">
                <table class="table">
                    <tr>
                        <td><h5><i class="fa fa-user"></i> User Name</h5></td>
                        <td><input type="text" class="form-control"  name="username" id="username" /></td>
                    </tr>  
                    <tr>
                        <td><h5><i class="fa fa-unlock-alt"></i> Password</h5></td>
                        <td><input type="password" class="form-control" name="password" id="password" /></td>
                    </tr>  
                    <tr>
                        <td colspan="2" align="right">
                            <button type="button" id='signIn' onClick="userValidation()" class="btn btn-primary">Sign In</button>
                            <button type="submit" class="btn btn-info">CLEAR <i class="fa fa-times-circle"></i></button>
                        </td>
                    </tr>  
                    <tr>
                        <td colspan="2"> 
                          <?php echo $user->error_msg; ?>
                        </td>
                    </tr>
                    <tr> 
                        <td colspan="2"> 
                          <div id="msg" style="font-weight:bold;display:none">Please Complete Required Fields!</div>
                        </td>
                    </tr>
                </table>    
            </div>
        </section>
        <?php include $views->page('config/about.php');?>
    </div><!-- /.container -->
    </form>
</body>
</html>
 <?php include $views->page('config/footer.php');?>


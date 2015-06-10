<?php
    include '../init/config.php';
    include '../init/securityAccess.php';
    include $model->page('config.php');
    $user = new User();
    
    $username =  trim(htmlspecialchars($_POST['username']));
    $password =  trim(htmlspecialchars($_POST['password']));
    
    if(!empty($username) && !empty($password)){
        $user->getUserDetails($username,$password);
        $url = 'new_employee.php';
        $user->verifyUser($url);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include $views->page('head.php');
        echo pageTitle("Login Page"); 
    ?>
    <style>
        .requireFields{
            background-color:#cdd1d7;
        }

        .table>tbody>tr>td{
           border-top:none;
        }

    </style>
</head>

<body>
    <form method="POST" action="" name="loginForm" id="loginForm">
    <!-- Container -->
    <div class="container">
        <section class="row">
            <div class="col-lg-7 col-md-7 col-sm-6">
                <h3><i class="fa fa-cube fa-spin fa-5x"></i>
                <img class="img-responsive" src="<?php echo $libs->page('img/tmslogo.png') ?>"></h3>
            </div>

             <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-5 col-sm-offset-1 ">

                <h3><strong> Login Page</strong></h3>

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
                            <button type="submit" class="btn btn-success">CLEAR <i class="fa fa-times-circle"></i></button>
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
        <?php include $views->page('about.php');?>
    </div><!-- /.container -->
    </form>
</body>
</html>
 <?php include $views->page('footer.php');?>


<?php
	include $model->page('user.php');
    $user = new \user\config\User();
    
    $username =  trim(htmlspecialchars($_POST['username']));
    $password =  trim(htmlspecialchars($_POST['password']));
    
    if(!empty($username) && !empty($password)){
        $user->getUserDetails($username,$password);
        $url = 'summary.php';
        $user->verifyUser($url);
    }
 ?>
<?php

if (session_id() == '' ) {
    session_start();
    
    if (isset($_SESSION['tmsSucessfullLogin']) && $_SESSION['tmsSucessfullLogin'] == true) {
		$global_user_fullname 	=	trim($_SESSION['tmsFullname']);
		$global_username 		=	trim($_SESSION['tmsUsername']);
		$global_authorization	=	trim($_SESSION['tmsAuthorization']);
		$global_picture			=	trim($_SESSION['tmsPicture']);
	}else{
  		header("location:pleaselogin.php");
	}
}/* if session start */
    

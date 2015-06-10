<?php

class views {

	public function __construct(){

	}

	public function index(){
		include 'views/index.php';
	}

	public function about(){
		include 'views/about.php';
	}

	public function footer(){
		include 'views/footer.php';
	}

	public function head(){
		include 'views/head.php';
	}

	public function menu(){
		include 'views/menu.php';
	}

	public function securityAccess(){
		include 'views/securityAccess.php';
	}

	public function test(){
		include 'views/test.php';
	}
}
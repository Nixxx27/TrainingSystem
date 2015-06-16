<?php
class views {

	public function __construct(){
		
	}

	public function page($page){
		return '../views/' .$page;
	}

}

class model {

	public function __construct(){

	}
	
	public function page($page){
		return '../model/' .$page;
	}
}

class controller {

	public function __construct(){

	}
	
	public function page($page){
		return '../controller/' .$page;
	}
}

class libs {

	public function __construct(){

	}
	
	public function page($page){
		return '../libs/' .$page;
	}
}

$model = new model();
$views = new views();
$controller = new controller();
$libs = new libs();

include 'errorHandler.php';

<?php

class buttons{
	public $libs;

	public function __construct(){
	$this->libs = new libs();
	}
	
	public function btnImage ($btn,$height,$width,$class) {
	echo "<img src=". $this->libs->page('img/') . $btn . " height= '" . $height . "'width='" . $width  . "' class='" . $class. "'>";
	}

	public function EmpImage ($btn,$height,$width) {
	echo "<img src=". $this->libs->page('img/emp_pics/') . $btn . " height='" . $height . "' width='" . $width . "'>";
	}

	public function imgSrc ($img){
	echo $this->libs->page('img/emp_pics/') . $img;
	}

}#buttons


$buttons = new buttons;






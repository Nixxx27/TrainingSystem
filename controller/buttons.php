<?php

class buttons{
	public $libs;

	public function __construct(){
	$this->libs = new libs();
	}
	
	public function btnImage ($btn,$height=null,$width=null,$class=null,$title=null) {
	echo "<img src=". $this->libs->page('img/') . $btn . " height= '" . $height . "'width='" . $width  . "' class='" . $class. "' title='" . $title. "'>";
	}

	public function EmpImage ($btn,$height=null,$width=null,$class=null,$title=null) {
	echo "<img src=". $this->libs->page('img/emp_pics/') . $btn . " height='" . $height . "' width='" . $width . "' class='" . $class. "' title='" . $title. "'>";
	}

	public function imgSrc ($img){
	echo $this->libs->page('img/emp_pics/') . $img;
	}

}#buttons


$buttons = new buttons;






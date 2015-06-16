<?php

class buttons{
	public $libs;

	public function __construct(){
	$this->libs = new libs();
	}
	
	public function btnImage ($btn,$height,$width) {
	echo "<img src=". $this->libs->page('img/') . $btn . " height= '" . $width . "'width='" . $height . "'>";
	}

	public function EmpImage ($btn,$height,$width) {
	echo "<img src=". $this->libs->page('img/emp_pics/') . $btn . " height='" . $width . "' width='" . $height . "'>";
	}

	public function imgSrc ($img){
	echo $this->libs->page('img/emp_pics/') . $img;
	}

}#buttons


$buttons = new buttons;






<?php

class buttons{
	public $libs;

	public function __construct(){
	$this->libs = new libs();
	}
	
	public function btnImage ($btn,$height=null,$width=null,$class=null,$title=null,$attr=null) {
	echo "<img src=". $this->libs->page('img/') . $btn . " height= '" . $height . "'width='" . $width  . "' class='" . $class. "' title='" . $title. "'" . $attr.  "'>";
	}

	public function EmpImage ($btn,$height=null,$width=null,$class=null,$title=null) {
	echo "<img src=". $this->libs->page('img/emp_pics/') . $btn . " height='" . $height . "' width='" . $width . "' class='" . $class. "' title='" . $title. "'>";
	}

	public function imgSrc ($img){
	echo $this->libs->page('img/emp_pics/') . $img;
	}


	public function backButton(){
		echo "<img src=". $this->libs->page('img/back.png') . " height='37px' width='auto' title='Back' >";
	}

}#buttons


$buttons = new buttons;






<?php
class Father{
	public function __construct(){
		echo 'fatcher construct';
	}
}

class Son extends Father{
	public function __construct(){
		parent::__construct();
		echo 'Son construct';
	}
}

$Son = new Son();

?>
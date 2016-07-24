<?php
/**
* Controller
*/
class Controller
{
	
	function __construct()
	{
		echo "controller <br>";
	}
	public function HOME(){
		echo "method <br>";
	}
	public function mmm($parm){
		echo "$parm";
	}
}
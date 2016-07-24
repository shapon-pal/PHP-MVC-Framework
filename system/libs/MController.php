<?php
/**
* Main Controller
*/
class MController
{
	protected $load = array();
	
	function __construct()
	{
		$this->load = new Load();
	}
}
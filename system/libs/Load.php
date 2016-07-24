<?php
/**
* Load all 
*/
class Load
{
	
	function __construct()
	{
	}

	public function view($views_file, $data = false){
		if ($data == true) {
			extract($data);
		}
		include 'app/views/'.$views_file.'.php';
	}

	public function model($model_name){
		include 'app/models/'.$model_name.'.php';
		return new $model_name();
	}
}
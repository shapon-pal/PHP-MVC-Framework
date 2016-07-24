<?php
/**
* Category Model
*/
class CatModel extends MModel
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function create($table, $data){
		return $this->db->insert($table, $data);
	}

	public function catlist($table){
		return $this->db->select($table);
	}

	public function catById($table, $id){
		return $this->db->selectById($table, $id);
	}

	// Update
	public function update($table, $data, $cond){
		return $this->db->update($table, $data, $cond);
	}


}
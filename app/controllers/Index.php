<?php

/**
* Index Controller
*/
class Index extends MController
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function home()
	{
		$this->load->view('home');
	}

	// Insert
	public function createCat(){
        $data =array(
        	'name' => 'wordpress',
        	'title' => ' function'
        	);
        $table       = 'category';
        $isertCat = $this->load->model('catModel');
        $isertCat->create($table, $data);
	}

    // select all
	public function category()
	{
		$data        = array();	
		$table       = 'category';
		$catModel    = $this->load->model('CatModel');
		$data['cat'] = $catModel->catlist($table);

		$this->load->view('category',$data);

	}
    
    //Select by Id
	public function categoryId()
	{
		$data        = array();	
		$table       = 'category';
		$id          = 3;
		$catModel    = $this->load->model('CatModel');
		$data['catById'] = $catModel->catById($table, $id);

		$this->load->view('catById',$data);

	}

	// Update
	public function update(){
        $data =array(
        	'name' => 'key',
        	'title' => 'Value'
        	);
        $cond = "id=2";
        $table       = 'category';
        $isertCat = $this->load->model('catModel');
        $isertCat->update($table, $data, $cond);
	}
}
<?php
/**
* Database 
*/
class Database extends PDO
{
	
	public function __construct($dsn, $user, $pass)
	{
		parent::__construct($dsn, $user, $pass);
	}

	// Insert 
	public function insert($table, $data){
        $keys   = implode(',', array_keys($data));
        $values = ':'.implode(', :', array_keys($data));
        

		$sql  = "INSERT INTO $table(name, title) VALUES(:name, :title)";
		$stmt = $this->prepare($sql);
		foreach ($data as $key => $value) {
			$stmt->bindParam(":$key", $value);
		}
		return $stmt->execute();
	}

	// Select all
	public function select($table){
		$sql = "SELECT * FROM $table";
		$stmt = $this->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	// Select by id
	public function selectById($table, $id){
		$sql = "SELECT * FROM $table WHERE id=:id";
		$stmt = $this->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	// Update 
	public function update($table, $data, $cond){		
		$updateKeys = null;
        foreach ($data as $key => $value) {
			$updateKeys .= "$key = :$key,";			
		}
		$updateKeys = rtrim($updateKeys, ',');

		$sql  = "UPDATE $table SET $updateKeys WHERE 
		$cond";
		$stmt = $this->prepare($sql);
		foreach ($data as $key => $value) {
			$stmt->bindParam(":$key", $value);
		}
		return $stmt->execute();
	}
}
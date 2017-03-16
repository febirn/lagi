<?php

namespace App\Models;


abstract class AbstractModel
{
	protected $db;
	protected $table;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAll()
	{
		$this->db->select('*')
				 ->from($this->table)
				 ->where('deleted = 0')
		$query = $this->db->execute();

		return $query->fetchAll();
	}

	public function getById($id)
	{
		$this->db->select('*')
				 ->from($this->table)
				 ->where('id = ' . $id . ' AND deleted = 0')
		$query = $this->db->execute();

		return $query->fetch();
	}

}

?>
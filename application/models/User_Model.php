<?php
class User_model extends CI_Model
{
	protected $table = 'users';

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function getByEmail($email)
	{
		return $this->db->where('email', $email)->get($this->table)->row();
	}

	public function getById($id)
	{
		return $this->db->where('id', $id)->get($this->table)->row();
	}
}

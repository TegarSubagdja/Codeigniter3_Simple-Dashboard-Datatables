<?php
class Equipment_model extends CI_Model
{

	public function getAll()
	{
		return $this->db->get('equipment')->result();
	}

	public function getById($id)
	{
		return $this->db->get_where('equipment', ['id' => $id])->row();
	}

	public function insert($data)
	{
		return $this->db->insert('equipment', $data);
	}

	public function update($id, $data)
	{
		return $this->db->update('equipment', $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('equipment', ['id' => $id]);
	}
}

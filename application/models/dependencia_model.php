<?php
class Dependencia_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_dependencia($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->from('dependencias');
			$this->db->order_by("nombre", "asc"); 
			$query = $this->db->get(); 
			return $query->result_array();
		}
		$query = $this->db->get_where('dependencias', array('id' => $id));
		return $query->row_array();
	}
	public function set_dependencia()
	{
		$data = array('nombre' => $this->input->post('nombre'));
		return $this->db->insert('dependencias', $data);
	}	
	public function edit_dependencia($id)
	{
		$data = array(
			'nombre' => $this->input->post('nombre')
			);
			$this->db->where('id', $id);
		return $this->db->update('dependencias', $data);;
	}
	public function del_dependencia($id)
	{
		return $this->db->delete('dependencias', array('id' => $id)); 
	
	}
}


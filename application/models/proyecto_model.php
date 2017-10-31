<?php
class proyecto_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_proyecto($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->from('proyectos');
			$this->db->order_by("nombre", "asc"); 
			$query = $this->db->get(); 
			return $query->result_array();
		}
		$query = $this->db->get_where('proyectos', array('id' => $id));
		return $query->row_array();
	}
	public function set_proyecto()
	{
		$data = array('nombre' => $this->input->post('nombre'));
		return $this->db->insert('proyectos', $data);
	}	
	public function edit_proyecto($id)
	{
		$data = array(
			'nombre' => $this->input->post('nombre')
			);
			$this->db->where('id', $id);
		return $this->db->update('proyectos', $data);;
	}
	public function del_proyecto($id)
	{
		return $this->db->delete('proyectos', array('id' => $id)); 
	
	}
}


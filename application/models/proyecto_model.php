<?php
class proyecto_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_proyecto($pro_id = FALSE)
	{
		if ($pro_id === FALSE)
		{
			$this->db->from('proyectos');
			$this->db->order_by("pro_nombre", "asc"); 
			$query = $this->db->get(); 
			return $query->result_array();
		}
		$query = $this->db->get_where('proyectos', array('pro_id' => $pro_id));
		return $query->row_array();
	}
	public function set_proyecto()
	{
		$data = array('pro_nombre' => $this->input->post('pro_nombre'));
		return $this->db->insert('proyectos', $data);
	}	
	public function edit_proyecto($pro_id)
	{
		$data = array(
			'pro_nombre' => $this->input->post('pro_nombre')
			);
			$this->db->where('pro_id', $pro_id);
		return $this->db->update('proyectos', $data);
	}
	public function del_proyecto($pro_id)
	{
		return $this->db->delete('proyectos', array('pro_id' => $pro_id));
	}
}


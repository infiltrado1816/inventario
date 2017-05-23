<?php
class Clasificacion_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_clasificacion($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->from('clasificaciones');
			$this->db->order_by("nombre", "asc"); 
			$query = $this->db->get(); 
			return $query->result_array();
		}
		$query = $this->db->get_where('clasificaciones', array('id' => $id));
		return $query->row_array();
	}
	public function set_clasificacion()
	{
		$data = array('nombre' => $this->input->post('nombre'));
		return $this->db->insert('clasificaciones', $data);
	}	
	public function edit_clasificacion($id)
	{
		$data = array(
			'nombre' => $this->input->post('nombre')
			);
			$this->db->where('id', $id);
		return $this->db->update('clasificaciones', $data);;
	}
	public function del_clasificacion($id)
	{
		return $this->db->delete('clasificaciones', array('id' => $id)); 
	
	}
}


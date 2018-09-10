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
			$this->db->order_by("cla_nombre", "asc"); 
			$query = $this->db->get(); 
			return $query->result_array();
		}
		$query = $this->db->get_where('clasificaciones', array('cla_id' => $id));
		return $query->row_array();
	}
	public function set_clasificacion()
	{
		$data = array('cla_nombre' => $this->input->post('cla_nombre'));
		return $this->db->insert('clasificaciones', $data);
	}	
	public function edit_clasificacion($clas_id)
	{
		$data = array(
			'cla_nombre' => $this->input->post('cla_nombre')
			);
			$this->db->where('cla_id', $clas_id);
		return $this->db->update('clasificaciones', $data);;
	}
	public function del_clasificacion($clas_id)
	{
		return $this->db->delete('clasificaciones', array('cla_id' => $cla_id)); 
	
	}
}


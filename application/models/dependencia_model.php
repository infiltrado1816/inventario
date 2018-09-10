<?php
class Dependencia_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_dependencia($dep_id = FALSE)
	{
		if ($dep_id === FALSE)
		{
			$this->db->from('dependencias');
			$this->db->order_by("dep_nombre", "asc"); 
			$query = $this->db->get(); 
			return $query->result_array();
		}
		$query = $this->db->get_where('dependencias', array('dep_id' => $dep_id));
		return $query->row_array();
	}
	public function set_dependencia()
	{
		$data = array(	'dep_nombre' => $this->input->post('dep_nombre'),
						'dep_firma_nombre' => $this->input->post('dep_firma_nombre'),
						'dep_firma_titulo' => $this->input->post('dep_firma_titulo'),
						'dep_firma_grado' => $this->input->post('dep_firma_grado')
			);
		return $this->db->insert('dependencias', $data);
	}	
	public function edit_dependencia($dep_id)
	{
		$data = array(
			'dep_nombre' => $this->input->post('dep_nombre'),
			'dep_firma_nombre' => $this->input->post('fdep_irma_nombre'),
			'dep_firma_titulo' => $this->input->post('dep_firma_titulo'),
			'dep_firma_grado' => $this->input->post('dep_firma_grado')
			);
			$this->db->where('dep_id', $dep_id);
		return $this->db->update('dependencias', $data);;
	}
	public function del_dependencia($dep_id)
	{
		return $this->db->delete('dependencias', array('dep_id' => $dep_id)); 
	
	}
}


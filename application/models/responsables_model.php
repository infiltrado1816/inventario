<?php
class responsables_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_responsables($res_id = FALSE)
	{
		if ($res_id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('responsables');
			$this->db->order_by("res_id", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('responsables', array('res_id' => $res_id));
		return $query->row_array();
	}
	public function set_responsables()
	{
		$data = array('res_nombre' => $this->input->post('res_nombre'),
				'res_apellido' => $this->input->post('res_apellido')
			);
		return $this->db->insert('responsables', $data);
	}	

	public function edit_responsables($res_id)
	{
		$data = array('res_nombre' => $this->input->post('res_nombre'),
				'res_apellido' => $this->input->post('res_apellido')		
			);
			$this->db->where('res_id', $res_id);
		return $this->db->update('responsables', $data);;
	}
	public function del_responsables($res_id)
	{
		return $this->db->delete('responsables', array('res_id' => $res_id)); 

	}
}
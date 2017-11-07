<?php
class responsables_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_responsables($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('responsables');
			$this->db->order_by("apellido", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('responsables', array('id' => $id));
		return $query->row_array();
	}
	public function set_responsables()
	{
		$data = array('nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido')
			);
		return $this->db->insert('responsables', $data);
	}	

	public function edit_responsables($id)
	{
		$data = array('nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido')		
			);
			$this->db->where('id', $id);
		return $this->db->update('responsables', $data);;
	}
	public function del_responsables($id)
	{
		return $this->db->delete('responsables', array('id' => $id)); 

	}
}
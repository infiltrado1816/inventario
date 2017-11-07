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
			$this->db->order_by("login", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('responsables', array('id' => $id));
		return $query->row_array();
	}
	public function set_responsables()
	{
		$data = array('login' => $this->input->post('login'),
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido')
			);
		return $this->db->insert('responsables', $data);
	}	

	public function edit_responsables($id)
	{
		$data = array('descripcion' => $this->input->post('descripcion'),
				'numeroemco' => $this->input->post('numeroemco'),
				'serie' => $this->input->post('serie'),
				'factura' => $this->input->post('factura'),
				'clasificaciones_id' => $this->input->post('clasificaciones_id')		
			);
			$this->db->where('id', $id);
		return $this->db->update('responsables', $data);;
	}
}
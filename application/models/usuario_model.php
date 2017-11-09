<?php
class usuario_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_usuario($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->order_by("login", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('usuarios', array('id' => $id));
		return $query->row_array();
	}

	public function get_usuario_access($login)
	{
		$query = $this->db->get_where('usuarios', array('login' => $login));
		return $query->row_array();
	}

	public function set_usuario()
	{
		$data = array('login' => $this->input->post('login'),
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'password' => $this->input->post('password'),
				'perfil' => $this->input->post('perfil')		
			);



		return $this->db->insert('usuarios', $data);
	}	

	public function edit_usuario($id)
	{
		$data = array('descripcion' => $this->input->post('descripcion'),
				'numeroemco' => $this->input->post('numeroemco'),
				'serie' => $this->input->post('serie'),
				'factura' => $this->input->post('factura'),
				'clasificaciones_id' => $this->input->post('clasificaciones_id')		
			);
			$this->db->where('id', $id);
		return $this->db->update('usuarios', $data);;
	}

	public function edit_password($id)
	{
		$data = array('password' =>  md5($this->input->post('password')));
		$this->db->where('id', $id);
		return $this->db->update('usuarios', $data);;
	}

}


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
			$this->db->order_by("usu_login", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('usuarios', array('usu_id' => $id));
		return $query->row_array();
	}
	public function get_usuario_access($usu_login)
	{
		$query = $this->db->get_where('usuarios', array('usu_login' => $usu_login));
		return $query->row_array();
	}
	public function set_usuario()
	{
		$data = array('usu_login' => $this->input->post('usu_login'),
				'usu_nombre' => $this->input->post('usu_nombre'),
				'usu_apellido' => $this->input->post('usu_apellido'),
				'usu_password' => $this->input->post('usu_password'),
				'usu_perfil' => $this->input->post('usu_perfil')		
			);
		return $this->db->insert('usuarios', $data);
	}	
	public function edit_usuario($usu_id)
	{
		$data = array('usu_descripcion' => $this->input->post('usu_descripcion'),
				'usu_numeroemco' => $this->input->post('usu_numeroemco'),
				'usu_serie' => $this->input->post('usu_serie'),
				'usu_factura' => $this->input->post('usu_factura'),
				'cla_id' => $this->input->post('cla_id')		
			);
			$this->db->where('id', $id);
		return $this->db->update('usuarios', $data);;
	}
	public function edit_password($usu_id)
	{
		$data = array('usu_password' =>  md5($this->input->post('usu_password')));
		$this->db->where('usu_id', $usu_id);
		return $this->db->update('usuarios', $data);;
	}
}
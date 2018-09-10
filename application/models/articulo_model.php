<?php
class Articulo_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function get_articulo($id = FALSE)
	{
		if ($id === FALSE)
		{
			$this->db->select('*');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.dep_id = articulos.dep_id');
			$this->db->join('clasificaciones', 'clasificaciones.cla_id = articulos.cla_id');
			$this->db->join('proyectos', 'proyectos.pro_id = articulos.pro_id');
			$this->db->join('responsables', 'responsables.res_id = articulos.res_id');
			$this->db->order_by("art_descripcion", "asc"); 
			$query = $this->db->get();
			 

			return $query->result_array();
		}

			$this->db->select('*');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.dep_id = articulos.dep_id');
			$this->db->join('clasificaciones', 'clasificaciones.cla_id = articulos.cla_id');
			$this->db->join('proyectos', 'proyectos.pro_id = articulos.pro_id');
			$this->db->join('responsables', 'responsables.res_id = articulos.res_id');
			$this->db->where('articulos.art_id', $id);
			$query = $this->db->get();
			return $query->row_array();
	}
	public function get_articulo_prestamo()
	{
		$this->db->select('*');
		$this->db->from('articulos');
		$this->db->join('dependencias', 'dependencias.dep_id = articulos.dep_id');
		$this->db->join('clasificaciones', 'clasificaciones.cla_id = articulos.cla_id');
		$this->db->where('art_prestamo', TRUE);
		$this->db->order_by("art_descripcion", "asc"); 
		$query = $this->db->get();
		return $query->result_array();
	}
	public function set_articulo()
	{
		$data = array('art_descripcion' => $this->input->post('art_descripcion'),
			'art_numeroemco' => $this->input->post('art_numeroemco'),
			'art_serie' => $this->input->post('art_serie'),
			'art_factura' => $this->input->post('art_factura'),
			'art_prestamo' => FALSE,
			'cla_id' => $this->input->post('cla_id'),
			'pro_id' => $this->input->post('pro_id'),
			'dep_id' => '0'
			);

		$this->db->insert('articulos', $data);

		$data = array('dep_id' => '0',
			'art_id' => $this->db->insert_id(),
			'his_tipo' => 'Alta',
			'usu_id' => $this->session->userdata('id')
			);
	return	 $this->db->insert('historicos', $data);
	
	}	
	public function edit_articulo($id)
	{
		$data = array('art_descripcion' => $this->input->post('art_descripcion'),
			'art_numeroemco' => $this->input->post('art_numeroemco'),
			'art_serie' => $this->input->post('art_serie'),
			'art_factura' => $this->input->post('art_factura'),
			'clas_id' => $this->input->post('clas_id'),
			'pro_id' => $this->input->post('pro_id')				
			);
		$this->db->where('id', $id);
		return $this->db->update('articulos', $data);
	}
	public function pase()
	{
		$data = array(
			'dep_id' => $this->input->post('dep_id'),
			'res_id' => $this->input->post('res_id')
			);
		$this->db->where('art_id',$this->input->post('art_id'));
		$this->db->update('articulos', $data);

		$data = array('dep_id' => $this->input->post('dep_id'),
			'art_id' => $this->input->post('art_id'),
			'his_tipo' => 'Pase',
			'his_observacion' => $this->input->post('his_observacion'),
			'usu_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);
	}
	
	public function prestamo()
	{
		$data = array(
			'art_prestamo' => TRUE
			);
		$this->db->where('art_id',$this->input->post('art_id'));
		$this->db->update('articulos', $data);

		$data = array('dep_id' => $this->input->post('dep_id'),
			'art_id' => $this->input->post('art_id'),
			'his_tipo' => 'Prestamo',
			'his_observacion' => $this->input->post('art_observacion'),
			'usu_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);
	}
	public function reparacion()
	{
		$data = array('his_observacion' => $this->input->post('his_observacion'),
			'art_id' => $this->input->post('art_id'),
			'dep_id' => $this->input->post('dep_id'),
			'his_tipo' => 'Reparacion',
			'usu_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);
	}
	public function retorno()
	{
		$data = array('art_prestamo' => FALSE);
		$this->db->where('art_id',$this->input->post('art_id'));
		$this->db->update('articulos', $data);
		$data = array('dep_id' => $this->input->post('dep_id'),
			'art_id' => $this->input->post('art_id'),
			'hist_tipo' => 'Retorno',
			'usu_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);
	}
	public function del_articulo($id)
	{
		return $this->db->delete('articulos', array('art_id' => $id)); 
	}
	public function buscar()
	{
		$this->db->select('*');
		$this->db->from('articulos');
		$this->db->join('dependencias', 'dependencias.dep_id = articulos.dep_id');
		$this->db->join('clasificaciones', 'clasificaciones.cla_id = articulos.cla_id');
		$this->db->where('clasificaciones.cla_id', $this->input->post('cla_id'));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_historial($art_id)
	{
		$this->db->select('*');
		$this->db->from('historicos');
		$this->db->join('dependencias', 'dependencias.dep_id = historicos.dep_id');
		$this->db->join('usuarios', 'usuarios.usu_id = historicos.usu_id');
		$this->db->where('historicos.art_id', $art_id);
		$this->db->order_by("his_fecha", "desc"); 
		$query = $this->db->get();
		return $query->result_array();
	}
}
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
			$this->db->select('articulos.*,articulos.id as id_articulo,dependencias.*,clasificaciones.id as clasificacionesid,clasificaciones.nombre as clasificacionesnombre,proyectos.nombre as proyecto_nombre');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.id = articulos.dependencias_id');
			$this->db->join('clasificaciones', 'clasificaciones.id = articulos.clasificaciones_id');
			$this->db->join('proyectos', 'proyectos.id = articulos.proyectos_id');
			$this->db->order_by("descripcion", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('articulos', array('id' => $id));
		return $query->row_array();
	}


	public function get_articulo_prestamo()
	{
		$this->db->select('articulos.*,articulos.id as id_articulo,dependencias.*,clasificaciones.id as clasificacionesid,clasificaciones.nombre as clasificacionesnombre');
		$this->db->from('articulos');
		$this->db->join('dependencias', 'dependencias.id = articulos.dependencias_id');
		$this->db->join('clasificaciones', 'clasificaciones.id = articulos.clasificaciones_id');
		$this->db->where('prestamo', TRUE);
		$this->db->order_by("descripcion", "asc"); 
		$query = $this->db->get();
		return $query->result_array();
	}

	public function set_articulo()
	{
		$data = array('descripcion' => $this->input->post('descripcion'),
			'numeroemco' => $this->input->post('numeroemco'),
			'serie' => $this->input->post('serie'),
			'factura' => $this->input->post('factura'),
			'prestamo' => FALSE,
			'clasificaciones_id' => $this->input->post('clasificaciones_id'),
			'proyectos_id' => $this->input->post('proyectos_id'),
			'dependencias_id' => '0'
			);

		$this->db->insert('articulos', $data);

		$data = array('dependencias_id' => '0',
			'articulos_id' => $this->db->insert_id(),
			'tipo' => 'Alta',
			'usuarios_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);

	}	

	public function edit_articulo($id)
	{

		$data = array('descripcion' => $this->input->post('descripcion'),
			'numeroemco' => $this->input->post('numeroemco'),
			'serie' => $this->input->post('serie'),
			'factura' => $this->input->post('factura'),
			'clasificaciones_id' => $this->input->post('clasificaciones_id'),
			'proyectos_id' => $this->input->post('proyectos_id')				
			);
		$this->db->where('id', $id);
		return $this->db->update('articulos', $data);
	}


	public function pase()
	{
		$data = array(
			'dependencias_id' => $this->input->post('dependencias_id')
			);
		$this->db->where('id',$this->input->post('id_articulo'));
		$this->db->update('articulos', $data);

		$data = array('dependencias_id' => $this->input->post('dependencias_id'),
			'articulos_id' => $this->input->post('id_articulo'),
			'tipo' => 'Pase',
			'observacion' => $this->input->post('observacion'),
			'usuarios_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);



	}

	public function prestamo()
	{
		$data = array(
			'prestamo' => TRUE
			);
		$this->db->where('id',$this->input->post('id_articulo'));
		$this->db->update('articulos', $data);

		$data = array('dependencias_id' => $this->input->post('dependencias_id'),
			'articulos_id' => $this->input->post('id_articulo'),
			'tipo' => 'Prestamo',
			'observacion' => $this->input->post('observacion'),
			'usuarios_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);
	}

	public function reparacion()
	{


		$data = array('observacion' => $this->input->post('observacion'),
			'articulos_id' => $this->input->post('id_articulo'),
			'dependencias_id' => $this->input->post('dependencias_id'),
			'tipo' => 'Reparacion',
			'usuarios_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);
	}




	public function retorno()
	{
		$data = array(
			'prestamo' => FALSE
			);
		$this->db->where('id',$this->input->post('id_articulo'));
		$this->db->update('articulos', $data);

		$data = array('dependencias_id' => $this->input->post('dependencias_id'),
			'articulos_id' => $this->input->post('id_articulo'),
			'tipo' => 'Retorno',
			'usuarios_id' => $this->session->userdata('id')
			);
		return $this->db->insert('historicos', $data);



	}


	public function del_articulo($id)
	{
		return $this->db->delete('articulos', array('id' => $id)); 

	}


	public function buscar()
	{
		$this->db->select('articulos.*,articulos.id as articulosid,dependencias.*,clasificaciones.id as clasificacionesid,clasificaciones.nombre as clasificacionesnombre');
		$this->db->from('articulos');
		$this->db->join('dependencias', 'dependencias.id = articulos.dependencias_id');
		$this->db->join('clasificaciones', 'clasificaciones.id = articulos.clasificaciones_id');
		$this->db->where('clasificaciones_id', $this->input->post('clasificaciones_id'));
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_historial($id_articulo)
	{
		$this->db->select('historicos.*,dependencias.nombre,usuarios.login');
		$this->db->from('historicos');
		$this->db->join('dependencias', 'dependencias.id = historicos.dependencias_id');
		$this->db->join('usuarios', 'usuarios.id = historicos.usuarios_id');
		$this->db->where('historicos.articulos_id', $id_articulo);
		$this->db->order_by("fecha", "desc"); 
		

		$query = $this->db->get();
		return $query->result_array();
	}




}


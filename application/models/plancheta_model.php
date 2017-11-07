<?php
class Plancheta_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_plancheta_dependencia()
	{
			$this->db->select('articulos.*,articulos.id as id_articulo,dependencias.*,clasificaciones.id as clasificacionesid,clasificaciones.nombre as clasificacionesnombre,proyectos.nombre as proyecto_nombre, responsables.nombre as responsables_nombre, responsables.apellido as responsables_apellido');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.id = articulos.dependencias_id');
			$this->db->join('clasificaciones', 'clasificaciones.id = articulos.clasificaciones_id');
			$this->db->join('proyectos', 'proyectos.id = articulos.proyectos_id');
			$this->db->join('responsables', 'responsables.id = articulos.responsables_id');
			$this->db->order_by("descripcion", "asc"); 
			$this->db->where('dependencias_id', $this->input->post('dependencias_id'));

			$this->db->order_by("numeroemco", "ASC"); 
			$this->db->order_by("clasificacionesnombre", "ASC"); 
			$this->db->order_by("descripcion", "ASC"); 
			$query = $this->db->get();
		
			return $query->result_array();
		
	}
	public function get_plancheta_clasificacion()
	{
			$this->db->select('articulos.*,articulos.id as id_articulo,dependencias.*,clasificaciones.id as clasificacionesid,clasificaciones.nombre as clasificacionesnombre,proyectos.nombre as proyecto_nombre, responsables.nombre as responsables_nombre, responsables.apellido as responsables_apellido');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.id = articulos.dependencias_id');
			$this->db->join('clasificaciones', 'clasificaciones.id = articulos.clasificaciones_id');
			$this->db->join('proyectos', 'proyectos.id = articulos.proyectos_id');
			$this->db->join('responsables', 'responsables.id = articulos.responsables_id');
			$this->db->order_by("descripcion", "asc"); 
			$this->db->where('clasificaciones_id', $this->input->post('clasificacion_id'));

			$this->db->order_by("numeroemco", "ASC"); 
			$this->db->order_by("clasificacionesnombre", "ASC"); 
			$this->db->order_by("descripcion", "ASC"); 
			$query = $this->db->get();
			return $query->result_array();
		
	}


	public function get_plancheta_proyecto()
	{
			$this->db->select('articulos.*,articulos.id as id_articulo,dependencias.*,clasificaciones.id as clasificacionesid,clasificaciones.nombre as clasificacionesnombre,proyectos.nombre as proyecto_nombre, responsables.nombre as responsables_nombre, responsables.apellido as responsables_apellido');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.id = articulos.dependencias_id');
			$this->db->join('clasificaciones', 'clasificaciones.id = articulos.clasificaciones_id');
			$this->db->join('proyectos', 'proyectos.id = articulos.proyectos_id');
			$this->db->join('responsables', 'responsables.id = articulos.responsables_id');
			$this->db->order_by("descripcion", "asc"); 
			$this->db->where('proyectos_id', $this->input->post('proyecto_id'));

			$this->db->order_by("numeroemco", "ASC"); 
			$this->db->order_by("clasificacionesnombre", "ASC"); 
			$this->db->order_by("descripcion", "ASC"); 
			$query = $this->db->get();
			return $query->result_array();
		
	}


	public function get_resumen()
	{
			$this->db->select('clasificaciones.nombre as clasificacionesnombre,count(articulos.id) as cantidad');
			$this->db->from('articulos');
			$this->db->join('clasificaciones', 'clasificaciones.id = articulos.clasificaciones_id');
			$this->db->order_by("clasificaciones.nombre", "ASC"); 
			$this->db->group_by("clasificaciones.nombre");
			$query = $this->db->get();
			return $query->result_array();
		
	}


}


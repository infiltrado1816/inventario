<?php
class Plancheta_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_plancheta_dependencia()
	{
			$this->db->select('*');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.dep_id = articulos.dep_id');
			$this->db->join('clasificaciones', 'clasificaciones.cla_id = articulos.cla_id');
			$this->db->join('proyectos', 'proyectos.pro_id = articulos.pro_id');
			$this->db->join('responsables', 'responsables.res_id = articulos.res_id');
			$this->db->order_by("art_descripcion", "asc"); 			
			$this->db->where('dependencias.dep_id', $this->input->post('dep_id'));
			$this->db->order_by("art_numeroemco", "ASC"); 
			$this->db->order_by("cla_nombre", "ASC"); 
			$this->db->order_by("art_descripcion", "ASC"); 
			$query = $this->db->get();
			return $query->result_array();
		
	}
	public function get_plancheta_clasificacion()
	{
			$this->db->select('*');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.dep_id = articulos.dep_id');
			$this->db->join('clasificaciones', 'clasificaciones.cla_id = articulos.cla_id');
			$this->db->join('proyectos', 'proyectos.pro_id = articulos.pro_id');
			$this->db->join('responsables', 'responsables.res_id = articulos.res_id');
			$this->db->order_by("art_descripcion", "asc"); 
			$this->db->where('articulos.cla_id', $this->input->post('cla_id'));
			$this->db->order_by("art_numeroemco", "ASC"); 
			$this->db->order_by("cla_nombre", "ASC"); 
			$this->db->order_by("art_descripcion", "ASC"); 
			$query = $this->db->get();
			return $query->result_array();
	}


	public function get_plancheta_proyecto()
	{
			$this->db->select('*');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.dep_id = articulos.dep_id');
			$this->db->join('clasificaciones', 'clasificaciones.cla_id = articulos.cla_id');
			$this->db->join('proyectos', 'proyectos.pro_id = articulos.pro_id');
			$this->db->join('responsables', 'responsables.res_id = articulos.res_id');
			$this->db->order_by("art_descripcion", "asc"); 
			$this->db->where('articulos.pro_id', $this->input->post('pro_id'));
			$this->db->order_by("art_numeroemco", "ASC"); 
			$this->db->order_by("cla_nombre", "ASC"); 
			$this->db->order_by("art_descripcion", "ASC"); 
			$query = $this->db->get();
			return $query->result_array();
		
	}


	public function get_resumen()
	{
			$this->db->select('clasificaciones.cla_nombre ,count(articulos.art_id) as cantidad');
			$this->db->from('articulos');
			$this->db->join('clasificaciones', 'clasificaciones.cla_id = articulos.cla_id');
			$this->db->order_by("cla_nombre", "ASC"); 
			$this->db->group_by("cla_nombre");
			$query = $this->db->get();
			return $query->result_array();
	}
}
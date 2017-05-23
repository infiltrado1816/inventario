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
			$this->db->select('articulos.*,articulos.id as id_articulo,dependencias.*,clasificaciones.id as clasificacionesid,clasificaciones.nombre as clasificacionesnombre');
			$this->db->from('articulos');
			$this->db->join('dependencias', 'dependencias.id = articulos.dependencias_id');
			$this->db->join('clasificaciones', 'clasificaciones.id = articulos.clasificaciones_id');
			$this->db->order_by("descripcion", "asc"); 
			$query = $this->db->get();
			return $query->result_array();
		}
		$query = $this->db->get_where('articulos', array('id' => $id));
		return $query->row_array();
	}
	public function set_articulo()
	{
		$data = array('descripcion' => $this->input->post('descripcion'),
				'numeroemco' => $this->input->post('numeroemco'),
				'serie' => $this->input->post('serie'),
				'factura' => $this->input->post('factura'),
				'clasificaciones_id' => $this->input->post('clasificaciones_id'),
				'dependencias_id' => '0'
			);



		return $this->db->insert('articulos', $data);
	}	

	public function edit_articulo($id)
	{
		$data = array('descripcion' => $this->input->post('descripcion'),
				'numeroemco' => $this->input->post('numeroemco'),
				'serie' => $this->input->post('serie'),
				'factura' => $this->input->post('factura'),
				'clasificaciones_id' => $this->input->post('clasificaciones_id')		
			);
			$this->db->where('id', $id);
		return $this->db->update('articulos', $data);;
	}


	public function pase()
	{
		$data = array(
			'dependencias_id' => $this->input->post('dependencias_id')
			);
			$this->db->where('id',$this->input->post('id_articulo'));
		$this->db->update('articulos', $data);

		$data = array('dependencias_id' => $this->input->post('dependencias_id'),
					'articulos_id' => $this->input->post('id_articulo')
			     );
		return $this->db->insert('historico_pases', $data);



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
		$this->db->select('historico_pases.*,dependencias.nombre');
		$this->db->from('historico_pases');
		$this->db->join('dependencias', 'dependencias.id = historico_pases.dependencias_id');
		$this->db->where('historico_pases.articulos_id', $id_articulo);
		$query = $this->db->get();
		return $query->result_array();
	}


	

}


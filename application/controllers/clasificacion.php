<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clasificacion extends CI_Controller {

	

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login'))
			   redirect(base_url()."login");
		$this->load->model('clasificacion_model');
	}
	
	

	public function index()
	{
		$data['menu']="clasificacion";
		$this->load->view('cabecera',$data);
		$data['item'] = $this->clasificacion_model->get_clasificacion();
		$this->load->view('clasificacion/index',$data);
		$this->load->view('pie');
	}
		public function nuevo()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'nombre', 'required|is_unique[clasificaciones.nombre]|max_length[45]');
		if ($this->form_validation->run() == FALSE)
			{

				$data['menu']="clasificacion";
				$this->load->view('cabecera',$data);
				$this->load->view('clasificacion/nuevo',$data);
				$this->load->view('pie');
			}
		else
			{
				$this->load->model('clasificacion_model');
				$this->clasificacion_model->set_clasificacion();
				redirect(base_url()."clasificacion", 'refresh');
			}
	}
	public function editar($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'nombre', 'required|is_unique[clasificaciones.nombre]|max_length[45]');
		if ($this->form_validation->run() == FALSE)
			{
				$data['menu']="clasificacion";
				$this->load->view('cabecera',$data);
				$data['item'] = $this->clasificacion_model->get_clasificacion($id);
				$this->load->view('clasificacion/editar',$data);
				$this->load->view('pie');
			}
			else
			{
				
				$this->clasificacion_model->edit_clasificacion($id);
				redirect(base_url()."clasificacion", 'refresh');
			}
	}

	public function eliminar($id)
	{
		
		$this->clasificacion_model->del_clasificacion($id);
		redirect(base_url()."clasificacion", 'refresh');
	}



}

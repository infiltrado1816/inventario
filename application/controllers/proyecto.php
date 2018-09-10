<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyecto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login'))
			   redirect(base_url()."login");
		$this->load->model('proyecto_model');
	}
	
	public function index()
	{
		$data['menu']="proyecto";
		$this->load->view('cabecera',$data);
		$data['item'] = $this->proyecto_model->get_proyecto();
		$this->load->view('proyecto/proyecto',$data);
		$this->load->view('pie');
	}

		public function nuevo()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pro_nombre', 'Nombre', 'required|is_unique[proyectos.pro_nombre]|max_length[45]');
		if ($this->form_validation->run() == FALSE)
			{

				$data['menu']="proyecto";
				$this->load->view('cabecera',$data);
				$this->load->view('proyecto/nuevo',$data);
				$this->load->view('pie');
			}
		else
			{
				$this->load->model('proyecto_model');
				$this->proyecto_model->set_proyecto();
				redirect(base_url()."proyecto", 'refresh');
			}
	}
	public function editar($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pro_nombre', 'Nombre', 'required|is_unique[proyectos.pro_nombre]|max_length[45]');
		if ($this->form_validation->run() == FALSE)
			{
				$data['menu']="proyecto";
				$this->load->view('cabecera',$data);
				$data['item'] = $this->proyecto_model->get_proyecto($id);
				$this->load->view('proyecto/editar',$data);
				$this->load->view('pie');
			}
			else
			{
				
				$this->proyecto_model->edit_proyecto($id);
				redirect(base_url()."proyecto", 'refresh');
			}
	}

	public function eliminar($id)
	{
		
		$this->proyecto_model->del_proyecto($id);
		redirect(base_url()."proyecto", 'refresh');
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dependencia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login'))
			   redirect(base_url()."login");
		$this->load->model('dependencia_model');
	}
	
	public function index()
	{
		$data['menu']="dependencia";
		$this->load->view('cabecera',$data);
		$data['item'] = $this->dependencia_model->get_dependencia();
		$this->load->view('dependencia/dependencia',$data);
		$this->load->view('pie');
	}

		public function nuevo()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'nombre', 'required|is_unique[dependencias.nombre]|max_length[45]');
		if ($this->form_validation->run() == FALSE)
			{

				$data['menu']="dependencia";
				$this->load->view('cabecera',$data);
				$this->load->view('dependencia/nuevo',$data);
				$this->load->view('pie');
			}
		else
			{
				$this->load->model('dependencia_model');
				$this->dependencia_model->set_dependencia();
				redirect(base_url()."dependencia", 'refresh');
			}
	}
	public function editar($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'nombre', 'required|is_unique[dependencias.nombre]|max_length[45]');
		if ($this->form_validation->run() == FALSE)
			{
				$data['menu']="dependencia";
				$this->load->view('cabecera',$data);
				$data['item'] = $this->dependencia_model->get_dependencia($id);
				$this->load->view('dependencia/editar',$data);
				$this->load->view('pie');
			}
			else
			{
				
				$this->dependencia_model->edit_dependencia($id);
				redirect(base_url()."dependencia", 'refresh');
			}
	}

	public function eliminar($id)
	{
		
		$this->dependencia_model->del_dependencia($id);
		redirect(base_url()."dependencia", 'refresh');
	}
}
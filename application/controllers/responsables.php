<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Responsables extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		   if(!$this->session->userdata('login'))
         redirect(base_url()."login");
     if($this->session->userdata('perfil')==="responsables") 
     	{
     		echo "Acceso Denegado";
     		exit();
     }
		$this->load->model('responsables_model');
	}
	public function index()
	{
		$data['menu']="responsables";
		$this->load->view('cabecera',$data);
		$data['responsables'] = $this->responsables_model->get_responsables();
		$this->load->view('responsables/index.php',$data);
		$this->load->view('pie');
	}
		public function nuevo()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[45]');
		$this->form_validation->set_rules('apellido', 'apellido', 'required|max_length[45]');
		if ($this->form_validation->run() == FALSE)
			{
				$data['menu']="responsables";
				$this->load->view('cabecera',$data);
				$this->load->view('responsables/nuevo',$data);
				$this->load->view('pie');
			}
		else
			{
				
				$this->responsables_model->set_responsables();
				redirect(base_url()."responsables", 'refresh');
			}
	}
	public function editar($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[45]');
		$this->form_validation->set_rules('apellido', 'apellido', 'required|max_length[45]');

		if ($this->form_validation->run() == FALSE)
			{
				$data['menu']="responsables";
				$this->load->view('cabecera',$data);
				$data['responsables'] = $this->responsables_model->get_responsables($id);
				$this->load->view('responsables/editar',$data);
				$this->load->view('pie');
			}
			else
			{
				$this->responsables_model->edit_responsables($id);
				redirect(base_url()."responsables", 'refresh');
			}
	}
	public function eliminar($id)
	{
		
		$this->responsables_model->del_responsables($id);
		redirect(base_url()."responsables", 'refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login'))
			   redirect(base_url()."login");
		$this->load->model('clientes_model');
	}
	
	

	public function index()
	{
		$data['menu']="clientes";
		$this->load->view('cabecera',$data);
		$data['clientes'] = $this->clientes_model->get_clientes();
		$this->load->view('clientes/clientes',$data);
		$this->load->view('pie');
	}
	public function ficha($id)
	{
		$data['menu']="clientes";
		$this->load->view('cabecera',$data);
		$data['cliente'] = $this->clientes_model->get_clientes($id);
		$data['facturas'] = $this->clientes_model->get_facturas($id);
		$this->load->view('clientes/ficha',$data);
		$this->load->view('pie');
	}
		public function nuevo()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('rut', 'rut', 'required|is_unique[clientes.rut]');
		$this->form_validation->set_rules('razon', 'razon', 'required|is_unique[clientes.razon]|max_length[45]');
		$this->form_validation->set_rules('tipo', 'tipo', 'required');
		
		$this->form_validation->set_rules('telefono', 'telefono', 'max_length[45]|integer');
		$this->form_validation->set_rules('correo', 'correo', 'max_length[45]');
		$this->form_validation->set_rules('direccion', 'direccion', 'max_length[45]');


		if ($this->form_validation->run() == FALSE)
			{

				$data['menu']="clientes";
				$this->load->view('cabecera',$data);
				$this->load->view('clientes/nuevo',$data);
				$this->load->view('pie');
			}
		else
			{
				$this->load->model('clientes_model');
				$this->clientes_model->set_clientes();
				redirect(base_url()."clientes", 'refresh');
			}
	}
	public function editar($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('razon', 'razon', 'required|max_length[45]');
		$this->form_validation->set_rules('telefono', 'telefono', 'max_length[45]|integer');
		$this->form_validation->set_rules('correo', 'correo', 'max_length[45]');
		$this->form_validation->set_rules('direccion', 'direccion', 'max_length[45]');

		if ($this->form_validation->run() == FALSE)
			{
				$data['menu']="clientes";
				$this->load->view('cabecera',$data);
				$data['cliente'] = $this->clientes_model->get_clientes($id);
				$this->load->view('clientes/editar',$data);
				$this->load->view('pie');
			}
			else
			{
				
				$this->clientes_model->edit_clientes($id);
				redirect(base_url()."clientes", 'refresh');

			}

	}


	



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
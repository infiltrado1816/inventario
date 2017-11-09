<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		   if(!$this->session->userdata('login'))
         redirect(base_url()."login");
     if($this->session->userdata('perfil')==="Usuario") 
     	{
     		echo "Acceso Denegado";
     		exit();
     }

		$this->load->model('usuario_model');
	}
	
	

	public function index()
	{
		$data['menu']="usuarios";
		$this->load->view('cabecera',$data);
		$data['usuarios'] = $this->usuario_model->get_usuario();
		$this->load->view('usuarios/index.php',$data);
		$this->load->view('pie');
	}
	public function ficha($id)
	{
		$data['menu']="usuarios";
		$this->load->view('cabecera',$data);
		$data['usuario'] = $this->usuario_model->get_usuario($id);
		$this->load->view('usuarios/ficha',$data);
		$this->load->view('pie');
	}

		public function nuevo()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login', 'login', 'required|is_unique[usuarios.login]');
		$this->form_validation->set_rules('nombre', 'nombre', 'required|max_length[45]');
		$this->form_validation->set_rules('apellido', 'apellido', 'required|max_length[45]');
		$this->form_validation->set_rules('password', 'password', 'required|max_length[10]');



		if ($this->form_validation->run() == FALSE)
			{

				$data['menu']="usuarios";
				$this->load->view('cabecera',$data);
				$this->load->view('usuarios/nuevo',$data);
				$this->load->view('pie');
			}
		else
			{
				
				$this->usuario_model->set_usuario();
				redirect(base_url()."usuarios", 'refresh');
			}
	}
	public function editar($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'pasword', 'required|max_length[45]');

		if ($this->form_validation->run() == FALSE)
			{
				$data['menu']="usuarios";
				$this->load->view('cabecera',$data);
				$data['id_usuario'] = $id;
				$this->load->view('usuarios/editar',$data);
				$this->load->view('pie');
			}
			else
			{
				
				$this->usuario_model->edit_password($id);
				redirect(base_url()."usuarios", 'refresh');

			}

	}


	



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
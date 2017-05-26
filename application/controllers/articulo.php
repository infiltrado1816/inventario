<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulo extends CI_Controller {

	

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('login'))
			   redirect(base_url()."login");
		$this->load->model('articulo_model');
	}
	
	
  public function do_upload($id)
  		{
		
        $config['upload_path'] = './assets/uploads/';
        $config['file_name'] = 'img'.$id;
        $config['allowed_types'] = 'jpg';
       // $config['max_size'] = '2000';
       // $config['max_width'] = '2024';
        $config['max_height'] = '4008';
 		$config['overwrite'] = TRUE;

		$config['image_width'] = '200';
		$config['image_height'] = '100';

        $this->load->library('upload', $config);
        //SI LA IMAGEN FALLA AL SUBIR MOSTRAMOS EL ERROR EN LA VISTA UPLOAD_VIEW
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
        	foreach ($error as $key => $value) {
        		echo $value;
        		# code...
        	}
         //   $this->load->view('articulo/ficha', $error);
        } else {
      

       		$file_info = $this->upload->data();
       		
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $titulo = $this->input->post('titulo');
            $imagen = $file_info['file_name'];
            //$subir = $this->upload_model->subir($titulo,$imagen);      
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen;

            redirect(base_url().'articulo/ficha/'.$id);

            
        }
       
  }
 function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = './assets/uploads/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='./assets/uploads/thumbs/';
        $config['width'] = 250;
        $config['height'] = 250;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }

	public function index()
	{
		$data['menu']="articulo";
		$this->load->view('cabecera',$data);
		$data['item'] = $this->articulo_model->get_articulo();
		$this->load->view('articulo/index',$data);
		$this->load->view('pie');
	}

		public function alta()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'required|max_length[255]');
		$this->form_validation->set_rules('numeroemco', 'Número Emco', 'required|is_unique[articulos.numeroemco]|max_length[45]');
		$this->form_validation->set_rules('serie', 'serie', 'max_length[100]');
		$this->form_validation->set_rules('factura', 'factura', 'max_length[45]');
		$this->form_validation->set_rules('clasificaciones_id', 'Clasificación', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
			{
				$this->load->model('clasificacion_model');
				$data['item'] = $this->clasificacion_model->get_clasificacion();

				$data['menu']="articulo";
				$this->load->view('cabecera',$data);
				$this->load->view('articulo/alta',$data);
				$this->load->view('pie');
			}
		else
			{
				$this->load->model('articulo_model');
				$this->articulo_model->set_articulo();
				redirect(base_url(), 'refresh');
			}
	}

	public function editar($id_articulo)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'required|max_length[255]');
		$this->form_validation->set_rules('numeroemco', 'Número Emco', 'required|max_length[45]');
		$this->form_validation->set_rules('serie', 'serie', 'max_length[100]');
		$this->form_validation->set_rules('factura', 'factura', 'max_length[45]');
		$this->form_validation->set_rules('clasificaciones_id', 'Clasificación', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
			{
				$this->load->model('clasificacion_model');
				$data['item'] = $this->clasificacion_model->get_clasificacion();
				$data['articulo'] = $this->articulo_model->get_articulo($id_articulo);
				$data['menu']="articulo";
				$data['id_articulo']=$id_articulo;
				$this->load->view('cabecera',$data);
				$this->load->view('articulo/editar',$data);
				$this->load->view('pie');
			}
		else
			{
				$this->load->model('articulo_model');
				$this->articulo_model->edit_articulo($id_articulo);
				redirect(base_url()."articulo", 'refresh');
			}
	}

	public function ficha($id)
	{
		$data['menu']="articulo";
		$this->load->view('cabecera',$data);
		$data['item'] = $this->articulo_model->get_articulo($id);
		$data['historial'] = $this->articulo_model->get_historial($id);
		$this->load->view('articulo/ficha',$data);
		$this->load->view('pie');
	}


	public function eliminar($id)
	{
		
		$this->articulo_model->del_articulo($id);
		redirect(base_url()."articulo", 'refresh');
	}

	public function pase()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('id_articulo', 'Articulo', 'required');
				if ($this->form_validation->run() == FALSE)
					{
						$data['menu']="articulo";
						$this->load->view('cabecera',$data);
						$this->load->model('clasificacion_model');
						$this->load->model('dependencia_model');
						$data['item'] = $this->clasificacion_model->get_clasificacion();
						$data['dependencias'] = $this->dependencia_model->get_dependencia();
						$data['articulos'] = $this->articulo_model->buscar();
						$this->load->view('articulo/pase',$data);
						$this->load->view('pie');

					}
				else
					{
						 $this->articulo_model->pase();
						 redirect(base_url(), 'refresh');

					}
			
		}

	public function buscar()
		{
						$data['menu']="articulo";
						$this->load->view('cabecera',$data);
						$this->load->model('clasificacion_model');
						$this->load->model('dependencia_model');
						$data['item'] = $this->clasificacion_model->get_clasificacion();
						$data['dependencias'] = $this->dependencia_model->get_dependencia();
						$data['articulos'] = $this->articulo_model->buscar();
						$this->load->view('articulo/pase',$data);
						$this->load->view('pie');
		}
	
}

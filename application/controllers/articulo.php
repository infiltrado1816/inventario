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
		$this->form_validation->set_rules('numeroemco', 'Número Emco', 'required|max_length[45]');
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



		public function prestamo()
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
						$this->load->view('articulo/prestamo',$data);
						$this->load->view('pie');

					}
				else
					{
						 $this->articulo_model->prestamo();
						 $this->xls_vale_prestamo();
						 redirect(base_url(), 'refresh');

					}
			
		}



		public function retorno()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('id_articulo', 'Articulo', 'required');
				if ($this->form_validation->run() == FALSE)
					{
						$data['menu']="articulo";
						$this->load->view('cabecera',$data);
						$data['articulos'] = $this->articulo_model->get_articulo_prestamo();
						$this->load->view('articulo/retorno',$data);
						$this->load->view('pie');

					}
				else
					{
						 $this->articulo_model->retorno();
						 redirect(base_url(), 'refresh');

					}
			
		}


		public function reparacion()
		{
					$data['menu']="articulo";
						$this->load->view('cabecera',$data);
						$data['articulos'] = $this->articulo_model->get_articulo();
						$this->load->view('articulo/reparacion',$data);
						$this->load->view('pie');	
		}

		public function reparacionobs($id_articulo)
		{

				$this->load->library('form_validation');
				$this->form_validation->set_rules('observacion', 'Observacion', 'required|max_length[254]');
				if ($this->form_validation->run() == FALSE)
					{
						$data['menu']="articulo";
						$this->load->view('cabecera',$data);
						$data['articulos'] = $this->articulo_model->get_articulo();
						$this->load->view('articulo/reparacionobs',$data);
						$this->load->view('pie');

					}
				else
					{
						 $this->articulo_model->reparacion();
						 redirect(base_url(), 'refresh');

					}
		}

	public function buscar($origen)
		{
						$data['menu']="articulo";
						$this->load->view('cabecera',$data);
						$this->load->model('clasificacion_model');
						$this->load->model('dependencia_model');
						$data['item'] = $this->clasificacion_model->get_clasificacion();
						$data['dependencias'] = $this->dependencia_model->get_dependencia();
						$data['articulos'] = $this->articulo_model->buscar();
						$this->load->view('articulo/'.$origen,$data);
						$this->load->view('pie');
		}

	public function xls_vale_prestamo()
	{ 
    // inicializamos la librería
        $this->load->library('PHPExcel.php');
        $file = './Vale.xlsx';                             
        $this->phpexcel = PHPExcel_IOFactory::load($file);
        // configuramos las propiedades del documento
        $this->phpexcel->getProperties()->setCreator("Comando Conjunto Austral")
                                     ->setLastModifiedBy("Comando Conjunto Austral")
                                     ->setTitle("Inventario Departamento")
                                     ->setSubject("")
                                     ->setDescription("")
                                     ->setKeywords("")
                                     ->setCategory("");         
         
        // agregamos información a las celdas       
      $this->load->model('dependencia_model');   
      $key = $this->articulo_model->get_articulo($this->input->post('id_articulo'));
      $dependencia = $this->dependencia_model->get_dependencia($this->input->post('dependencias_id'));      
      $i=1;
      $j=12; 
      $this->phpexcel->setActiveSheetIndex(0)->setCellValue('B'.$j, $i)->setCellValue('B7', 'DEPENDENCIA : '.$dependencia['nombre']);      
      $this->phpexcel->setActiveSheetIndex(0)
        ->setCellValue('B'.$j, $i)
        ->setCellValue('C'.$j, '1')
        ->setCellValue('D'.$j, $key['descripcion'])
        ->setCellValue('E'.$j, $key['serie'])
        ->setCellValue('F'.$j, $key['numeroemco']);      
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Prestamo Inventario');     
        // configuramos el documento para que la hoja
        // de trabajo número 0 sera la primera en mostrarse
        // al abrir el documento
        $this->phpexcel->setActiveSheetIndex(0);
         
         
        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="PrestamoInventario.xlsx"');
        header('Cache-Control: max-age=0');
         
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}

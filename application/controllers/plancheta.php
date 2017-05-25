<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plancheta extends CI_Controller {

	

	public function __construct()
	{
		parent::__construct();
    if(!$this->session->userdata('login'))
         redirect(base_url()."login");
		$this->load->model('plancheta_model');
	}

	public function dependencia()
	{		
			$this->load->model('dependencia_model');
			$data['menu']="dependencia";
			$data['dependencias_id']=$this->input->post('dependencias_id');
			$this->load->view('cabecera',$data);
			$data['dependencia_item'] = $this->dependencia_model->get_dependencia();
			$data['item'] = $this->plancheta_model->get_plancheta_dependencia();
			$this->load->view('plancheta/dependencia',$data);
			$this->load->view('pie');		
	}

	public function clasificacion()
	{		
			$this->load->model('clasificacion_model');
			$data['menu']="clasificacion";
			$data['clasificacion_id']=$this->input->post('clasificacion_id');
			$this->load->view('cabecera',$data);
			$data['clasificacion_item'] = $this->clasificacion_model->get_clasificacion();
			$data['item'] = $this->plancheta_model->get_plancheta_clasificacion();
			$this->load->view('plancheta/clasificacion',$data);
			$this->load->view('pie');		
	}


	public function resumen()
	{		
			$data['menu']="clasificacion";
			$this->load->view('cabecera',$data);
			$data['item'] = $this->plancheta_model->get_resumen();
			$this->load->view('plancheta/resumen',$data);
			$this->load->view('pie');		
	}




	public function pdf_dependencias()
	{
	
    
    // inicializamos la librería
        $this->load->library('PHPExcel.php');
        $file = './Myexcel.xlsx';                             
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
      $item = $this->plancheta_model->get_plancheta_dependencia();
      $dependencia = $this->dependencia_model->get_dependencia($this->input->post('dependencias_id'));
      
      $i=1;
      $j=12;
 
      $this->phpexcel->setActiveSheetIndex(0)->setCellValue('B'.$j, $i)->setCellValue('B7', 'DEPENDENCIA : '.$dependencia['nombre']);
        
      foreach ($item as $key ) {
        $this->phpexcel->setActiveSheetIndex(0)
        ->setCellValue('B'.$j, $i)
        ->setCellValue('C'.$j, '1')
        ->setCellValue('D'.$j, $key['descripcion'])
        ->setCellValue('E'.$j, $key['serie'])
        ->setCellValue('F'.$j, $key['numeroemco']);
        $i++;
        $j++;
      }

         
       
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Inventario');
         
         
        // configuramos el documento para que la hoja
        // de trabajo número 0 sera la primera en mostrarse
        // al abrir el documento
        $this->phpexcel->setActiveSheetIndex(0);
         
         
        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="inventario.xlsx"');
        header('Cache-Control: max-age=0');
         
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');
    }

public function xls_dependencias()
	{


      $this->load->model('dependencia_model');
      $data['dependencias_id']=$this->input->post('dependencias_id');
      $data['dependencia_item'] = $this->dependencia_model->get_dependencia();
      $data['item'] = $this->plancheta_model->get_plancheta_dependencia();
      $this->load->view('plancheta/xls',$data);

	

}
}

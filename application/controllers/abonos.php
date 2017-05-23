<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abonos extends CI_Controller {

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
		$this->load->model('abonos_model');
	}
	
	

	public function index()
	{
		$data['menu']="abonos";
		$this->load->view('cabecera',$data);
		$data['abonos'] = $this->abonos_model->get_abonos();
		$this->load->view('abonos/abonos',$data);
		$this->load->view('pie');
	}
	public function ficha($id)
	{
		$data['menu']="abonos";
		$this->load->view('cabecera',$data);
		$data['abonos'] = $this->abonos_model->get_abonos($id);
		$data['facturas'] = $this->abonos_model->get_facturas($id);
		$this->load->view('abonos/ficha',$data);
		$this->load->view('pie');
	}
		public function nuevo($id_factura=FALSE)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('monto', 'monto', 'required|integer|max_length[45]|callback_monto_check');
		$this->form_validation->set_rules('fecha', 'fecha', 'required');
		$this->form_validation->set_rules('facturas_id', 'facturas_id', 'required');
		

		if ($this->form_validation->run() == FALSE)
			{
				$data['factura_seleccionada']=$id_factura;
				$data['menu']="abonos";
				$this->load->view('cabecera',$data);
				$this->load->model('facturas_model');
				$data['facturas'] = $this->facturas_model->get_facturas_pendientes();
				$this->load->view('abonos/nuevo',$data);
				$this->load->view('pie');
			}
		else
			{
				

				$this->load->model('facturas_model');
				$data['facturas'] = $this->facturas_model->get_facturas($this->input->post('facturas_id'));
				$monto_deuda=$data['facturas']['deuda'];
				$this->abonos_model->set_abonos();
				$nuevo_monto=$monto_deuda-$this->input->post('monto');
				if($nuevo_monto==0)
				{

					$this->abonos_model->set_facturas_cancelado($this->input->post('facturas_id'));
				}

				$this->abonos_model->set_abonos_factura($nuevo_monto,$this->input->post('facturas_id'));
				redirect(base_url()."facturas/ficha/".$this->input->post('facturas_id'), 'refresh');
			}
	}
	public function monto_check($str)
	{	

		$this->load->model('facturas_model');
		$data['facturas'] = $this->facturas_model->get_facturas($this->input->post('facturas_id'));
		$monto_deuda=$data['facturas']['deuda'];
		if ($str > $monto_deuda)
		{
			$this->form_validation->set_message('monto_check', 'el %s ingresado supera la deuda');
			return FALSE;
		}
		else
		{

			return TRUE;
		}
	}

	public function eliminar($id_abono,$id_factura)
	{
		$abonos = $this->abonos_model->get_abonos($id_abono);
		$this->load->model('facturas_model');
		$facturas = $this->facturas_model->get_facturas($id_factura);
		$monto=$facturas['deuda']+$abonos['monto'];


		$this->abonos_model->del_abono_factura($id_factura,$monto);//incrementa la deuda en la factura
		$this->abonos_model->del_abono($id_abono); // elimina el abono
		$this->abonos_model->set_facturas_pendiente($id_factura);

		redirect(base_url()."facturas/ficha/".$id_factura, 'refresh');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
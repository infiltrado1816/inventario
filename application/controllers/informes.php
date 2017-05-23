<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informes extends CI_Controller {

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
	public function deudas($id_cliente)
	{
	
    

	
		$this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Plasticat');
        $pdf->SetTitle('Listado deudas');
        $pdf->SetSubject('Facturas Impagas');
        //$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 /*/
 //datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 */
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 10, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
      

     $this->load->model('clientes_model');
     $data['clientes'] = $this->clientes_model->get_clientes($id_cliente);

        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>";
        //$html .= "th{color: #fff; font-weight: bold; background-color: #222}";
        //$html .= "td{background-color: #AAC7E3; color: #fff}";
          $html .= "table {
   width: 100%;
   border: 1px solid #999;
   text-align: left;
   border-collapse: collapse;
   margin: 0 0 1em 0;
   caption-side: top;
   font-size:11px;
}
caption, td, th {
   padding: 0.3em;
}
th, td {
   border-bottom: 1px solid #999;
  
}
caption {
   font-weight: bold;
   font-style: italic;
}";
         
        $html .= "</style>";
       
        $html .= "<h2>Informe de Deuda</h2>";
        $html .= "<p>Fecha de Informe : ".date('d-m-Y')."</p>";


        $html .= "<table width='100%'>";
        $html .= "<tr><th>Datos del Cliente</th><th></th></tr>";
        $html .= "<tr><td>Razón Social</td><td>:  ".$data['clientes']['razon']."</td></tr>";
        $html .= "<tr><td>RUT</td><td>:  ".$data['clientes']['rut']."</td></tr>";
        $html .= "</table>";
        $html .= "<h2>Facturas Impagas</h2>";
       
        $data['facturas'] = $this->clientes_model->get_facturas_pendientes($id_cliente);
         $html .= "<table width='100%'>";
         $html .= "<tr><th>Numero Factura</th><th>Fecha Factura</th><th>Monto</th><th>Tipo Abono</th><th>Fecha Abono</th><th>Abono</th><th>Deuda Factura</th></tr>";
          $this->load->model('facturas_model');

        

      $deuda_total=0;
      	  foreach ($data['facturas'] as $fila) 
        {
            $deuda_total=$deuda_total+$fila['deuda'];
            $html .= "<tr><td>" . $fila['numero'] . "</td><td>" . date("d-m-Y",strtotime($fila['fecha'])) . "</td><td>" . number_format($fila['monto'],0,',','.'). "</td><td></td><td></td><td></td><td>" . number_format($fila['deuda'],0,',','.') . "</td></tr>";
            $abonos=$this->facturas_model->get_abonos($fila['id']);
            foreach ($abonos as $abono) 
                {

                     $html .= "<tr><td></td><td></td><td></td><td>" . $abono['forma_pago'] . "</td><td>" . date("d-m-Y",strtotime($abono['fecha'])). "</td><td>" . number_format($abono['monto'],0,',','.') . "</td><td></td></tr>";
                 
                      
                }

           
        }
        $html .= "</table>";
         $html .= "<h2>DEUDA TOTAL : ".number_format($deuda_total,0,',','.')."</h2>";
       
 
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Localidades de pdf.pdf");
        $pdf->Output($nombre_archivo, 'I');
    }




    public function deudas_local()
  {
  
    

  
    $this->load->library('Pdf');
           $pdf = new Pdf('P', 'mm', 'LETTER', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Plasticat');
        $pdf->SetTitle('Listado deudas');
        $pdf->SetSubject('Facturas Impagas');
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        //$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 /*/
 //datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 */
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 10, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
//fijar efecto de sombra en el texto
       // $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
      

    

        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>";
        
        //$html .= "td{background-color: #AAC7E3; color: #fff}";
          $html .= "table {
   width: 100%;
   border: 1px solid #999;
   text-align:rigth;
   border-collapse: collapse;
   margin: 0 0 1em 0;
   caption-side: top;
   font-size:11px;
}
caption, td {
   padding: 0.3em;
}
caption {
   font-weight: bold;
   font-style: italic;
}";
        $html .= "th{border-bottom: 1px solid #999";
        $html .= "</style>";
       
        $html .= "<h2>PLASTICATT - INFORME FACTURAS IMPAGAS</h2>";
        $html .= "<h2>OFICINA</h2>";
       
        $html .= "<p>FECHA DE INFORME : ".date('d-m-Y')."</p>";


      $this->load->model('clientes_model');
      $data['clientes'] = $this->clientes_model->get_clientes_local();

    
       
      $html .= "<table width='100%'>";
      $html .= '<tr><th style="width:40%;text-align:center;">RAZÓN SOCIAL</th><th style="width:15%">FACTURA</th><th style="width:15%">FECHA</th><th style="width:15%">MONTO</th><th style="width:15%">DEUDA</th></tr>';
$id_cliente=0;
$deuda_total=0;
$deuda_cliente=0;
        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
          foreach ($data['clientes'] as $fila) 
        {
         
          if($id_cliente==$fila['CLIENTES_id'])
          {
            $id_cliente=$fila['CLIENTES_id'];
            $html .= "<tr><td  ></td><td>" . $fila['numero'] . "</td><td>" . date("d-m-Y",strtotime($fila['fecha'])) . "</td><td>" . number_format($fila['monto'],0,',','.') . "</td><td>".number_format($fila['deuda'],0,',','.') ."</td></tr>";
          }else
          {
             if($id_cliente!=0)
                {
                  $html .= '<tr ><td style="border-bottom: 1px solid #999"  ></td><td style="border-bottom: 1px solid #999"></td><td style="border-bottom: 1px solid #999"><h3>TOTALES</h3></td><td style="border-bottom: 1px solid #999"></td><td style="border-bottom: 1px solid #999"><h3>'.number_format($deuda_cliente,0,',','.')."</h3></td></tr>";
                  $deuda_cliente=0;
                  
                }

             $id_cliente=$fila['CLIENTES_id'];
             $html .= '<tr><td  style="width:40%;text-align:left">' . $fila['razon'] . "</td><td>" . $fila['numero'] . "</td><td>" . date("d-m-Y",strtotime($fila['fecha'])) . "</td><td>" . number_format($fila['monto'],0,',','.') . "</td><td>".number_format($fila['deuda'],0,',','.') ."</td></tr>";
          }
            $deuda_total=$deuda_total+$fila['deuda'];
           $deuda_cliente=$deuda_cliente+$fila['deuda'];
        }
            $html .= "<tr><td  ></td><td></td><td><h3>TOTAL</h3></td><td></td><td><h3>".number_format($deuda_cliente,0,',','.')."</h3></td></tr>";
              
        $html .= "</table>";
       $html .= "<h2>DEUDA TOTAL : ".number_format($deuda_total,0,',','.')."</h2>";
         
       
 
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Localidades de pdf.pdf");
        $pdf->Output($nombre_archivo, 'I');
    }


      public function deudas_reparto()
  {
  
    

  
    $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Plasticat');
        $pdf->SetTitle('Listado deudas');
        $pdf->SetSubject('Facturas Impagas');
           $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        //$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 /*/
 //datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
     
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 */
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 10, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
      

    

        //preparamos y maquetamos el contenido a crear
        $html = '';
        $html .= "<style type=text/css>";
        
        //$html .= "td{background-color: #AAC7E3; color: #fff}";
          $html .= "table {
   width: 100%;
   border: 1px solid #999;
   text-align:rigth;
   border-collapse: collapse;
   margin: 0 0 1em 0;
   caption-side: top;
   font-size:11px;
}
caption, td {
   padding: 0.3em;
}
caption {
   font-weight: bold;
   font-style: italic;
}";
        $html .= "th{border-bottom: 1px solid #999";
        $html .= "</style>";
       
        $html .= "<h2>PLASTICATT - INFORME FACTURAS IMPAGAS</h2>";
        $html .= "<h2>REPARTO</h2>";
       
        $html .= "<p>FECHA DE INFORME : ".date('d-m-Y')."</p>";


      $this->load->model('clientes_model');
      $data['clientes'] = $this->clientes_model->get_clientes_reparto();

    
       
      $html .= "<table width='100%'>";
      $html .= '<tr><th style="width:40%;text-align:center;">RAZÓN SOCIAL</th><th style="width:15%">FACTURA</th><th style="width:15%">FECHA</th><th style="width:15%">MONTO</th><th style="width:15%">DEUDA</th></tr>';
$id_cliente=0;
$deuda_total=0;
$deuda_cliente=0;
        //provincias es la respuesta de la función getProvinciasSeleccionadas($provincia) del modelo
          foreach ($data['clientes'] as $fila) 
        {
         
          if($id_cliente==$fila['CLIENTES_id'])
          {
            $id_cliente=$fila['CLIENTES_id'];
            $html .= "<tr><td  ></td><td>" . $fila['numero'] . "</td><td>" . date("d-m-Y",strtotime($fila['fecha'])) . "</td><td>" . number_format($fila['monto'],0,',','.') . "</td><td>".number_format($fila['deuda'],0,',','.') ."</td></tr>";
          }else
          {
             if($id_cliente!=0)
                {
                  $html .= '<tr ><td style="border-bottom: 1px solid #999"  ></td><td style="border-bottom: 1px solid #999"></td><td style="border-bottom: 1px solid #999"><h3>TOTALES</h3></td><td style="border-bottom: 1px solid #999"></td><td style="border-bottom: 1px solid #999"><h3>'.number_format($deuda_cliente,0,',','.')."</h3></td></tr>";
                  $deuda_cliente=0;
                  
                }

             $id_cliente=$fila['CLIENTES_id'];
             $html .= '<tr><td  style="width:40%;text-align:left">' . $fila['razon'] . "</td><td>" . $fila['numero'] . "</td><td>" . date("d-m-Y",strtotime($fila['fecha'])) . "</td><td>" . number_format($fila['monto'],0,',','.') . "</td><td>".number_format($fila['deuda'],0,',','.') ."</td></tr>";
          }
            $deuda_total=$deuda_total+$fila['deuda'];
           $deuda_cliente=$deuda_cliente+$fila['deuda'];
        }
            $html .= "<tr><td  ></td><td></td><td><h3>TOTAL</h3></td><td></td><td><h3>".number_format($deuda_cliente,0,',','.')."</h3></td></tr>";
              
        $html .= "</table>";
       $html .= "<h2>DEUDA TOTAL : ".number_format($deuda_total,0,',','.')."</h2>";
         
       
 
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Localidades de pdf.pdf");
        $pdf->Output($nombre_archivo, 'I');
      }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
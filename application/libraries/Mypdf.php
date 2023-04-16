<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class Mypdf
{
  protected $ci;

  public function __construct()
  {
        $this->ci =& get_instance();
  }

  public function generate($view, $x, $filename = 'Laporan', $paper = 'A4', $orientation='portrait')
  {
    $dompdf = new Dompdf();
    $html = $this->ci->load->view($view, $x, TRUE);
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    // Render the HTML as PDF
    $dompdf->render();
      $dompdf->stream( $filename . ".pdf", array("Attachment" => FALSE));

  }

}

/* End of file Mypdf.php */
/* Location: ./application/libraries/Mypdf.php */

   
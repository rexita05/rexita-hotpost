<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once dirname(__FILE__) . '/tcpdf/config/lang/eng.php';
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{

	public function Header() {
		// Logo
		$this->Image('assets/image/watermark_nesindo.png', 50, 19, 100, 37, 'PNG', '', '', true, 300, '', false, false, '', false, false, false);
	}

	//Page footer
	public function Footer(){
		$this->SetY(10);
		$this->SetX(10);
        // Page number
        $this->Cell(0, 0,$this->Image('assets/image/stempel-lunas.png','','','',35), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}

}

function tcpdf(){
	return new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
}

?>

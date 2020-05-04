<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class StaffReport extends TCPDF { 
	function __construct() { 
		parent::__construct(); 
	}
	
	//Page header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, 'Staff Activities Report', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // $this->MultiCell(100, 1, 'HIDSKJLFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF', 0, '', 0, 1, '', '', true, 0, false, true, 0, 'T', false);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
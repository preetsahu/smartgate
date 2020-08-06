<?php

class generateReport extends TCPDF 
{
    //Page header
    public function Header() {
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, 'Student Activities Report', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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



   //load pdf library
  // $this->load->library('StudentReport');
   
   $pdf = new generateReport(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
   // set document information
   $pdf->SetCreator(PDF_CREATOR);
   $pdf->SetAuthor('https://www.nitrr.ac.in');
   $pdf->SetTitle('Student Acitivity Report');
   $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
   $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

   // set default header data
   //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

   // set header and footer fonts
   $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
   $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

   // set default monospaced font
   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

   // set margins
   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

   // set auto page breaks
   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

   // set image scale factor
   $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

   // set font
   $pdf->SetFont('times', 'BI', 12);
   
   // ---------------------------------------------------------
   
   
   //Generate HTML table data from MySQL - start
   $template = array(
       'table_open' => '<table border="0" cellpadding="1" cellspacing="1">'
    );

    $this->table->set_template($template);
    $this->table->set_heading('NAME:','MOBILE:', 'DEPARTMENT NAME:', 'STUDENT ID:','COURSE:','SEMESTER:');

    // $studentDetails = $this->AdminModel->GetStudentByIDModel($str)->result();

    foreach ($studentDetails as $s)
    {
    $sid=$s->STUDENT_ID;
    $mob=$s->MOBILE_NUMBER;
    $name=$s->FIRST_NAME.' '.$s->LAST_NAME;
    $dept=$s->DEPARTMENT_NAME;
    $course=$s->COURSE_NAME;
    $SEM=$s->SEMESTER;
    $this->table->add_row($name,$mob,$dept,$sid,$course,$SEM);
    }

    $html = $this->table->generate();
    //Generate HTML table data from MySQL - start
    // // add a page
    $pdf->AddPage();

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // // reset pointer to the last page
    $pdf->lastPage();


    $template = array(
    'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
    );

    $this->table->set_template($template);

    $this->table->set_heading('DATE', 'IN TIME', 'OUT TIME', 'SPEND HOURS');
    // $studentactivity = $this->AdminModel->completeStudentActivityViewModel($str)->result();
    foreach($studentactivity as $sca)
    {
    $date1=date_create("$sca->IN_DATE_TIME");
    $date2=date_create("$sca->OUT_DATE_TIME");
    $dateFormat=date_format($date1,"d-M-Y");
    $inTime=date_format($date1,"H:i:s:A");
    $outTime=date_format($date2,"g:i:s:A");
    $diff=date_diff($date1,$date2);
    $this->table->add_row($dateFormat,$inTime, $outTime,$diff->format("%h hour %I minutes %s sec"));
    }

    $html = $this->table->generate();
    //Generate HTML table data from MySQL - end

    // add a page
    $pdf->AddPage();

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // reset pointer to the last page
    $pdf->lastPage();

    //Close and output PDF document
    $pdf->Output($str.'.pdf', 'I');
    // echo json_encode($msg);


?>
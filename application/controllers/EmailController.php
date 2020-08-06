<?php
class EmailController extends CI_Controller 
{

    public function __construct() 
	{
        parent:: __construct();

        $this->load->helper('url');
    }

    public function emailTest() 
	{
        $this->load->view('email');
    }

    function send() 
	{
        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');
        $to = $this->input->post('to');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()) 
		{
            echo 'Email has been sent successfully';
        } 
		else 
		{
            show_error($this->email->print_debugger());
        }
    }
}
?>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kuala_Lumpur');

class Html_to_pdf extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load library and model
		$this->load->model('db_action');
		$this->load->library('dompdf_gen');
	}
	public function gen_pdf_by_time()
	{
		$post = $this->input->post(NULL);
		switch($post):
			case isset($post['download']):	
				$data['get_data'] = $this->db_action->get_data_pdf();
				$this->load->view('form_download',$data);
				$html = $this->output->get_output();
				$this->dompdf->load_html($html);
				$this->dompdf->render();
				$this->dompdf->stream("customer.pdf");
			break;
			endswitch;
	}
	public function gen_pdf_by_id()
	{
		$post = $this->input->post(NULL);
		switch($post):
		case isset($post['download']):
				$data['get_data'] = $this->db_action->get_field_by_id();
				$this->load->view('form_download',$data);
				$html = $this->output->get_output();
				$this->dompdf->load_html($html);
				$this->dompdf->render();
				$this->dompdf->stream("customer.pdf");
			break;
			endswitch;
	}
}
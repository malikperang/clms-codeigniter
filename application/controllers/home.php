<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('db_action');
	}
	function index()
	{
		$data['title'] = "Home";
		$this->load->view('template/header',$data);
		$this->load->view('home', array('upload_error' => '' ));
		$this->load->view('template/footer');
	}
}
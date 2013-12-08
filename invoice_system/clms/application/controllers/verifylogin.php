<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user','',TRUE);
  }

  function index()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $data['title'] = ucfirst('Admin Login');
      $this->load->view('template/header' , $data);
      $this->load->view('login');
      $this->load->view('template/footer');
    }
    else
    {
      //Go to private area
      redirect('home/index', 'refresh');
    }
    
  }
  
  function check_database()
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    
    //query the database
    $result = $this->user->login($username, md5($password));
    
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'username' => $row->username
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {

      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    }
  }
}
?>
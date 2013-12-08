<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_action');
            $this->load->library('pagination');

	}
	public function index()
	{
		$config = array(
			'base_url' => base_url() . '/navbar/index/',
      		'total_rows' => $this->db_action->count_data(),
      		'per_page'   => 9, //edit this to change the limit data
      		'full_tag_open' => '<div class="pagination" style="float:right;"><ul>',
      		'first_link' => '&laquo; First',
      		'first_tag_open' =>  '<li class="prev page">',
      		'first_tag_close' => '</li>',
      		'last_link' => 'Last &raquo;',
      		'last_tag_open' => '<li class="next page">',
      		'last_tag_close' => '</li>',
      		'next_link' => 'Next &rarr;',
      		'next_tag_open' => '<li class="next page">',
      		'next_tag_close' => '</li>',
      		'prev_link' => '&larr; Previous',
      		'prev_tag_open' => '<li class="prev page">',
      		'prev_tag_close' => '</li>',
      		'cur_tag_open' => '<li class="active"><a href="">',
      		'cur_tag_close' => '</a></li>',
      		'num_tag_open' => '<li class="page">',
      		'num_tag_close' => '</li>'
      		);
      	$this->pagination->initialize($config);
            $data = array(
                  'get_data' => $this->db_action->get_all_field_data($config['per_page'],$this->uri->segment(3)),
                  'links' => $this->pagination->create_links(),
                  'title' => 'Customer Profile',
                  'count_row_value_all' => $this->db_action->count_data()
                  );
            $data['count_row_value' ] = count($data['get_data']);
            if($data['count_row_value_all'] == 0):
                  $data['count_row_value' ] = 0;
                  echo $data['count_row_value'];
                  endif;
            $this->load->view('template/header',$data);
            $this->load->view('template/navbar',$data);
            $this->load->view('data_query',$data);
            $this->load->view('template/footer');
	}
      /////////////////////////////////////section ni tak guna lagi . dalam pembangunan .//////////////////////////////////
      public function user_profile()
      {
            $data = array(
                  'title' => 'Profil Pengguna'
                  );
            $this->load->view('template/header',$data);
            $this->load->view('template/left_panel',$data);
            $this->load->view('pages/user_profile',$data);
            $this->load->view('template/footer');
      }
      public function system_log()
      {
            $data = array(
                  'title' => 'Profil Pengguna'
                  );
            $this->load->view('template/header',$data);
            $this->load->view('template/left_navbar',$data);
            $this->load->view('pages/system_log',$data);
            $this->load->view('template/footer');
      }
}
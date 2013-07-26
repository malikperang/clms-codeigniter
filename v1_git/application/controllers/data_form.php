<?php if (!isset($_SERVER['HTTP_REFERER'])) exit('No direct access url allowed');
date_default_timezone_set('Asia/Kuala_Lumpur');

class Data_form extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load library and model
		$this->load->model('db_action');
		$this->load->library('upload');
		$this->load->library('dompdf_gen');
	}
	/** 
	 * general_form function.
	 * process the form validation for the General Form.
	 */
	public function general_form() 
	{
		//setting rules for form validation
		//how to add form_validation rules:
		//add this statement $this->form_validation->set_rules('yourhumanname','yourrules');
		//tetapan untuk form validation rules
		$this->form_validation->set_rules('name', 'Nama','trim|required|xss_clean');
		$this->form_validation->set_rules('ic_num', 'No Kad Pengenalan','trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Alamat','trim|required|xss_clean');
		$this->form_validation->set_rules('second_address', 'Alamat','trim|xss_clean');
		$this->form_validation->set_rules('phone_num', 'No. Telefon','trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');
		//check if form validation return to false
		//semak samada form validation ok atau tak
		if ($this->form_validation->run() == FALSE)
		{
			//if form validation error,redirect to here
			//jika form validation gagal, masuk ke sini
			$data = array('upload_error' => '',);
			$data['title'] = ucfirst('home');
			$this->load->view('template/header',$data);
			$this->load->view('home',$data);
			$this->load->view('template/footer');
		}
		else
		{
			//check wether the the post is numeric or not
			$input_data  = $this->input->post('ic_num');
			if(!is_numeric($input_data))
			{
				$this->session->set_flashdata('error', $input_data . " " . "bukan nombor!");
				redirect('home','refresh');
			}
			 unset($input_data);
			//if form validation successful,redirect to here
			//$config = config the uploading rules
			//jika form validation berjaya masuk kesini
			//$config = config untuk uploading rules
			$config['upload_path'] = 'image/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$config['file_name'] = 'ic_pic';
			//initialize the config
			$this->upload->initialize($config);
			//check if upload validation run to false
			if ( ! $this->upload->do_upload())
			{
				//if upload validation run to false display the error and redirect to here
				$data = array('upload_error' => '<div class="alert alert-error"><h4>Amaran!</h4><button type="button" class="close" data-dismiss="alert">&times;</button>' . $this->upload->display_errors() . '</div>');
				$data['title'] = ucfirst('home');
				$this->load->view('template/header',$data);
				$this->load->view('home',$data);
				$this->load->view('template/footer');
				}
				else
					{	
						//if upload validation successful redirect to here
						$upload_data = $this->upload->data();
						//get the post data e.g: name,age,sex
						$data['ic_num'] = $this->input->post('ic_num');
						//checking whether inputted data already exists on databases or not
           		 		$check = $this->db_action->check_record($data);
            			if($check == 0)
            			{
            				//if data not existed on databases,redirect to here and  submit the data,and display it.
            				$data = array(
            					'title'=>ucfirst('Success!'),
            					'image_name' => $upload_data['file_name'],
            				    'name' => $this->input->post('name'),
            					'ic_num' => $this->input->post('ic_num'),
            					'address' => $this->input->post('address'),
            					'phone_num' => $this->input->post('phone_num'),
            					'email' => $this->input->post('email')
            					);
            				//$this->db_action->save_data();
              				$this->db_action->insert($data);
                			$this->load->view('template/header',$data);
                			$this->load->view('form_success',$data);
                			$this->load->view('template/footer');
            				}
            				else 
            				{
            			//if data existed,prosess this ouput
            					$this->session->set_flashdata('error','Maaf data sudah ada rekod!');
            					redirect('home','refresh');
            					}
	            	}
			}
	}
	public function edit_form()
	{
		$this->form_validation->set_rules('id');
		$this->form_validation->set_rules('name', 'Nama','trim|required|xss_clean');
		$this->form_validation->set_rules('ic_num', 'No Kad Pengenalan','trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Alamat','trim|required|xss_clean');
		$this->form_validation->set_rules('phone_num', 'No. Telefon','trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			//if form validation error,redirect to here
			//jika form validation gagal, masuk ke sini
			$data = array('upload_error' => '',);
			$data['title'] = ucfirst('home');
			$this->load->view('template/header',$data);
			$this->load->view('home',$data);
			$this->load->view('template/footer');
		}
		else
		{
			$this->db_action->update_data();
			$data = array(
				'title' => "Edit Data",
				'get_data' => $this->db_action->get_field_by_id()
				);
			$this->session->set_flashdata('result','Data sudah dikemaskini!');
			$this->load->view('template/header',$data);
			$this->load->view('edit_form',$data);
			$this->load->view('template/footer');
		}

	}
	/**
	* search_validation	function
	*
	* form process for search form validation
	* listing the user data enquiry
	*/
	public function search_form()
	{
		$search = $this->input->post('search');
		$input_data  = $this->input->post('num_ic');
		switch ($input_data):
			case empty($input_data):
				$this->session->set_flashdata('search-error','Sila isi kotak carian dengan No. Kad Pengenalan!');
				redirect('home','refresh');
				break;
			case !is_numeric($input_data):
				$this->session->set_flashdata('search-error',$input_data . ' ' . 'bukan nombor!');
				redirect('home','refresh');
				break;
			case $input_data:
				$result = $this->db_action->search($input_data);
				if(empty($result))
    				{
    					$this->session->set_flashdata('search-error',$input_data . ' ' .'tiada dalam rekod!');
    					redirect('home','refresh');
    				}
    			else{
    			$data['result'] = $result;
       			////////////COMMON DATA DISPLAY//////////////////
       			$data['alert'] = "Data yang dijumpai untuk pencarian" . " " . "'<font color='black'>" . $input_data . "</font>'";
        		$data['title'] = ucfirst('Search');
        		/////////////////LOAD VIEW//////////////////////
    			$this->load->view('template/header', $data);
    			$this->load->view('search_success',$data);
    			$this->load->view('template/footer');
			}
		endswitch;
	}
	public function action_form()
	{
		$data = array(
			'title' => 'Edit',
			'get_data' => $this->db_action->get_one_field_data()
			);

		$post = $this->input->post(NULL);
		switch($post)
		{
			case isset($post['view']):
				$this->load->view('template/header',$data);
				$this->load->view('edit_form',$data);
				$this->load->view('template/footer');
				break;
			case isset($post['delete']):
				$this->db_action->delete_data();
				$this->session->set_flashdata('result', 'data telah dipadam');
				redirect('navbar','refresh');
				break;

		}
	}

}

/* End of file myfile.php */
/* Location: ./system/modules/mymodule/myfile.php */
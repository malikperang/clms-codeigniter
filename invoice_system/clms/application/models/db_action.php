<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Client Management System 
 *
 * Description:
 * Developed using CodeIgniter Open Source PHP framework.
 * 
 *
 * @package		Client Management System . Web Base System.
 * @author		Malik Perang
 * @copyright	Copyright (c) 2013 . Redline Code.
 * @license		NULL
 * @link		NULL
 * @since		Version 1.0
 * @email       malikperang@gmail.com
 * @filesource
 */
// ------------------------------------------------------------------------

class Db_Action extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('upload');
	}
	/*Insert function*
	 *****************
	 *Inserting all inputted data to databases.The data
	 *How to add data:
	 *Add your list of data on $data array() and put the key field as table field.
	 */
	function insert($data)
	{
		$upload_data = $this->upload->data();
		$data = array(
		'image_name' 	=> $upload_data['file_name'],
   		'name' 		=> $this->input->post('name'),
   		'ic_num' 	=> $this->input->post('ic_num'),
   		'address' 	=> $this->input->post('address'),
   		'phone_num' => $this->input->post('phone_num'),
   		'email'		=> $this->input->post('email')
		);

		$this->db->insert('customer', $data);
	}
	/*Check Data function*
	 *********************
	 *Check the inputted data wether it's already exists or not. 
	 *Return to false if data already exists.
	 *How to add data:
	 *Add your list of data on $data array  .
	 */
	function check_record($data)
	{
		$data = array(
			'ic_num'=> $this->input->post('ic_num')
			);

		foreach ($data as $value):
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('ic_num',$value);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
       	 return true;
    		}
    		else{
        	return false;
    		}
    	endforeach;
	}
	function update_data()
	{
		$id = $this->input->post('id');
		$data = array(
			'name' => $this->input->post('name'),
			'ic_num' => $this->input->post('ic_num'),
			'address' => $this->input->post('address'),
			'phone_num'=> $this->input->post('phone_num'),
			'email' => $this->input->post('email')
			);
		$this->db->where('customer_id', $id);
		$this->db->update('customer', $data); 
	}
	function delete_data()
	{
		$id = $this->input->post('delete');
		$this->db->delete('customer', array('customer_id' => $id)); 
	}
	/*Query data from DB*
	 *********************
	 *Description:
	 *	1.function get_one_field_data():
	 *		Query a data for pdf manipulation.
	 *	2.function get_all_field_data():
	 *		Query all data from databases.
	 */
	function get_one_field_data()
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where_in('customer_id',$this->input->post('view'));
		$query = $this->db->get();
		return $query->result();
	}
	function get_field_by_id()
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where_in('customer_id',$this->input->post('id'));
		$query = $this->db->get();
		return $query->result();
	}
	function get_data_pdf()
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->order_by('time','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_field_data($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->order_by('customer_id','desc');
		
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	function count_data()
	{
		$count = $this->db->get('customer');
		return $count->num_rows();
	}
	/*Search data on databases*
	 **************************
	 *Description:
	 *	Search the inputted string/data.
	 *	How to add credentials:
	 *	Add your list of credential on $data array .
	 *	e.g:
	 *	$data = array(
	 *			'list1' = 'item1',
	 *			'list2' = 'item2'
	 *			);
	 */

	function search($data)
	{
		$data = array(
			'ic_num' => $this->input->post('num_ic')
			);
		
		foreach($data as $value):
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('ic_num',$value);
		$this->db-> limit(1);
		endforeach;

		$query = $this->db->get();
		return $query->result();
	}

	
}
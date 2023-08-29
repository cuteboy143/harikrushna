<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Employee_location extends REST_Controller 
{
    public function __construct() 
	{
		parent::__construct();
		$this->load->model('api_v1/api_model');
        $this->form_validation->set_error_delimiters(' | ', '');
	}
	
	public function index_post()
	{
	    $this->form_validation->set_rules('entity', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('department', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('manager', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('employee', '', 'required', array('required' => '%s'));
	    $this->form_validation->set_rules('lat', '', 'required', array('required' => '%s'));
	    $this->form_validation->set_rules('long', '', 'required', array('required' => '%s'));
	    
	    if ($this->form_validation->run() == true) 
        {
            $data = array(
                'emp_lat' => $this->input->post("lat"),
                'emp_long' => $this->input->post("long"),
            );
            
            if($this->api_model->update('employee', array("entity" => $this->input->post("entity"), "department" => $this->input->post("department"), "manager" => $this->input->post("manager"), "id" => $this->input->post("employee")),$data)) 
            {
                $this->response(array('message' => 'Insert successfully.', 'Status' => '1'), REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response(array('message' => 'Something went wrong.', 'Status' => '0'), REST_Controller::HTTP_OK);
            }
        }
        else
        {
            $this->response([
                $this->config->item('rest_status_field_name') => 0,
                $this->config->item('rest_message_field_name') => 'Empty request parameter(s). [ ' . ltrim(str_replace("\n", '', validation_errors()), ' |') . ' ]',
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
	}
}
?>
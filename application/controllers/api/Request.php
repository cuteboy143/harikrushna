<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Request extends REST_Controller 
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
	    $this->form_validation->set_rules('description', '', 'required', array('required' => '%s'));

        if ($this->form_validation->run() == true) 
        {
            $data = array(
                "description" => $this->input->post("description"),
                "entity" => $this->input->post("entity"),
                "department" => $this->input->post("department"),
                "manager" => $this->input->post("manager"),
                "employee" => $this->input->post("employee"),
            );
            
            if($this->api_model->insert('request', $data)) 
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
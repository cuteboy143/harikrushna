<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Notification extends REST_Controller 
{
    public function __construct() 
	{
		parent::__construct();
		$this->load->model('api_v1/api_model');
        $this->form_validation->set_error_delimiters(' | ', '');
	}
	
	public function index_get()
	{
	    $data = $this->general_model->getAll("notification");
	    
	    if($data) 
        {
            $this->response(array('message' => 'Get successfully.', 'Status' => '1', 'result' => $data), REST_Controller::HTTP_OK);
        }
        else
        {
            $this->response(array('message' => 'Something went wrong.', 'Status' => '0', "result" => null ), REST_Controller::HTTP_OK);
        }
	}
	
	function  notifications_post()
	{
		$this->form_validation->set_rules('user_id', 'user_id', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			$error = implode(",", $this->form_validation->error_array());
			$error = explode(",", $error);
			$json = array("status" => 0,"message" =>  $error[0]);
		}
		else
		{
			$result = $this->general_model->getAll("notification");
		    $json = array("status" => 1,"message" => "Notifications List","data" => $result);
		}

		echo json_encode($json);
	}
}
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Schedule extends REST_Controller 
{
    public function __construct() 
	{
		parent::__construct();
		$this->load->model('api_v1/api_model');
        $this->form_validation->set_error_delimiters(' | ', '');
	}
	
	public function schedule_today_post()
	{
	    $this->form_validation->set_rules('entity', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('department', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('manager', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('employee', '', 'required', array('required' => '%s'));
	    $this->form_validation->set_rules('date', '', 'required', array('required' => '%s'));
	    
	    if ($this->form_validation->run() == true) 
        {
            //$api_date = $this->input->post('date');
            
            //$sch_data = $this->general_model->getAll('schedule', array("entity" => $this->input->post("entity"), "department" => $this->input->post("department"), "manager" => $this->input->post("manager"), "employee" => $this->input->post("employee") ));
            
            
            $emp_start_time = $this->input->post("emp_start_time");
            $emp_end_time = $this->input->post("emp_end_time");

            $schedule_data = $this->general_model->getAll('schedule', array("entity" => $this->input->post("entity"), "department" => $this->input->post("department"), "manager" => $this->input->post("manager"), "employee" => $this->input->post("employee") ));
            
            
            
            if(!empty($schedule_data) && !empty($emp_end_time))
            {
                $data = array(
                    "shift_status" => "completed",
                    "emp_end_time" => $emp_end_time,
                    "updated_on" => date("Y-m-d H:i:s"),
                );
                
                $this->api_model->update('schedule_shift', array("schedule_tbl_id" => $schedule_data->id, "date" => $this->input->post("date"), "shift_id" => $this->input->post("shift_id")), $data);
            }
            
            //echo "<pre>"; print_r($sch_data);

            $schedule_shift = array();
            foreach($schedule_data as $sch_val)
            {
                if(!empty($schedule_data) && !empty($emp_start_time))
                {
                    $data = array(
                        "shift_status" => "start",
                        "emp_start_time" => $emp_start_time,
                        "updated_on" => date("Y-m-d H:i:s"),
                    );
                    
                    $this->api_model->update('schedule_shift', array("schedule_tbl_id" => $sch_val->id, "date" => $this->input->post("date"), "shift_id" => $this->input->post("shift_id")), $data);
                }
            
                $this->db->select('*');
                $this->db->where('schedule_tbl_id', $sch_val->id);
                $this->db->where('date', $this->input->post("date"));
                $this->db->where('shift_status !=', "completed");
                $this->db->order_by("start_time asc");
                $schedule_shift[] = $this->db->get('schedule_shift')->result();
            }
            
            if(!empty($schedule_shift))
            {
                $this->response(array('message' => 'Get successfully.', 'Status' => '1', 'result' => $schedule_shift), REST_Controller::HTTP_OK);
            }
            else
            {
                $this->response(array('message' => 'Something went wrong.', 'Status' => '1', "result" => null ), REST_Controller::HTTP_OK);
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
	
	public function schedule_monthly_post()
	{
	    $this->form_validation->set_rules('entity', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('department', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('manager', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('employee', '', 'required', array('required' => '%s'));
	    $this->form_validation->set_rules('start_date', '', 'required', array('required' => '%s'));
	    $this->form_validation->set_rules('end_date', '', 'required', array('required' => '%s'));
	    
	    if ($this->form_validation->run() == true) 
        {
            $api_date = $this->input->post('date');
            
            $get_sch_id = $this->general_model->getOne('schedule', array("entity" => $this->input->post("entity"), "department" => $this->input->post("department"), "manager" => $this->input->post("manager"), "employee" => $this->input->post("employee") ));
            
            $this->db->select('shift_id, date, start_time, end_time');
            $this->db->where('schedule_tbl_id', $get_sch_id->id);
            $this->db->where('date >=', $this->input->post("start_date"));
            $this->db->where('date <=', $this->input->post("end_date"));
            $schedule_shift = $this->db->get('schedule_shift')->result();
            
            if($schedule_shift) 
            {
                $this->response(array('message' => 'Get successfully.', 'Status' => '1', 'result' => $schedule_shift), REST_Controller::HTTP_OK);
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
<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
include APPPATH . '/third_party/PHPMailer/PHPMailerAutoload.php';

class Auth extends REST_Controller 
{
	public function __construct() 
    {
		parent::__construct();
		$this->load->model('api_v1/auth_model');
        $this->form_validation->set_error_delimiters(' | ', '');
	}

 	public function register_post()
    {
		$this->form_validation->set_rules('name', '', 'required', array('required' => '%s'));
		$this->form_validation->set_rules('did', '', 'required', array('required' => '%s'));
		$this->form_validation->set_rules('email', '', 'required|trim|required|valid_email', array('required' => '%s'));
		$this->form_validation->set_rules('phone', '', 'required', array('required' => '%s'));
		$this->form_validation->set_rules('password', '', 'required|min_length[5]', array('required' => '%s'));
        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            // Validate Email
            $is_exist = $this->auth_model->validate_email($email);
            if ($is_exist) {
                $this->response([
                    $this->config->item('rest_status_field_name') => 0,
                    $this->config->item('rest_message_field_name') => 'User with email already exists!',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        	$data = array(
            	'name' => $this->input->post('name'),
            	'email' => $this->input->post('email'),
            	'phone' => $this->input->post('phone'),
            	'did' => $this->input->post('did'),
                'password' => md5($this->input->post('password')),
                'updated_on' => time(),
                'created_on' => time()
            );
        	if ($customer = $this->auth_model->register($data)) {
                $this->response([
                    $this->config->item('rest_status_field_name') => 1,
                    $this->config->item('rest_message_field_name') => 'Successfully registered.',
                    'result' => $customer
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else{
                $this->response([
                    $this->config->item('rest_status_field_name') => 0,
                    $this->config->item('rest_message_field_name') => 'Something went wrong please try again.',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }else{
            $this->response([
                $this->config->item('rest_status_field_name') => 0,
                $this->config->item('rest_message_field_name') => 'Empty request parameter(s). [ ' . ltrim(str_replace("\n", '', validation_errors()), ' |') . ' ]',
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
 	}

 	public function login_post()
    {
 		$this->form_validation->set_rules('email', '', 'required', array('required' => '%s'));
 		$this->form_validation->set_rules('password', '', 'required', array('required' => '%s'));
 		if ($this->form_validation->run() == true) 
        {
			$email = $this->input->post('email');
 			$password = $this->input->post('password');
 			$user = $this->auth_model->login($email, $password);
			if ($user) 
            {
                $this->db->update("employee", array("device_id" => $this->input->post("device_id")), array("email" => $this->input->post('email'), "password" => $this->input->post('password')));
                
                $this->response([
                    $this->config->item('rest_status_field_name') => 1,
                    $this->config->item('rest_message_field_name') => 'Successfully login.',
                    'result' => array($user)
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    $this->config->item('rest_status_field_name') => 0,
                    $this->config->item('rest_message_field_name') => 'Invalid email and password, please try again.',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
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
 	
 	public function edit_profile_post()
    {
 	    $this->form_validation->set_rules('name', '', 'required', array('required' => '%s'));
 		$this->form_validation->set_rules('phone', '', 'required', array('required' => '%s'));
 		$this->form_validation->set_rules('email', '', 'required', array('required' => '%s'));
 		$this->form_validation->set_rules('address', '', 'required', array('required' => '%s'));
 		if ($this->form_validation->run() == true) 
 		{
 		    $id = $this->input->post('id');
            
            $data = array(
        			'name' => $this->input->post('name'),
         			'phone' => $this->input->post('phone'),
         			'email' => $this->input->post('email'),
         			'address' => $this->input->post('address'),
                    );
                    
            if ($this->auth_model->update('users', $data, array('id' => $id)))
            {
                $this->response([
                    $this->config->item('rest_status_field_name') => 1,
                    $this->config->item('rest_message_field_name') => 'Successfully Edit Profile.'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    $this->config->item('rest_status_field_name') => 0,
                    $this->config->item('rest_message_field_name') => 'Invalid data, please try again.',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
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
 	
 	public function edit_profile_password_post()
    {
 	    $this->form_validation->set_rules('password', '', 'required', array('required' => '%s'));
 		if ($this->form_validation->run() == true) 
 		{
 		    $id = $this->input->post('id');
			$data = array(
        			'password' => md5($this->input->post('password'))
                );
 			
            if ($this->auth_model->update('users', $data, array('id' => $id))) 
            {
                $this->response([
                    $this->config->item('rest_status_field_name') => 1,
                    $this->config->item('rest_message_field_name') => 'Successfully Password Change.'
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                $this->response([
                    $this->config->item('rest_status_field_name') => 0,
                    $this->config->item('rest_message_field_name') => 'Invalid data, please try again.',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
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
 	
 	public function profile_post()
 	{
 	    $this->form_validation->set_rules('id', '', 'required', array('required' => '%s'));
 		if ($this->form_validation->run() == true) 
 		{
     	    $id = $this->input->post('id');
     	    
     	    $data = $this->general_model->getOne('users', array('id' => $id));
    	    
    	    if ($data) 
            {
                $this->response( array('Status' => '1', 'message' => 'Get successfully.', 'result' => $data) , REST_Controller::HTTP_OK);
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

    // public function social_login_post(){
    //     $this->form_validation->set_rules('type', '', 'required', array('required' => '%s'));
    //     $this->form_validation->set_rules('token', '', 'required', array('required' => '%s'));
    //     if ($this->form_validation->run() == true) {
    //         $email = $this->input->post('email');
    //         $name = $this->input->post('name');
    //         $token = $this->input->post('token');
    //         // If email empty create with token@domain.com
    //         if (empty($email)) {
    //             $email = $token.'@'.$_SERVER['HTTP_HOST'];
    //         }

    //         $data = array(
    //             'email' => $email,
    //             'name' => $name,
    //             'user_id' => $this->user_id,
    //             'type' => $this->input->post('type'),
    //             'token' => $token,
    //             'updated_on' => time(),
    //             'created_on' => time(),
    //         );

    //         if ($customer = $this->auth_model->social_login($data)) {
    //             $user = array(
    //                 'id' => $customer->id,
    //                 'user_id' => $customer->user_id,
    //                 'name' => $customer->name,
    //                 'email' => $customer->email,
    //                 'phone' => $customer->phone,
    //                 'type' => $customer->type
    //             );
    //             $this->response([
    //                 $this->config->item('rest_status_field_name') => 1,
    //                 $this->config->item('rest_message_field_name') => 'Successfully login.',
    //                 'result' => $user
    //             ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         }else{
    //             $this->response([
    //                 $this->config->item('rest_status_field_name') => 0,
    //                 $this->config->item('rest_message_field_name') => 'Something went wrong please try again',
    //             ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         }
    //     } else {
    //         $this->response([
    //             $this->config->item('rest_status_field_name') => 0,
    //             $this->config->item('rest_message_field_name') => 'Empty request parameter(s). [ ' . ltrim(str_replace("\n", '', validation_errors()), ' |') . ' ]',
    //         ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //     }
    // }

    // public function edit_profile_post(){
    //     $this->form_validation->set_rules('customer_id', '', 'required', array('required' => '%s'));
    //     $this->form_validation->set_rules('name', '', 'required', array('required' => '%s'));
    //     $this->form_validation->set_rules('phone', '', 'required', array('required' => '%s'));
    //     if ($this->form_validation->run() == true) {
    //         $customer_id = $this->input->post('customer_id');
    //         // Check customer is exist or not
    //         $is_exist = $this->general_model->getOne('customers', array('id' => $customer_id, 'user_id' => $this->user_id));
    //         if (empty($is_exist)) {
    //             $this->response([
    //                 $this->config->item('rest_status_field_name') => 0,
    //                 $this->config->item('rest_message_field_name') => 'Customer does not exist!',
    //             ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         }

    //         $data = array(
    //             'name' => $this->input->post('name'),
    //             'phone' => $this->input->post('phone')
    //         );

    //         if ($customer = $this->auth_model->update_profile($is_exist->id, $data)) {
    //             $this->response([
    //                 $this->config->item('rest_status_field_name') => 1,
    //                 $this->config->item('rest_message_field_name') => 'Profile successfully updated.',
    //                 'result' => $customer
    //             ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         } else {
    //             $this->response([
    //                 $this->config->item('rest_status_field_name') => 0,
    //                 $this->config->item('rest_message_field_name') => 'Something went wrong please try again',
    //             ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //         }
    //     }else{
    //         $this->response([
    //             $this->config->item('rest_status_field_name') => 0,
    //             $this->config->item('rest_message_field_name') => 'Empty request parameter(s). [ ' . ltrim(str_replace("\n", '', validation_errors()), ' |') . ' ]',
    //         ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    //     }
    // }

    public function change_password_post()
    {
        $this->form_validation->set_rules('customer_id', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('password', '', 'required', array('required' => '%s'));
        $this->form_validation->set_rules('new_password', '', 'required', array('required' => '%s'));
        if ($this->form_validation->run() == true) {
            $customer_id = $this->input->post('customer_id');
            $password = md5($this->input->post('password'));
            $is_exist = $this->general_model->getOne('customers', array('id' => $customer_id,'password' => $password));
            if (empty($is_exist)) {
                $this->response([
                    $this->config->item('rest_status_field_name') => 0,
                    $this->config->item('rest_message_field_name') => 'Old password does not match',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            $new['password'] = md5($this->input->post('new_password'));
            if ($this->general_model->update('customers', array('id' => $is_exist->id), $new)) {
                $this->response([
                    $this->config->item('rest_status_field_name') => 1,
                    $this->config->item('rest_message_field_name') => 'Password successfully changed.',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $this->response([
                    $this->config->item('rest_status_field_name') => 0,
                    $this->config->item('rest_message_field_name') => 'Something went wrong please try again',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        }else{
            $this->response([
                $this->config->item('rest_status_field_name') => 0,
                $this->config->item('rest_message_field_name') => 'Empty request parameter(s). [ ' . ltrim(str_replace("\n", '', validation_errors()), ' |') . ' ]',
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
    }

 	public function forgot_password_post()
    {
        $this->form_validation->set_rules('email', '', 'required', array('required' => '%s'));
        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            $customer = $this->auth_model->forgot_password($email, $this->user_id);
            if ($customer) {
                $this->data['forgotten'] = $customer->forgotten_code;
                $this->data['customers'] = $customer;
                $message = $this->load->view('auth/email/forgot_password.tpl.php', $this->data, true);
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->Host = 'ssl://smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $this->config->item('smtp_username');
                $mail->Password = $this->config->item('smtp_password');
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom($this->config->item('sender_email'), $this->config->item('site_title'));
                $mail->addAddress($customer->email);
                $mail->isHTML(true);
                $mail->Subject = 'Forgot Password';
                $mail->Body = $message;
                if ($mail->send()) {
                    $this->response([
                        $this->config->item('rest_status_field_name') => 1,
                        $this->config->item('rest_message_field_name') => 'Forgot password email sent, please check your email.',
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                } else {
                    $this->response([
                        $this->config->item('rest_status_field_name') => 0,
                        $this->config->item('rest_message_field_name') => 'Something went wrong while sending reset password link.',
                    ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                }
            } else {
                $this->response([
                    $this->config->item('rest_status_field_name') => 0,
                    $this->config->item('rest_message_field_name') => 'Account with email does not exist!',
                ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
        } else {
            $this->response([
                $this->config->item('rest_status_field_name') => 0,
                $this->config->item('rest_message_field_name') => 'Empty request parameter(s). [ ' . ltrim(str_replace("\n", '', validation_errors()), ' |') . ' ]',
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
    }
}
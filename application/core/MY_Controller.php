<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (empty($this->session->userdata('id'))) 
		{
			redirect('auth/login', 'refresh');
		}
		$this->user = $this->general_model->getOne('users', array('id' => $this->session->userdata('id')));
	}
}

class Public_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends Admin_Controller {
	public function __construct() {
		parent::__construct();
		$this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
	}

	public function index() {
		$this->data['title'] = 'Dashboard';
		$this->template->admin_render('admin/dashboard/index', $this->data);
	}

}

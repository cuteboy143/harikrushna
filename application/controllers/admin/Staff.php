<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Staff extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
	}

	public function index()
	{
		$this->data['title'] = 'Staff';
		$this->data['staff'] = $this->general_model->getAll('users', array('id !=' => 1));
		$this->template->admin_render('admin/staff/index', $this->data);
	}

	public function add_manager()
	{
		if ($_POST) 
		{
			$profile_image = "";
		    if (!empty($_FILES['profile_image']['name'])) {
				/* Conf Image */
				$file_name = 'profile_image_' . time() . rand(100, 999);
				$configImg['upload_path'] = './uploads/profile/';
				$configImg['file_name'] = $file_name;
				$configImg['allowed_types'] = 'png|jpg|jpeg|JPG|JPEG';
				$configImg['max_size'] = 2000;
				$configImg['max_width'] = 2000;
				$configImg['max_height'] = 2000;
				$configImg['file_ext_tolower'] = TRUE;
				$configImg['remove_spaces'] = TRUE;

				$this->load->library('upload', $configImg, 'profile_image');
				if ($this->profile_image->do_upload('profile_image')) {
					$uploadData = $this->profile_image->data();
					$profile_image = 'uploads/profile/' . $uploadData['file_name'];
				} else {
					$this->custom_errors['profile_image'] = $this->profile_image->display_errors('', '');
				}
			}

			$data = array(
				'name' => $this->input->post('name'),
				'slug' => url_title($this->input->post('name'), 'dash', true),
				'company_name' => 'Warburton',
				'profile_image' => $profile_image,
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'phone' => $this->input->post('phone'),
				'group_id' => "2",
				'is_active' => 1,
				'created_on' => date("Y-m-d H:i:s"),
			);
			if ($this->general_model->insert('users', $data)) {
				$this->session->set_flashdata('message', array('1', 'Manager successfully added.'));
				redirect('admin/staff', 'refresh');
			} else {
				$this->session->set_flashdata('message', array('0', 'Somting went to wrong.'));
				redirect('admin/staff', 'refresh');
			}
		}
		$this->data['title'] = 'Add Manager';
		$this->template->admin_render('admin/staff/add_manager', $this->data);
	}

	public function add_employee()
	{
		if ($_POST) 
		{
			$profile_image = "";
		    if (!empty($_FILES['profile_image']['name'])) {
				/* Conf Image */
				$file_name = 'profile_image_' . time() . rand(100, 999);
				$configImg['upload_path'] = './uploads/profile/';
				$configImg['file_name'] = $file_name;
				$configImg['allowed_types'] = 'png|jpg|jpeg|JPG|JPEG';
				$configImg['max_size'] = 2000;
				$configImg['max_width'] = 2000;
				$configImg['max_height'] = 2000;
				$configImg['file_ext_tolower'] = TRUE;
				$configImg['remove_spaces'] = TRUE;

				$this->load->library('upload', $configImg, 'profile_image');
				if ($this->profile_image->do_upload('profile_image')) {
					$uploadData = $this->profile_image->data();
					$profile_image = 'uploads/profile/' . $uploadData['file_name'];
				} else {
					$this->custom_errors['profile_image'] = $this->profile_image->display_errors('', '');
				}
			}

			$data = array(
				'name' => $this->input->post('name'),
				'slug' => url_title($this->input->post('name'), 'dash', true),
				'company_name' => 'Warburton',
				'profile_image' => $profile_image,
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'phone' => $this->input->post('phone'),
				'lattitude' => $this->input->post('lattitude'),
				'longitude' => $this->input->post('longitude'),
				'group_id' => "2",
				'is_active' => 1,
				'created_on' => date("Y-m-d H:i:s"),
			);
			if ($this->general_model->insert('users', $data)) {
				$this->session->set_flashdata('message', array('1', 'Employee successfully added.'));
				redirect('admin/staff', 'refresh');
			} else {
				$this->session->set_flashdata('message', array('0', 'Somting went to wrong.'));
				redirect('admin/staff', 'refresh');
			}
		}
		$this->data['title'] = 'Add Employee';
		$this->template->admin_render('admin/staff/add_employee', $this->data);
	}

	
	public function edit($id)
	{
		$question = $this->general_model->getOne('users', array('id' => $id));
		if ($_POST) {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'group_id' => $this->input->post('role'),
				
			);
			$this->general_model->update('users', array('id' => $id), $data);
			$this->session->set_flashdata('message', array('1', 'Staff successfully updated.'));
			redirect('admin/staff', 'refresh');
		}
		$this->data['title'] = 'Edit Staff';
		$this->data['staff'] = $question;
		$this->template->admin_render('admin/staff/edit', $this->data);
	}



	public function delete($id)
	{
		
		$question = $this->general_model->getOne('users', array('id' => $id));
		if ($question) {
			$delete = $this->general_model->delete('users', array('id' => $id));
			$this->session->set_flashdata('message', array('1', 'Staff successfully deleted.'));
		}
		redirect('admin/Staff', 'refresh');
	}
}

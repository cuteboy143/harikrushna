<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Katha_category extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
	}

	public function index()
	{
		$this->data['title'] = 'Katha category';
		$this->data['katha_category'] = $this->general_model->getAll('katha_category');
		$this->template->admin_render('admin/katha_category/index', $this->data);
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($_POST) 
		{
			if ($this->form_validation->run() == true) 
			{
				$data = array(
					'name' => $this->input->post('name'),
					'created_on' => date("Y-m-d H:i:s"),
				);

				if ($this->general_model->insert('katha_category', $data)) 
				{
					$this->session->set_flashdata('message', array('1', 'Entity successfully added.'));
					redirect('admin/katha_category', 'refresh');
				} 
				else 
				{
					$this->session->set_flashdata('message', array('0', 'Somting went to wrong.'));
					redirect('admin/katha_category', 'refresh');
				}
			}
		}
		$this->data['title'] = 'Add category';
		$this->template->admin_render('admin/katha_category/add', $this->data);
	}

	
	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'name', 'required');
		if ($_POST) 
		{
			if ($this->form_validation->run() == true) 
			{
				$data = array(
					'name' => $this->input->post('name'),
					'updated_on' => date("Y-m-d H:i:s"),
				);
				$this->general_model->update('katha_category', array('id' => $id), $data);
				$this->session->set_flashdata('message', array('1', 'Katha category successfully updated.'));
				redirect('admin/katha_category', 'refresh');
			}
		}
		$this->data['title'] = 'Edit category';
		$this->data['katha_category'] = $this->general_model->getOne('katha_category', array('id' => $id));
		$this->template->admin_render('admin/katha_category/edit', $this->data);
	}



	public function delete($id)
	{
		$question = $this->general_model->getOne('katha_category', array('id' => $id));
		if ($question) {
			$delete = $this->general_model->delete('katha_category', array('id' => $id));
			$this->session->set_flashdata('message', array('1', 'Katha category successfully deleted.'));
		}
		redirect('admin/katha_category', 'refresh');
	}
}

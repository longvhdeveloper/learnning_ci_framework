<?php
class Categories extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('menu');
        $this->load->model('Mcategories');
        $this->_data['categories'] = $this->Mcategories->listAll();

        $this->_data['content'] = 'categories/index_view';
        $this->_data['title'] = 'Admin area &raquo; Categories';
        $this->_data['message'] = $this->session->flashdata('flash_message');
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->load->model('Mcategories');
        $this->Mcategories->deleteCategory($id);

        $this->session->set_flashdata('flash_message', 'User has been deleted');
        redirect(base_url() . 'admin/categories/index');
    }

    public function add()
    {
        $name = $this->input->post('fname');
        $parent = $this->input->post('fparent');
        if ($name != '') {
            $data = array(
                'name' => $name,
                'parent' => $parent
            );

            $this->load->model('Mcategories');

            $this->Mcategories->insertCategory($data);
            echo 'Insert categories success';
        } else {
            echo 1;
        }
    }

    public function reload()
    {
        $this->load->model('Mcategories');
        $this->_data['categories'] = $this->Mcategories->listAll();

        $this->_data['content'] = 'admin/categories/reload_view';
        $this->load->view($this->_data['content'], $this->_data);
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        $this->load->helper('menu');
        $this->load->model('Mcategories');
        $this->_data['category'] = $this->Mcategories->getCategory($id);

         $this->_data['categories'] = $this->Mcategories->listAll();
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fname', 'Category name', 'required');

         if ($this->form_validation->run() == false) {
            $this->_data['content'] = 'categories/edit_view';
            $this->_data['title'] = 'Admin area &raquo; Categories / Edit';
            $this->load->view($this->_data['path'], $this->_data);
         } else {
            $category = array(
                'name' => $this->input->post('fname'),
                'parent' => $this->input->post('fparent')
            );
            $this->Mcategories->updateCategory($category, $id);
            $this->session->set_flashdata('flash_message', 'Edit category info sucess');
            redirect(base_url() . 'admin/categories/index');
         }
    }
}
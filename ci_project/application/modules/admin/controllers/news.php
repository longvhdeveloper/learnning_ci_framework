<?php
class News extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $user = $this->session->userdata('username');
        $_SESSION['KCFINDER']['disabled'] = false;
        $_SESSION['KCFINDER']['uploadURL'] = base_url() . 'uploads/' . $user;
    }

    public function index()
    {
        $this->load->model('Mnews');
        $config['base_url'] = base_url() . 'admin/news/index';
        $config['total_rows'] = $this->Mnews->countAll();
        $config['per_page'] = 3;
        $config['uri_segment'] = 4;
        $config['use_page_numbers'] = TRUE;

        $this->load->library('pagination', $config);
        $this->_data['page_link'] = $this->pagination->create_links();

        $start = (int) $this->uri->segment(4);
        $start = ($start == 0) ? $start : ($start - 1) * $config['per_page'];
        $this->_data['newss'] = $this->Mnews->getNews($config['per_page'], $start);
        $this->_data['content'] = 'news/index_view';
        $this->_data['title'] = 'Admin area &raquo; News';
        $this->_data['message'] = $this->session->flashdata('flash_message');
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function add()
    {
        $checkImage = true;
        $this->load->helper('menu');
        $this->load->model('Mcategories');
        $this->_data['categories'] = $this->Mcategories->listAll();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('ftitle', 'Title', 'required');
        $this->form_validation->set_rules('fauthor', 'Author', 'required');
        $this->form_validation->set_rules('finfo', 'Information', 'required');
        $this->form_validation->set_rules('fdetail', 'Detail', 'required');

        if ($this->form_validation->run()) {

            $news = array(
                'title' => $this->input->post('ftitle'),
                'author' => $this->input->post('fauthor'),
                'info' => $this->input->post('finfo'),
                'full' => $this->input->post('fdetail'),
                'cat_id' => $this->input->post('fcategory'),
                'u_id' => $this->session->userdata('id')
            );

            if ($_FILES['ffile']['name'] != '') {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '600';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('ffile')) {
                    $image = $this->upload->data();

                    $news['image'] = $image['file_name'];
                } else {
                    $this->_data['error'] = $this->upload->display_errors();
                    $news['image'] = '';
                    $checkImage = false;
                }
            } else {
                $news['image'] = '';
            }


            if ($checkImage) {
                $this->load->model('Mnews');
                $this->Mnews->addNews($news);
                $this->session->set_flashdata('flash_message', 'Add news sucess !');
                redirect(base_url(). 'admin/news');
            }
        }

        $this->_data['content'] = 'News/add_view';
        $this->_data['title'] = 'Admin area &raquo Add news';
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function delete()
    {
        $id = $this->uri->segment(4);
        $this->load->model('Mnews');
        $this->Mnews->deleteNews($id);

        $this->session->set_flashdata('flash_message', 'News has been deleted');
        redirect(base_url() . 'admin/news/index');
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        $this->load->model('Mnews');

        $checkImage = true;

        $this->_data['news'] = $this->Mnews->getNewsById($id);

        if ($this->input->post('fsubmit')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('ftitle', 'Title', 'required');
            $this->form_validation->set_rules('fauthor', 'Author', 'required');
            $this->form_validation->set_rules('finfo', 'Information', 'required');
            $this->form_validation->set_rules('fdetail', 'Detail', 'required');

            if ($this->form_validation->run()) {

                $news = array(
                    'title' => $this->input->post('ftitle'),
                    'author' => $this->input->post('fauthor'),
                    'info' => $this->input->post('finfo'),
                    'full' => $this->input->post('fdetail'),
                    'cat_id' => $this->input->post('fcategory')
                );

                if ($_FILES['ffile']['name'] != '') {
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '600';
                    $config['max_width']  = '1024';
                    $config['max_height']  = '768';

                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('ffile')) {
                        $image = $this->upload->data();

                        $news['image'] = $image['file_name'];
                    } else {
                        $this->_data['error'] = $this->upload->display_errors();
                        $news['image'] = $this->_data['news']['image'];
                        $checkImage = false;
                    }
                } else {
                    $news['image'] = $this->_data['news']['image'];
                }


                if ($checkImage) {
                    $this->Mnews->updateNews($news, $id);
                    $this->session->set_flashdata('flash_message', 'Edit news sucess !');
                    redirect(base_url(). 'admin/news');
                }
            }
        }

        $this->load->helper('menu');
        $this->load->model('Mcategories');
        $this->_data['categories'] = $this->Mcategories->listAll();
        $this->_data['content'] = 'News/edit_view';
        $this->_data['title'] = 'Admin area &raquo Edit news';
        $this->load->view($this->_data['path'], $this->_data);
    }
}
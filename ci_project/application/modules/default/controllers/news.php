<?php
class News extends MainController
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('seourl');
    }

    public function index()
    {
        $this->load->model('Mnews');
        $this->_data['newss'] = $this->Mnews->callNews();

        $this->_data['title'] = 'News page';
        $this->_data['content'] = 'news/index_view';
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function detail($id)
    {
        $this->load->model('Mnews');
        $this->_data['news'] = $this->Mnews->getNewsById($id);

        $this->_data['others'] = $this->Mnews->listOtherNews($this->_data['news']['id'], $this->_data['news']['cat_id']);

        $this->_data['title'] = $this->_data['news']['title'];
        $this->_data['content'] = 'news/detail_view';
        $this->load->view($this->_data['path'], $this->_data);
    }

    public function viewcate($id)
    {
        $this->load->model('Mnews');
        $this->_data['newss'] = $this->Mnews->getNewsByCateId($id);

        if ($this->_data['newss'] != false) {
            $this->_data['title'] = $this->_data['newss'][0]['name'];
        } else {
            $this->_data['title'] = 'News page';
        }
        $this->_data['content'] = 'news/viewcate_view';
        $this->load->view($this->_data['path'], $this->_data);
    }
}
<?php
class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->database();
        $query = $this->db->query('select * from user order by user_id asc');
        $data = $query->result_array();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $data = $query->row_array();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        echo $query->num_rows();
    }

    public function index2()
    {
        $this->load->database();
        $this->db->select('user_id, username, level');
        $this->db->order_by('user_id desc');
        $this->db->limit(2, 0);
        $this->db->where('level = ', '2');
        $query = $this->db->get('user');
        $data = $query->result_array();
    }

    public function index3()
    {
        $this->load->database();
        $data = array(
            'username' => 'tester',
            'password' => '123456',
            'level' => '1'
        );
        $this->db->insert('user', $data);
    }

    public function index4()
    {
        $this->load->database();
        $data = array(
            'username' => 'tester1',
            'password' => '123456',
            'level' => '1'
        );
        $this->db->where('user_id', '5');
        $this->db->update('user', $data);
    }

    public function index5()
    {
        $this->load->database();
        $this->db->where('user_id', '5');
        $this->db->delete('user');
    }

    public function index6()
    {
        $this->load->database();
        $this->db->select('user_id, username, password, lv_name');
        $this->db->join('level', 'level.lv_id=user.level');
        $query = $this->db->get('user');
        $data = $query->result_array();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function index7()
    {
        $this->load->model('Mdemo');
        $data = $this->Mdemo->listUser();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
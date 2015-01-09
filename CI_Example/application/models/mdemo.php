<?php
class Mdemo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listUser()
    {
        $this->db->select('user_id,username,level');
        $this->db->where('level', '2');
        $query = $this->db->get('user');
        return $query->result_array();
    }
}
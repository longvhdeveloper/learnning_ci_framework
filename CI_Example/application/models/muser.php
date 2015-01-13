<?php
class Muser extends CI_Model
{
    protected $table = 'user';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listUsers()
    {
        $this->db->select('user_id, username, level');
        $this->db->order_by('user_id desc');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function checkUsername($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($table);
        $result = $query->num_rows() > 0 ? false : true;

        return $result;
    }

    public function countAll()
    {
        return $this->db->count_all($this->table);
    }

    public function listUser2($record, $start)
    {
        $this->db->limit($record, $start);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function getUser($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->table);

        return $query->row_array();
    }
}

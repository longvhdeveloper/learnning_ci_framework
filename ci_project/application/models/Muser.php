<?php
class Muser extends CI_Model
{
    protected $_tableName = 'user';
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers($all, $start)
    {
        $this->db->limit($all, $start);
        return $this->db->get($this->_tableName)->result_array();
    }

    public function countAll()
    {
        return $this->db->count_all($this->_tableName);
    }

    public function checkUser($user, $id = 0)
    {
        if ($id > 0) {
            $this->db->where('id != ', $id);
        }
        $this->db->where('username', $user);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function checkEmail($email, $id = 0)
    {
        if ($id > 0) {
            $this->db->where('id != ', $id);
        }
        $this->db->where('email', $email);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function addUser($data)
    {
        $this->db->insert($this->_tableName, $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_tableName);
    }

    public function getUser($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_tableName)->row_array();
    }

    public function updateUser($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->_tableName, $data);
    }
}
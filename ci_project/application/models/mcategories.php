<?php
class Mcategories extends CI_Model
{
    protected $_tableName = 'cate_news';
    public function __construct()
    {
        parent::__construct();
    }

    public function listAll()
    {
        return $this->db->get($this->_tableName)->result_array();
    }

    public function deleteCategory($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_tableName);
    }

    public function insertCategory($data)
    {
        $this->db->insert($this->_tableName, $data);
    }
    
    public function getCategory($id)
    {
        $this->db->where('id', $id);
        
        return $this->db->get($this->_tableName)->row_array();
    }
    
    public function updateCategory($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->_tableName, $data);
    }
}
<?php
class Mbook extends CI_Model
{
    private $tableName = 'book';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function checkISBN($isbn)
    {
        $this->db->where('isbn', $isbn);
        $query = $this->db->get($this->tableName);
        $result = $query->num_rows() > 0 ? false : true;

        return $result;
    }
    
    public function listAll()
    {
        $query = $this->db->get($this->tableName);
        
        return $query->result_array();
    }
    
    public function getBookById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->tableName)->row_array();
    }
}
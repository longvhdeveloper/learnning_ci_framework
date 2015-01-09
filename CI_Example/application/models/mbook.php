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
}
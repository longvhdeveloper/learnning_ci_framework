<?php
class Mevent extends CI_Model
{
    private $tableName = 'event';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getEvents($year, $month)
    {
        $this->db->from($this->tableName);
        $this->db->like('date', "$year-$month");
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    
    public function getEvent($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tableName);
        
        return $query->row_array();
    }
    
    public function addEvent($data)
    {
        $this->db->insert($this->tableName, $data);
    }
    
    public function checkEvent($date)
    {
        $this->db->where('date', $date);
        $query = $this->db->get($this->tableName);
        
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
}
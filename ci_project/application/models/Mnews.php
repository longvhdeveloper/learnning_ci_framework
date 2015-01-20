<?php
class Mnews extends CI_Model
{
    protected $_tableName = 'news';
    public function __construct()
    {
        parent::__construct();
    }

    public function addNews($data)
    {
        $this->db->insert($this->_tableName, $data);
    }

    public function countAll()
    {
        return $this->db->count_all($this->_tableName);
    }

    public function getNews($record, $start)
    {
        $this->db->select('news.id, title, username, cate_news.name');
        $this->db->limit($record, $start);
        $this->db->join('user', 'user.id=news.u_id');
        $this->db->join('cate_news', 'news.cat_id=cate_news.id');
        $this->db->order_by('id', 'desc');

        return $this->db->get($this->_tableName)->result_array();
    }

    public function deleteNews($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->_tableName);
    }

    public function getNewsById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_tableName)->row_array();
    }

    public function updateNews($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($this->_tableName, $data);
    }

    public function callNews()
    {
        $this->db->select('id, title, info, image');
        $this->db->limit(7);
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->_tableName)->result_array();
    }

    public function listOtherNews($id, $cat_id)
    {
        $this->db->where('id != ', $id);
        $this->db->where('cat_id', $cat_id);
        $this->db->select('id, title');
        $query = $this->db->get($this->_tableName);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}
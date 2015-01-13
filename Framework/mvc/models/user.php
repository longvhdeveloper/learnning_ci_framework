<?php
class Model_User extends Model
{
    protected $_table = 'user';

    public function listAll()
    {
        $this->getData($this->_table);
        return $this->fetchAll();
    }

    public function deleteUser($id)
    {
        $this->where('user_id=' . $id);
        $this->delete($this->_table);
    }

    public function insertUser($data)
    {
        $this->insert($this->_table, $data);
    }

    public function checkUsername($username, $id = 0)
    {
        if ($id > 0) {
            $this->where('username="' . $username . '" and user_id != "' . $id . '"');
        } else {
            $this->where('username="' . $username . '"');
        }
        $this->getData($this->_table);
        if ($this->numRows() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $this->where('user_id="' . $id . '"');
        $this->getData($this->_table);
        return $this->fetch();
    }

    public function updateUser($data, $id)
    {
        $this->where('user_id="' . $id . '"');
        $this->update($this->_table, $data);
    }
}
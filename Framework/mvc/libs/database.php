<?php
class Database
{
    protected $hostName = 'localhost';
    protected $userHost = 'root';
    protected $passHost = 'root';
    protected $dbName = 'oop';
    protected $conn;
    protected $result;
    
    public function connect()
    {
        $this->conn = mysql_connect($this->hostName, $this->userHost, $this->passHost);
        mysql_select_db($this->dbName);
    }
    
    public function disconnect()
    {
        if ($this->conn) {
            mysql_close($this->conn);
        }
    }
    
    public function query($sql)
    {
        $this->result = mysql_query($sql);
    }
    
    public function numRows()
    {
        if ($this->result) {
            $row = mysql_num_rows($this->result);
        } else {
            $row = 0;
        }
        
        return $row;
    }
    
    public function fetch()
    {
        if ($this->result) {
            $row = mysql_fetch_assoc($this->result);
        } else {
            $row = 0;
        }
        
        return $row;
    }

    public function fetchAll()
    {
        if ($this->result) {
            while ($row = $this->fetch($this->result)) {
                $data[] = $row;
            }
        } else {
            $data = 0;
        }

        return $data;
    }
}

class Model extends Database
{
    protected $_where;
    protected $_select = '*';
    protected $_order = '';
    protected $_limit = '';

    public function __construct() 
    {
        $this->connect();
    }

    public function where($where)
    {
        if (is_array($where)) {
            foreach($where as $key => $value) {
                $arr[] = "$key '$value'";
            }

            $this->_where = ' where ' . implode(' and ' , $arr);
        } else {
            $this->_where = " where " . $where;
        }
    }

    public function select($col)
    {
        if ($col != '') {
            $this->_select = $col;
        }
    }

    public function order($col, $type='asc')
    {
        if ($col != '') {
            $this->_order = " order by $col $type";
        }
    }

    public function limit($start, $record) {
        $this->_limit = " limit $start, $record";
    }

    public function insert($table, $data)
    {
        $col = implode(',', array_keys($data));
        $newArr = array_values($data);
        foreach ($newArr as $value) {
            $arr[] = '"'.$value.'"';
        }

        $value = implode(',', $arr);

        $sql = 'insert into ' . $table . '('.$col.') values ('.$value.')';
        $this->query($sql);
    }

    public function update($table, $data)
    {
        foreach ($data as $key => $value) {
            $arr[] = $key . ' = "'.$value.'"';
        }
        $col = implode(',', $arr);
        if ($this->_where) {
            $where = $this->_where;
        } else {
            $where = '';
        }
        $sql = 'update ' . $table . ' set ' . $col . ' ' . $where;

        $this->query($sql);
    }

    public function delete($table)
    {
        if ($this->_where) {
            $where = $this->_where;
        } else {
            $where = '';
        }

        $sql = 'delete from ' . $table . ' ' . $where;

        $this->query($sql);
    }

    public function getData($table)
    {
        $sql = "select $this->_select from $table $this->_where $this->_order $this->_limit";

        $this->query($sql);
    }
}
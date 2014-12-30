<?php
class database
{
	private $hostname = "localhost";
	private $user = 'root';
	private $password = 'root';
	private $dbname = 'oop';
	private $db = null;
	private $result = null;

	public function connect()
	{
		$this->db = mysql_connect($this->hostname, $this->user, $this->password);
		mysql_select_db($this->dbname, $this->db);
	}

	public function disconect()
	{
		if ($this->db) {
			mysql_close($this->db);
		}
	}

	public function query($sql)
	{
		$this->result = mysql_query($sql);
	}

	public function num_rows()
	{
		$row = 0;
		if ($this->result) {
			$row = mysql_num_rows($this->result);
		}

		return $row;
	}

	public function fetch()
	{
		if ($this->result) {
			$data = mysql_fetch_assoc($this->result);
		} else {
			$data = 0;
		}

		return $data;
	}
}
/*
$db = new database();
$db->connect();
$sql = 'select * from user order by id desc';
$db->query($sql);
$row = $db->num_rows();
echo $row . '<br/>';
while($data = $db->fetch()){
	echo $data['username'] . '<br/>';
}
/*/

function __autoload($url)
{
    $url = strtolower($url);
    require "models/$url.php";
}
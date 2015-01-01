<?php
class User extends database
{
	protected $_username;
	protected $_password;
	protected $_level;
	
	public function __construct()
	{
		$this->connect();
	}
	
	public function setUsername($username)
	{
		$this->_username = $username;	
	}
	
	public function getUsername()
	{
		return $this->_username;
	}
	
	public function setPassword($password)
	{
		$this->_password = $password;
	}
	
	public function getPassword()
	{
		return $this->_password;
	}
	
	public function setLevel($level)
	{
		$this->_level = $level;
	}
	
	public function getLevel($level)
	{
		return $this->_level;
	}
	
	public function insertUser() 
	{
		$sql = "insert into user(username, password, level) values('" . $this->_username ."', '".$this->_password."', '".$this->_level."')";
		$this->query($sql);	
	}
}
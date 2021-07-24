<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
class DbConfig 
{	
	var $_host = 'localhost';
	var $_username = 'root';
	var $_password = '';
	var $_database = 'guestay';
	
	var $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if (!$this->connection) {
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->connection;
	}
}
?>

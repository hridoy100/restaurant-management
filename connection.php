<?php

require_once 'config.php';

Class DB_connection{
	private $connect;
	  function __construct() {
	    $this->connect=mysqli_connect(hostname, username, password,db_name) or die("DB connection Error");
	  
	  }
	  public function get_connection(){
	  
	  return $this->connect;
	  }
	
	
}






?>
<?php

class FileUp
	{


		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $dbname     = "heezdjks_ap";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    try {
			$this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);	
		    } catch (Exception $e) {
			echo $e->getMessage();
		    }
		}

		// Insert customer data into customer table
		public function insertData($uid, $esign, $date)
		{	
			$allow = array('jpg', 'jpeg', 'png');
		   	$exntension = explode('.', $esign['name']);
		   	$fileActExt = strtolower(end($exntension));
		   	$fileNew = $uid . "." . $fileActExt;  // rand function create the rand number 
		   	$filePath = 'esign/'.$fileNew; 
			
			if (in_array($fileActExt, $allow)) {
    		          if ($file['size'] > 0 && $file['error'] == 0) {
		            if (move_uploaded_file($file['tmp_name'], $filePath)) {
		   		$query = "INSERT INTO esign(uid, esign,date)
					VALUES('$uid','$fileNew','$date')";
				$sql = $this->con->query($query);
				if ($sql==true) {
				   return true;
				}else{
				  return false;
			    }   		    
		        }
		      }
		   }
		}

		// Fetch customer records for show listing

		public function displayData()
		{
		    $sql = "SELECT * FROM customers";
		    $query = $this->con->query($sql);
		    $data = array();
		    if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
			    $data[] = $row;
			}
			return $data;
		    }else{
			return false;
		    }
		}

	}
?>


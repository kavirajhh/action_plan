<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "heezdjks_ap";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
								}
								
	function getuserst($conn,$u_uid){

  							$sql="select * from user where u_id='".$u_uid."'";
							$rs=$conn->query($sql);
							if ($rs->num_rows > 0)
								{
									return true;
								}
							else{
									return false;
								}
  							}
  	function pwvalidity($conn,$u_uid,$pw){

  							$sql="select * from user where u_id='".$u_uid."' and u_pw ='".$pw."'";
							$rs=$conn->query($sql);
							if ($rs->num_rows > 0)
											{
									return true;
								}
							else{
									return false;
								}
  							}
  	function usercat($conn,$u_uid){
					
					$sql="select * from user where u_id='".$u_uid."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$u_cat=$row['u_cat']; 	}
							}
					else    { $u_cat=0;}

					return $u_cat;

					}
function user_name($conn,$u_id){
					
					$sql = "SELECT * FROM profile where u_nic='".$u_id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['u_name_ini']; 	}
							}
					else    { $id=0;}

					return $id;

					}
function user_des($conn,$u_id){
					
					$sql = "SELECT * FROM profile where u_nic='".$u_id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['u_dec']; 	}
							}
					else    { $id=0;}

					return $id;

					}
function user_remark($conn,$u_id){
					
					$sql = "SELECT * FROM profile where u_nic='".$u_id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['remark']; 	}
							}
					else    { $id='-';}

					return $id;

					}

function desname_id($conn,$id){
					
					$sql = "SELECT * FROM designation where dec_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['dec_name']; 	}
							}
					else    { $id=0;}

					return $id;

					}	
function ap_nic($conn,$id){
					
					$sql = "SELECT * FROM ap where ap_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['nic']; 	}
							}
					else    { $id=0;}

					return $id;

					}					

function ap_status($conn,$id){
					
					$sql = "SELECT * FROM ap where ap_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['status']; 	}
							}
					else    { $id=0;}

					return $id;

					}
function status($conn,$id){
					
					$sql = "SELECT * FROM status where st_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['status']; 	}
							}
					else    { $id='Not Available';}

					return $id;

					}	

function ap_year($conn,$id){
					
					$sql = "SELECT * FROM ap where ap_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['year']; 	}
							}
					else    { $id=0;}

					return $id;

					}
function ap_month($conn,$id){
					
					$sql = "SELECT * FROM ap where ap_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['month']; 	}
							}
					else    { $id=0;}

					return $id;

					}		

function app_by($conn,$id){
					
					$sql = "SELECT * FROM ap where ap_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['app_by']; 	}
							}
					else    { $id=0;}

					return $id;

					}	
function app_date($conn,$id){
					
					$sql = "SELECT * FROM ap where ap_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['app_date']; 	}
							}
					else    { $id=' ';}

					return $id;

					}
function isdnstart($conn,$u_uid,$year,$month){

  							$sql="select * from dn where nic='".$u_uid."' and year='".$year."' and month='".$month."'";
							$rs=$conn->query($sql);
							if ($rs->num_rows > 0)
								{
									return true;
								}
							else{
									return false;
								}
  							}
 function isapstart($conn,$u_uid,$year,$month){

  							$sql="select * from ap where nic='".$u_uid."' and year='".$year."' and month='".$month."'";
							$rs=$conn->query($sql);
							if ($rs->num_rows > 0)
								{
									return true;
								}
							else{
									return false;
								}
  							}

function dn_nic($conn,$id){
					
					$sql = "SELECT * FROM dn where dn_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['nic']; 	}
							}
					else    { $id=0;}

					return $id;

					}	
function dn_status($conn,$id){
					
					$sql = "SELECT * FROM dn where dn_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['status']; 	}
							}
					else    { $id=0;}

					return $id;

					}

function dn_app_by($conn,$id){
					
					$sql = "SELECT * FROM dn where dn_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['app_by']; 	}
							}
					else    { $id=0;}

					return $id;

					}	
function dn_app_date($conn,$id){
					
					$sql = "SELECT * FROM dn where dn_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['app_date']; 	}
							}
					else    { $id=' ';}

					return $id;

					}
function dn_year($conn,$id){
					
					$sql = "SELECT * FROM dn where dn_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['year']; 	}
							}
					else    { $id=0;}

					return $id;

					}
function dn_month($conn,$id){
					
					$sql = "SELECT * FROM dn where dn_id='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['month']; 	}
							}
					else    { $id=0;}

					return $id;

					}
function esign($conn,$id){
					
					$sql = "SELECT * FROM esign where uid='".$id."'";
					$rs=$conn->query($sql);
					if ($rs->num_rows > 0)
							{
								while ($row = $rs->fetch_assoc())
									{ 	$id=$row['esign']; 	}
							}
					else    { $id='Not Available';}

					return $id;

					}	
?>
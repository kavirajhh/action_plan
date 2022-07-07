<?php
include "hzdef_/defhome.php"; 

session_start();
$s_cOde=$_SESSION['s_cOde']; // for creater ID

$val=$_POST['val'];
$u_nic=strtoupper($s_cOde);
$dec=$_POST['designation'];
$u_name_ini=strtoupper($_POST['u_name_ini']);
$remark=$_POST['remark'];

if($val==0){
	$sql = "insert into profile";
	$sql.= "(u_nic,u_name_ini,u_dec,remark) values(";
	$sql.= "'".$u_nic."','".$u_name_ini."','".$dec."','".$remark."')";
}
else{
	$sql="update profile set u_name_ini='".$u_name_ini."',";
	
	$sql.="u_dec='".$dec."', remark='".$remark."'";
	$sql.=" where u_nic='".$u_nic."'";
	
	/*$sql.="u_name_ini='".$u_name_ini."','";
	$sql.="u_des='".$des."'";
	
	
	
	
	
	$sql.="where u_nic='".$u_nic."'";*/
	

	
}
$result = $conn->query($sql);
$conn->close();
header("Location: user_profile.php?msg=User $u_nic update successful"); 
?>

<?php
include "hzdef_/defhome.php"; 

session_start();
$s_cOde=$_SESSION['s_cOde']; // for creater ID
$val=0;
//$val=$_POST['val'];
//$u_nic=strtoupper($s_cOde);

$f_date=$_POST['f_date'];
$f_out=$_POST['f_out'];
$f_loc=$_POST['f_loc'];
$f_des=$_POST['f_des'];
$f_dis=$_POST['f_dis'];
$f_loc=$_POST['f_loc'];
$f_status=$_POST['f_status'];
if($val==0){
	$sql = "insert into move";
	$sql.= "(f_loc,f_des,f_dis,f_status,f_date,f_out,nic) values(";
	$sql.= "'".$f_loc."','".$f_des."','".$f_dis."','".$f_status."','".$f_date."','".$f_out."','".$s_cOde."')";
}
else{
	/*$sql="update profile set u_name_ini='".$u_name_ini."',";
	
	$sql.="u_dec='".$dec."', remark='".$remark."'";
	$sql.=" where u_nic='".$u_nic."'"; */
	
	
	
}
$result = $conn->query($sql);
$conn->close();
header("Location: move.php?msg=Field visit update successful"); 
?>

  <?php 

  if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: logoff.php");
        exit();
      }
 // access control 
  	include "hzdef_/defhome.php";  
		$u_id=$_POST['u_id'];
		$u_pw=md5($_POST['u_pw']);
		$c_pw=md5($_POST['c_pw']);
		$des=$_POST['designation'];
		$date=date("yy/m/d");
				
	
			if (empty($u_id)) {

				header("Location: user.php?msg=Invalied user ID");
				}
			else if ($u_pw!=$c_pw){
				header("Location: user.php?msg=Password Confirmation Fail");
			}
			else if(getuserst($conn,$u_id)){
				header("Location: user.php?msg=User ID already in database");
			}
			else{
			
			
									$sql = "insert into user  values(";
									$sql.="'".$u_id."',";
									$sql.="'".$u_pw."',";
									
									$sql.="'".$des."'";
									$sql.=")";
																		
									$result = $conn->query($sql);

$sql2 = "INSERT INTO `profile` (`u_nic`) VALUES ('".$u_id."')";
									/*$sql2.= "u_nic,u_dec";  
									$sql2.= "values('".$u_id."',";
									$sql2.= "'".$des."'";
									$sql2.=")";*/
									$result = $conn->query($sql2);

									$conn->close();
									header("Location: user.php?msg=User Account $u_id Created");
									
							
		
		
				}
		
	?>
		
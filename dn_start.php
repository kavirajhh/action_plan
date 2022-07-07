  <?php 
  date_default_timezone_set("Asia/Colombo");	
  if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: logoff.php");
        exit();
      }
 // access control 
  	include "hzdef_/defhome.php"; 
		$u_id=$_SESSION['s_cOde'];
		$year=$_POST['year'];
		$month=$_POST['month'];
		$date=date("Y/m/d");
		//$no_days=cal_days_in_month(CAL_GREGORIAN,10,2005);

		if(!isdnstart($conn,$u_id,$year,$month)){	
									$sql2 = "INSERT INTO `dn` (`nic`,`year`,`month`,`date`,`status`) VALUES ('".$u_id."','".$year."','".$month."','".$date."','0')";
									
									$result = $conn->query($sql2);

									$conn->close();
									header("Location: my_dn.php?msg=completed program  $year/$month is started");
									
		}
		else{
				$conn->close();
				header("Location: my_dn.php?msg=$year/$month completed program already started");

		}					
		
		
			
		
	?>
		
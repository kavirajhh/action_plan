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
  	$ap_by=$_SESSION['s_cOde'];
		$dn_id=$_REQUEST['dn_id'];
		$date=date("Y/m/d");
		
		
		
				
		$sql = "update dn set status=2,app_date='".$date."',app_by='".$ap_by."' where dn_id='".$dn_id."'";
		
											
		$result = $conn->query($sql);

		$conn->close();
		header("Location: dn_not_approve.php");
		
	?>
		
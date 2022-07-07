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
		$ap_id=$_REQUEST['ap_id'];
		$date=date("Y/m/d");
		
		
		
				
		$sql = "update ap set status=2,app_date='".$date."',app_by='".$ap_by."' where ap_id='".$ap_id."'";
		
											
		$result = $conn->query($sql);

		$conn->close();
		header("Location: ap_not_approve.php");
		 
	?>
		
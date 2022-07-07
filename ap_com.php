
  <?php // data came from assign_user.php and assign.php

  		include "hzdef_/defhome.php"; 
  		session_start();
		if((!isset($_SESSION['s_cOde'])))
      	{
        header("Location: index.php");
        exit();
      	}

		$ap_id=$_REQUEST['ap_id'];
				
		$sql = "update ap set status='1' where ap_id='".$ap_id."'";
		$result = $conn->query($sql);
		$conn->close();
		

		header("Location:my_ap.php");
		//}
		
		
		?>
	

   

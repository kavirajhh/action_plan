
  <?php // data came from assign_user.php and assign.php

  		include "hzdef_/defhome.php"; 
  		session_start();
		if((!isset($_SESSION['s_cOde'])))
      	{
        header("Location: index.php");
        exit();
      	}

		$dn_id=$_REQUEST['dn_id'];
				
		$sql = "update dn set status='1' where dn_id='".$dn_id."'";
		$result = $conn->query($sql);
		$conn->close();
		

		header("Location:my_dn.php");
		//}
		
		
		?>
	

   

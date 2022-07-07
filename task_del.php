
  <?php // data came from assign_user.php and assign.php

  		include "hzdef_/defhome.php"; 
  		session_start();
		if((!isset($_SESSION['s_cOde'])))
      	{
        header("Location: index.html");
        exit();
      	}

		$id=$_REQUEST['id'];
		$ap_id=$_SESSION['ap_id'];
				
		$sql = "delete from ap_task where tid='".$id."'";
		$result = $conn->query($sql);

		/*$sql2 = "delete from user where u_id='".$u_id."'";
		$result2 = $conn->query($sql2);*/
		$conn->close();
		header("Location:ap_view.php?ap_id=".$ap_id);
		//}
		
		
		?>
	

   

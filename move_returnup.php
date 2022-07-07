  <?php 

  if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: logoff.php");
        exit();
      }
 // access control 
    
  	include "hzdef_/defhome.php"; 
  	$f_id=$_POST['f_id'];
		$f_out=$_POST['f_out'];
		
		
		
				
		$sql = "update move  set f_back='".$f_out."' where f_id='".$f_id."'";
						
		$result = $conn->query($sql);

		$conn->close();
		header("Location: move_view.php?f_id=$f_id");
		
	?>
		
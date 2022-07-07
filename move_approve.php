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
  	$u_cat=usercat($conn,$ap_by);
  	if($u_cat!=1){
            header("Location: menu.php");
            exit();
        }

        
		$f_id=$_REQUEST['f_id'];
		$date=date("Y/m/d H:i");
		
			
				
		$sql = "update move set f_status=2,app_date='".$date."',app_by='".$ap_by."' where f_id='".$f_id."'";
		
											
		$result = $conn->query($sql);

		$conn->close();
	header("Location: move_not_approve.php");
		
	?>
		
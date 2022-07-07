<?php 

    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.html");
        exit();
      }

  // data pass from change_unpw.php
    
  
    include "hzdef_/defhome.php"; 
    $s_cOde=$_SESSION['s_cOde'];
    
    $sentpw = $_POST['pw'];
    $newpw = $_POST['newpw'];
    $conpw = $_POST['conpw'];


   

    $uql_selects="SELECT * FROM user WHERE u_id='$s_cOde'  LIMIT 1";
    $run_u = mysqli_query($conn,$uql_selects);
      
    while($row_u=mysqli_fetch_array($run_u))
        {
            $uid = $row_u['u_id'];
            $pw = $row_u['u_pw'];

        } 


        
        if(md5($sentpw)!=$pw)
        {   
             $conn->close();
             header("Location:change_unpw.php?msg=Old password is incorrect");
             exit();
        }
        else if($newpw==$conpw)
        {
            $sql = "UPDATE user SET u_pw=md5('$newpw') WHERE u_id='$s_cOde' LIMIT 1";
            $run_update=mysqli_query($conn,$sql);
            $conn->close();
            header("Location:change_unpw.php?msg=Password changed successfully");
            exit();
        }
        else{
            header("Location:change_unpw.php?msg=Password confirmation error");
            $conn->close();
            exit();

        }
?>

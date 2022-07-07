<?php

if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.html");
        exit();
      }
else{

include "hzdef_/defhome.php"; 
$s_cOde=$_SESSION['s_cOde'];
// Insert Record in customer table


    $uid = $s_cOde;
    $esign = $_FILES["esign"];
    $date=date("Y-m-d h:i:sa");

            $allow = array('jpg', 'jpeg', 'png');
            $exntension = explode('.', $esign['name']);
            $fileActExt = strtolower(end($exntension));
            $fileNew = $uid . "." . $fileActExt;  // rand function create the rand number 
            $filePath = 'esign/'.$fileNew; 


            if (in_array($fileActExt, $allow)) {
                      if ($esign['size'] > 0 && $esign['error'] == 0) {
                        if (move_uploaded_file($esign['tmp_name'], $filePath)) {
                            $query = "INSERT INTO esign(uid, esign,date)
                                VALUES('$uid','$fileNew','$date')";
                            $sql = $conn->query($query);
                            
                }
              }
           }


   
$conn->close();
header("Location: esign.php?msg=e-signature updated ");
}


?>
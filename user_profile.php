<?php
    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.php");
        exit();
      }
else{

        include "hzdef_/defhome.php"; 

        
       
        include_once('header.php'); 

        if(!isset($_REQUEST['u_nic']))
            { $s_cOde=$_SESSION['s_cOde']; }
            else { 
                $s_cOde=$_REQUEST['u_nic']; 
                $_SESSION['u_nic']=$s_cOde;
                 }
}
        ?>

<?php
    
    $uql_selects="SELECT * FROM profile WHERE u_nic='$s_cOde'  LIMIT 1";
    $run_u = mysqli_query($conn,$uql_selects);
    if ($run_u->num_rows > 0) {  
        while($row_u=mysqli_fetch_array($run_u)){
          $name_ini = $row_u['u_name_ini'];
          $remark = $row_u['remark'];
          $dec = $row_u['u_dec'];
          
          $val=1;

        }
    }// end  if ($run_u->num_rows > 0)
    else{
          $name_ini = '';
          
          $dec ='';
          $remark = '';
          $val=0;

    }
    
?>

           

<div class="testbox">


      <form action="user_up.php" method="post">
        

        <fieldset>

            <div class="input-group input-group-icon">
            <a  href='change_unpw.php' style="background-color: #8dc6ff;width: 100%;box-shadow: 2px 2px 2px gray;"><center>Change password</center></a>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                      <h4 class="pageheader-title"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i> Update Profile</h4>
                    </div>
                </div>
            </div>

            


            <div class="item">
            <?php  
            if(isset($_REQUEST['msg'] ) ) 
            {
            echo "<input style=border-color:tomato;background-color:#cdff60 type=Text    value='".$_REQUEST['msg']."' disabled >";
             } 

            ?>
            </div>
            
            <input type="hidden" name=val value='<?php echo $val;   ?>'>
           

       

           <div class="item">
             <p>Nic <span class="required">*</span></p>
            <input id="fname" type="Text" name="u_nic" maxlength="12"  required value='<?php echo $s_cOde; ?>' disabled >
            </div>
        
            

            <div class="item">
            <label for="fname">Name with initials <span>*</span></label>
            <input id="fname" type="Text" name="u_name_ini" value='<?php echo $name_ini; ?>'>
            </div> 
          
           

            <div class="item">
            <label for="fname"> Designation<span>*</span></label>
            <select  name="designation" id="fname"   required>
            <option value="" >Select Designation</option>
                            <?php 
                                $sql = mysqli_query($conn, "SELECT * FROM designation where dec_id>0  order by dec_id");
                                while ($row = $sql->fetch_assoc()){
                                $id=$row['dec_id'];
                                $name=$row['dec_name'];
                                ($dec==$id? $txt='selected':$txt='');
                                echo "<option $txt value=".$id.">".$name."</option>";
                                }
                            ?>
            </select>
            </div>

            <div class="item">
            <label for="fname">Remark <span></span></label>
            <input id="fname" type="Text" name="remark" value='<?php echo $remark; ?>'>
            </div> 
            <br>
            <div class="input-group input-group-icon">
            <input type="submit" value="Update" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>

            </fieldset>
      </form>
   </div>
  
  </body>
</html>
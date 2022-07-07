<?php
    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: logoff.php");
        exit();
      }
else{

        include "hzdef_/defhome.php"; 
        $s_cOde=$_SESSION['s_cOde'];
        include_once('header.php'); 
}
        ?>



<div class="testbox">
     
        <form  method="POST" action="chnge_pw.php" >
        
              <fieldset>
              <legend>Change password</legend>
              <p>&nbsp;</p>

              <div class="item">
              <?php 
              // update message 
              if(isset($_REQUEST['msg'] ) ) 
              {
              echo "<input style=border-color:tomato;background-color:#cdff60 type=Text    value='".$_REQUEST['msg']."' disabled >";
               } 

              ?>
              </div>


              <div class="item">
            	<label for="inputEmail4">User name</label>
							<input type="text" class="form-control" name="uname" value="<?php echo $s_cOde; ?> " disabled>
							</div>

							<div class="item">
							<label for="inputPassword4">Old Password</label>
							<input type="password" class="form-control" name="pw" placeholder="For security reasons we will not show your password">
							</div>
              
              <div class="item">
              <label for="inputPassword4">New Password</label>
              <input type="password" class="form-control" name="newpw">
              </div>

              <div class="item">
              <label for="inputPassword4">Confirm Password</label>
              <input type="password" class="form-control" name="conpw">
              </div>

              <div class="input-group input-group-icon">
            <input type="submit" value="Change" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>

					    </fieldset>
      </form>
   </div>
  
  </body>
</html>

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
        
}
?>

<?php include_once('header.php'); ?>
    
  

 
       <form action="user_new_up.php" method="post" enctype="multipart/form-data">
     
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
          <h2 class="pageheader-title"><i class="fa fa-user" aria-hidden="true"></i> Create new user</h2>
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
  
      <div class="item">
      <p>User NIC <span class="required">*</span></p>
      <input type="text" name="u_id" maxlength="12" required/>
      </div>
      
      <div class="item">
      <p>Password </p>
      <input type="password" name="u_pw" maxlength="12" required />
      </div>
    
      <div class="item">
      <p>Confirm Password </p>
      <input type="password" name="c_pw" maxlength="12" required />
      </div>
     
      <div class="input-group">
            <p> User Category</p>
            <select  name="designation" id="des"   required >
            <option value="" >Select User Category</option>
                            <?php 
                                $sql = mysqli_query($conn, "SELECT * FROM category");
                                while ($row = $sql->fetch_assoc()){
                                $id=$row['cat_id'];
                                $name=$row['cat'];
                                
                                echo "<option value=".$id.">".$name."</option>";
                                }
                            ?>
            </select>
        </div>

        <div class="input-group input-group-icon">
        <input type="submit" value="Create" style="background-color: #f0a500;"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
    </form>
</div>
</div>
</body>
</html>
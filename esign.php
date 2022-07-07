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
    


    <form action="esign_up.php" method="post" enctype="multipart/form-data">
     
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
          <h2 class="pageheader-title"><i class="fa fa-user" aria-hidden="true"></i> Add e-signature</h2>
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
      <p>e-signature  <span class="required">*</span></p>
      <input type="file" name="esign" required/>
      </div>
      
      

          <div class="input-group input-group-icon">
            <input type="submit" value="Update" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
    </form>
    </div>


</body>

</html>
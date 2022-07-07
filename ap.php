 <?php
    if(!isset($_SESSION)){session_start();}
    
    if((!isset($_SESSION['s_cOde'])))
      {
        header("Location: index.php");
        exit();
      }
else{

        include "hzdef_/defhome.php"; 
        $s_cOde=$_SESSION['s_cOde'];
        
}
?>

 <?php include_once('header.php'); ?>
    
    <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <br><p class="pageheader-title"> Start New Advance program</p>
        </div>
    </div>
</div>
 
 <form action="ap_start.php" method="post">

      <div class="item">
            <?php  
            if(isset($_REQUEST['msg'] ) ) 
            {
            echo "<input style=border-color:tomato;background-color:#cdff60 type=Text    value='".$_REQUEST['msg']."' disabled >";
             } 

            ?>
      </div>


      <div class="input-group">
            <p>Year </p>
            <select name="year" required>
                <option value=''>Select a year</option>
                <option value='2022'>2022</option>
                <option value='2023'>2023</option>
                <option value='2024'>2024</option>
                <option value='2025'>2025</option>
             </select>
      <!-- <p>Year <span class="required">*</span></p>
      <input type="text" name="year"  required/> -->


      </div>


      <div class="input-group">
            <p> Month</p>
            <select name="month" required>
            <option value=''>Select a month</option>
            <option value='January'>January</option>
            <option value='February'>February</option>
            <option value='March'>March</option>
            <option value='April'>April</option>
            <option value='May'>May</option>
            <option value='June'>June</option>
            <option value='July'>July</option>
            <option value='August'>August</option>
            <option value='September'>September</option>
            <option value='October'>October</option>
            <option value='November'>November</option>
            <option value='December'>December</option>
            </select>
      </div>
      
      <div class="input-group input-group-icon">
            <input type="submit" value="Create" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>

  </form>


</body>
          
</html>
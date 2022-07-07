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
        $id=$_REQUEST['id'];
       
       
       
}
?>


<link rel="stylesheet" type="text/css" href="style/myst.css">


<style type="text/css">
  table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
  
  </style>

</head>
<?php include_once('header.php'); ?>
    
<style> 
.container {
  max-width: 70em;
  padding: 1em 3em 2em 3em;
  margin: 0em auto;
  background-color: #fff;
  border-radius: 4.2px;
  box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
  position: relative;
}

 </style>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <br><p class="pageheader-title"> Edit Task</p>
        </div>
    </div>
</div>

 <form action="ap_task_editup.php" method="post" enctype="multipart/form-data" style="width: 100%">
     
       <?php
        $sql="SELECT * FROM ap_task where tid='".$id."'";
        $run_ins = mysqli_query($conn, $sql);
        
        while ($row_ins=mysqli_fetch_array($run_ins)) 
        {   $id=$row_ins['tid'];
            $date = $row_ins['date'];
            $loc= $row_ins['loc'];
            
            $des= $row_ins['des'];
            $distance= $row_ins['distance'];
            }
      ?>

      
      <input type="hidden" name="tid" value="<?php echo $id; ?>" />

      <div class="item">
      <p>Date <span class="required">*</span></p>
      <input type="date" name="sdate" value=<?php echo $date;  ?> disabled>
      </div>

      <div class="item">
      <p>Location <span class="required">*</span></p>
      <input type="loc" name="loc" value="<?php echo $loc;  ?>">
      </div>
      
      <div class="item">
      <p>Description</p>
      <input type="text" name="des"  value="<?php echo $des;  ?>">
      </div>

      <div class="item">
      <p>Distance<span class="required" ></span></p>
      <input type="number" name="distance" value=<?php echo $distance;  ?>   >
      </div>

     
    
      <div class="input-group input-group-icon">
            <input type="submit" value="Add" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
    </form>

</div>



    </div>

<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData2').DataTable();

            });
</script>


</body></HTML>
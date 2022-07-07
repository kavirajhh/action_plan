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
        $ap_id=$_REQUEST['ap_id'];
        $_SESSION['ap_id']=$ap_id;
       
       
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
          <br><p class="pageheader-title"> Add Task</p>
        </div>
    </div>
</div>

 <form action="ap_add_up.php" method="post" enctype="multipart/form-data" style="width: 100%">
     
      

      <div class="item">
            <?php  
            if(isset($_REQUEST['msg'] ) ) 
            {
            echo "<input style=border-color:tomato;background-color:#cdff60 type=Text    value='".$_REQUEST['msg']."' disabled >";
             } 

            ?>
      </div>
      <input type="hidden" name="ap_id" value="<?php echo $ap_id; ?>" />

      <div class="item">
      <p>Date <span class="required">*</span></p>
      <input type="date" name="sdate"/>
      </div>

      <div class="item">
      <p>Location <span class="required">*</span></p>
      <input type="loc" name="loc"/>
      </div>
      
      <div class="item">
      <p>Description</p>
      <input type="text" name="des"  />
      </div>

      <div class="item">
      <p>Distance<span class="required">*</span></p>
      <input type="number" name="distance"   />
      </div>

     
    
      <div class="input-group input-group-icon">
            <input type="submit" value="Add" style="background-color: #f0a500;"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
    </form>

</div>


<div class="tile mb-6" >
<div class="row">
    <div class="col-lg-12" >
        <div class="panel panel-default">
              <div class="panel-body"><div>


    <div class="table-responsive" >
    <table id="loadData2" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
    <thead>
        <tr>
                              
            <th>Date</th>
            <th>Location</th>
            <th>Description</th>
            <th>Distance</th>
            <th class="datatable-nosort">Action</th>
        </tr>
    </thead>               
    <tbody>
                            
      <?php
        $sql="SELECT * FROM ap_task where ap_id='".$ap_id."' order by date";
        $run_ins = mysqli_query($conn, $sql);
        
        while ($row_ins=mysqli_fetch_array($run_ins)) 
        {   $id=$row_ins['tid'];
            $date = $row_ins['date'];
            $loc= $row_ins['loc'];
            
            $des= $row_ins['des'];
            $distance= $row_ins['distance'];
            
      ?>
                            
      <tr>
          
          <td><?php echo  $date; ?> </td>
          <td> <?php echo  $loc; ?> </td>
          <td> <?php echo  $des; ?> </td>
          <td> <?php echo  $distance; ?> </td>
          
          <td>
          <div class="dropdown">
          <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
          <i class="fa fa-ellipsis-h"></i></a>
          <div class="dropdown-menu dropdown-menu-right">
                
          <a class="dropdown-item" href="spent_del.php?id=<?php echo $id  ?>" onclick="return confirm('Delete Task?')"><i class="fa fa-del"></i> Delete</a>
          <a class="dropdown-item" href="ap_task_edit.php?id=<?php echo $id  ?>"><i class="fa fa-del"></i> Edit</a>
          </div>
          </div>


          </td>                               
          </tr>
         <?php  } ?>
                            
    </tbody>
    </table>
    </div>

    </div>            
    </div>
    </div>
    </div>
    </div>

<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData2').DataTable();

            });
</script>


</body></HTML>
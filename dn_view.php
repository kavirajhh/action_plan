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
        $dn_id=$_REQUEST['dn_id'];
        $_SESSION['dn_id']=$dn_id;
        $nic=dn_nic($conn,$dn_id);
        $status=dn_status($conn,$dn_id);
        $st_name=status($conn,$status);
        $uname=user_name($conn,$nic);
        $des_id=user_des($conn,$nic);
        $remark=(user_remark($conn,$nic)==''?'':'/'.user_remark($conn,$nic));
        $des=desname_id($conn,$des_id);

// Data capture to approved AP
        if($status==2){

            $sql="SELECT * FROM dn where dn_id='".$dn_id."'";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)) {
                    $app_by=$row["app_by"];
                    $app_date=$row["app_date"];
                    $app_name=user_name($conn,$app_by);
                    $app_des_id=user_des($conn,$app_by);
                    $app_des=desname_id($conn,$app_des_id);
                    $st_name=$st_name.' By '.$app_name.'('.$app_des.')  On '.$app_date;

                } // end of if 
            }// end of while

       // $inst_id=user_inst($conn,$s_cOde);
       // $inst_name=instname_id($conn,$inst_id);
        //$des=$_SESSION['des'];
        include_once('header.php'); 

       // header('Test', 'test2', 'test3') ;
}
?>

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

     <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>


<div style="padding-bottom: 12px;"></div>
<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
          <p class="pageheader-title"> <?php echo "Name : $uname <BR>Designation : $des $remark<br>Status : $st_name" ?></p>
          </div>
        </div>
      </div>

<div class="column1" >
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
        $sql="SELECT * FROM dn_task where dn_id='".$dn_id."' order by date";
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
               <?php 
                if($status<2){ echo "<a class=dropdown-item href=dn_task_del.php?id=$id  onclick=return confirm('Delete Task?')><i class=fa fa-del></i> Delete</a>";
                    echo "<a class=dropdown-item href=dn_task_edit.php?id=$id><i class=fa fa-del></i> Edit</a>";
                }
                
            ?>
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
</div>
</div>

 


<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData2').DataTable();

            });

             $('#loadData2').dataTable( {"pageLength": 50
                                    } );
</script>

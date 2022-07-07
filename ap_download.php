<title><center>Advance Program </center></title>
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
        $ap_id=$_REQUEST['ap_id'];
        $_SESSION['ap_id']=$ap_id;
        $nic=ap_nic($conn,$ap_id);
        $status=ap_status($conn,$ap_id);
        $st_name=status($conn,$status);
        $app_by=app_by($conn,$ap_id);
        $app_date=app_date($conn,$ap_id);
        $year=ap_year($conn,$ap_id);
        $month=ap_month($conn,$ap_id);
        $uname=user_name($conn,$nic);
        $remark=(user_remark($conn,$nic)==''?'':'/'.user_remark($conn,$nic));
        $des_id=user_des($conn,$nic);
        $des=desname_id($conn,$des_id);
       
        if($status==2){
                    $app_name=user_name($conn,$app_by);
                    $app_des_id=user_des($conn,$app_by);
                    $app_des=desname_id($conn,$app_des_id);
                    $app=$st_name.' By '.$app_name.'('.$app_des.') <br> On '.$app_date;
                    $app_esign=esign($conn,$app_by);
                   $app_sign=$st_name.' By '.$app_name.'('.$app_des.') <br> On '.$app_date.'<br><img src=esign/'.$app_esign.' width=100 height=100 >';
                    }// end of if($status==2)
        else{
            $app='Not Approved';
        }
include_once('header_print.php'); 
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
          <p class="pageheader-title"> </p>
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
                
                    <table id="loadData1" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                            <tr>
                            	
                                <th><?php echo "AP Month <br> $year/$month" ?></th>
                                <th><?php echo "AP status <br> $app" ?></th>
                                <th><?php echo "Officer <br> $uname <br>$des $remark" ?></th>
                                <th><?php echo "AP No <br> $ap_id" ?></th>
                                
                                
                            </tr>
                        </thead>
                            <thead>
                            <tr><td>Date</td><td>Location</td> <td>Description</td> <td>Distance</td> </tr>   
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
</script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>    
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData1').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['print'],
                                
                    aaSorting: [[1,'asc']],
                    pageLength: 50
                    });
                





            });

              $('#loadData1').append('<caption style="caption-side: bottom"><?php echo $app_sign; ?>.</caption>');
             

           
</script>
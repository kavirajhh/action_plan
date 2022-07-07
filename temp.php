<?php
    // Date Format: Y/m/d
    $paymentDate = '2021/06/05';;
    echo $month = date('F', strtotime($paymentDate));
    // echo $month = date('M', strtotime($paymentDate));  // Output: Jun
    die();

?>
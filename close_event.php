<?php  
    session_start();
    require 'dbconfi/confi.php';

?>

<?php
    if (isset($_POST['close_event'])){
        $current_date=date("Y-m-d");
        $status="closed";
        $query="UPDATE disaster_events SET status='$status',end_date='$current_date' where event_id=3";
        $query_run= mysqli_query($con,$query);
        if($query_run){
            header('location:event.php');
        }

    }
?>
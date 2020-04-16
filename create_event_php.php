<?php  
    session_start();
    require 'dbconfi/confi.php';
?>

<?php
    if (isset($_POST['submit_button'])){
        $name=$_POST['name'];
        $type = $_POST['type'];
        $affected_districts="not_selected";
        if( ! empty( $_POST['district'] )){
            $values = $_POST['district'];
            $affected_districts = implode(",", $values);
        }
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $status = $_POST['status'];
        $detail = $_POST['detail'];

        if(!empty($_POST['end_date'])){
            $query="INSERT INTO disaster_events(name, type, affected_districts, start_date,end_date, status, detail) VALUES ('$name','$type','$affected_districts','$start_date','$end_date','$status','$detail')";     
        }else{
            $query="INSERT INTO disaster_events(name, type, affected_districts, start_date, status, detail) VALUES ('$name','$type','$affected_districts','$start_date','$status','$detail')";     

        }
        $query_run= mysqli_query($con,$query);
        if($query_run ){
            echo '<script type="text/javascript"> alert ("Data Uploaded") </script>';
            header('location:event.php');
        }else{
            echo '<script type="text/javascript"> alert ("Data not Uploaded") </script>';

        }
    }
?>
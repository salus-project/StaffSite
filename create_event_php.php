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

        
        
        $query="INSERT INTO disaster_events(name, type, affected_districts, start_date, status, detail) VALUES ('$name','$type','$affected_districts','$start_date','$status','$detail')";     

        
        $query_run= mysqli_query($con,$query);
        $id = mysqli_insert_id($con);

        if($query_run ){

            $query1 = "CREATE TABLE `event_".$id."_volunteers`(NIC_num varchar(12),now varchar(5) NOT NULL DEFAULT 'yes',service_district varchar(100),type varchar(20),money_or_goods varchar(20),amount int(10),things varchar(100),PRIMARY KEY (NIC_num))"; 
            $query1_run= mysqli_query($con,$query1);

            $query2 = "CREATE TABLE `event_".$id."_help_requested`(NIC_num varchar(12),now varchar(5) NOT NULL DEFAULT 'yes',district varchar(20),village varchar(100),street varchar(100),help_type varchar(20),money_discription text,good_discription text,PRIMARY KEY (NIC_num))"; 
            $query2_run= mysqli_query($con,$query2);


            echo '<script type="text/javascript"> alert ("Data Uploaded") </script>';
            header('location:event.php');
        }else{
            echo '<script type="text/javascript"> alert ("Data not Uploaded") </script>';

        }
    }
?>
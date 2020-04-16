<?php  
    session_start();
    require 'dbconfi/confi.php';
?>

<?php require "header.php" ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Create new event</title>
        <link rel="stylesheet" href="css_codes/style.css">
    </head>

    <body style="background-color: #dedede">
    
        <center>
            <h1> CREATE NEW EVENT </h1>

            <div class="div1">
            <form  class="form_box" action="create_event.php" method="POST">

                <label class="label" style="font-weight:bolder;">Name </label><br>
                <input name = "name" type="text" class="input_box" placeholder="Enter event name"/><br>

                <label class="label" style="font-weight:bolder;">Type </label><br>
                <input name = "type" type="text" class="input_box" placeholder="Enter event type"/><br>
                

                <label class="label"  style="font-weight:bolder;">Affected District/Districts </label><br>
                    Allisland  <input type="checkbox" name="district[]" value='AllDistricts'>
                    Ampara  <input type="checkbox" name="district[]" value='Ampara'>
                    Anurashapura  <input type="checkbox" name="district[]" value='Anurashapura'><br/>
                    Badulla   <input type="checkbox" name="district[]" value='Badulla'>
                    Batticaloa  <input type="checkbox" name="district[]" value='Batticaloa'>
                    Colombo <input type="checkbox" name="district[]" value='Colombo'><br/>
                    Galle  <input type="checkbox" name="district[]" value='Galle'>
                    Gampha <input type="checkbox" name="district[]" value='Gampha'>
                    Hambantota  <input type="checkbox" name="district[]" value='Hambatota'><br/>
                    Jaffna   <input type="checkbox" name="district[]" value='Jaffna'>
                    Kaltura  <input type="checkbox" name="district[]" value='Kaltura'>
                    Kandy  <input type="checkbox" name="district[]" value='Kandy'><br/>
                    Kegalle <input type="checkbox" name="district[]" value='Kegalle'>
                    Kilinochchi  <input type="checkbox" name="district[]" value='Kilinochchi'>
                    Kurunegala <input type="checkbox" name="district[]"  value='Kurunegala'><br/>
                    Mannar  <input type="checkbox" name="district[]"  value='Mannar'>
                    Matale <input type="checkbox" name="district[]"  value='Matale'>
                    Mathara  <input type="checkbox" name="district[]"  value='Mathara'><br/>
                    Moneragala <input type="checkbox" name="district[]"  value='Moneragala'>
                    Mullaitivu  <input type="checkbox" name="district[]"  value='Mullaitivu'>
                    Nuwara-Eliya <input type="checkbox" name="district[]"  value='Nuwara-Eliya'><br/>
                    Polonnaruwa    <input type="checkbox" name="district[]"  value='Polonnaruwa'>
                    Puttalam  <input type="checkbox" name="district[]"  value='Puttalam'>
                    Ratnapura   <input type="checkbox" name="district[]"  value='Ratnapura'><br/>
                    Tricomalee  <input type="checkbox" name="district[]"  value='Tricomalee'>
                    Vavuniya   <input type="checkbox" name="district[]"  value='Vavuniya'><br/><br/>

                <label class="label" style="font-weight:bolder;">Start date </label><br>
                <input name = "start_date" type="date" class="input_box" /><br>
                
                <label class="label" style="font-weight:bolder;">End date </label><br>
                <input name = "end_date" type="date" class="input_box" /><br>
                
                <label class="label"  style="font-weight:bolder;">Status </label><br>
                <select id="status" name="status" class="input_box">
                    <option value="active">active</option>
                    <option value="closed">closed</option>
                </select>
                <br/>
                <label class="label" style="font-weight:bolder;">Details about event</label><br>
                <textarea cols="30" rows="4"  class="input_box" name="detail" id="detail"></textarea><br>
                
                <input name="submit_button" type="submit"  value="Submit"  class="submit_button"><br>   

            </form>


            </div>
        <center>
    </body>
</html>

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

        if(!isset($_POST['end_date'])){
            $query="INSERT INTO disaster_events(name, type, affected_districts, start_date,end_date, status, detail) VALUES ('$name','$type','$affected_districts','$start_date','$end_date','$status','$detail')";     
        }else{
            $query="INSERT INTO disaster_events(name, type, affected_districts, start_date, status, detail) VALUES ('$name','$type','$affected_districts','$start_date','$status','$detail')";     

        }
        $query_run= mysqli_query($con,$query);
        if($query_run){
            header('location:event.php');
            echo '<script type="text/javascript"> alert ("Data Uploaded") </script>';    
        }
        else{
            echo '<script type="text/javascript"> alert ("Data not Uploaded") </script>';
        }

    }
?>
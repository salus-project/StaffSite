<?php
    require "header.php";
    $servername = "remotemysql.com";
    $username = "kfm2yvoF5R";
    $password = "4vkzHfeBh6";
    $dbname = "kfm2yvoF5R";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        echo("Connection failed ");
    }
    if(!mysqli_select_db($conn,$dbname)){
        echo "Database not selected";
    }
    $password = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $nic = $_POST["nic"];
    $address = $_POST["address"]; 
    $district = $_POST["district"];
    $village = $_POST["village"]; 
    $street = $_POST["street"]; 
    $occupation = $_POST["occupation"];
    $phone_number = $_POST["phone_number"];
    $email_address = $_POST["email_address"];

    $sql = "INSERT INTO civilian_detail (password, first_name, last_name, gender, NIC_num, address, district,village,street, Occupation, phone_num, email)
    VALUES ('$password', '$first_name', '$last_name', '$gender', '$nic', '$address', '$district', '$village','$street','$occupation', '$phone_number', '$email_address')";
    $query_run= mysqli_query($conn,$sql);

    if($query_run ){
        echo '<script type="text/javascript"> alert ("Data Uploaded") </script>';
         header('location:member.php');
    }else{
        echo '<script type="text/javascript"> alert ("Data not Uploaded") </script>';

    }
?>
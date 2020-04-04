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
    $occupation = $_POST["occupation"];
    $phone_number = $_POST["phone_number"];
    $email_address = $_POST["email_address"];

    $sql = "INSERT INTO civilian_detail (password, first_name, last_name, gender, NIC_num, address, district, Occupation, phone_num, email)
    VALUES ('$password', '$first_name', '$last_name', '$gender', '$nic', '$address', '$district', '$occupation', '$phone_number', '$email_address')";

    if (!mysqli_query($conn,$sql)) {
        echo "New record is not inserted";
    } else {
        echo "<h2>submited</h2>";
    }
    header("refresh:2; url=member.php");
    
?>
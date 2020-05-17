<?php
session_start();
require "header.php";
require 'dbconfi/confi.php';
?>

<html>
<head>
    <title>Application form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_codes/form.css">
</head>
<body>

    <?php
        $first_name = $last_name = $gender = $nic = $password = $address = $district=$village=$street = $occupation = $phone_number = $email_address = "";
        $first_name_err = $last_name_err = $gender_err = $nic_err = $password_err = $address_err = $district_err = $village_err =$street_err= $occupation_err = $phone_number_err = $email_address_err = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $is_ok =true;
            if (empty($_POST["nic"])){
                $nic_err = "NIC is required";
                $is_ok =  false;
            } else {
                $nic = test_input($_POST["nic"]);
            }


            if (empty($_POST["password"])){
                $password_err = "Password is required";
                $is_ok =  false;
            } else {
                $password = test_input($_POST["password"]);
            }

            
            if (empty($_POST["first_name"])){
                $first_name_err = "First name is required";
                $is_ok =  false;
            } else {
                $first_name = test_input($_POST["first_name"]);
            }

            if (empty($_POST["last_name"])){
                $last_name_err = "last name is required";
                $is_ok =  false;
            } else {
                $last_name = test_input($_POST["last_name"]);
            }

            if (empty($_POST["gender"])){
                $gender_err = "gender is required";
                $is_ok =  false;
            } else {
                $gender = test_input($_POST["gender"]);
            }

            if (empty($_POST["address"])){
                $address_err = "Address is required";
                $is_ok =  false;
            } else {
                $address = test_input($_POST["address"]);
            }

            if (empty($_POST["district"])){
                $district="";
            } else {
                $district = test_input($_POST["district"]);
            }

            if (empty($_POST["village"])){
                $village="";
            } else {
                $village = test_input($_POST["village"]);
            }

            if (empty($_POST["street"])){
                $street="";
            } else {
                $street = test_input($_POST["street"]);
            }

            if (empty($_POST["occupation"])){
                $occupation = "";
            } else {
                $occupation = test_input($_POST["occupation"]);
            }

            if (empty($_POST["phone_number"])){
                $phone_number= "";
            } else {
                $phone_number = test_input($_POST["phone_number"]);
                if(!preg_match("/^[0-9]*$/",$phone_number)){
                    $phone_number_err='Only numbers allowed';
                    $isOk=false;
                }
            }

            if (empty($_POST["email_address"])){
                $email_address = "";
            } else {
                $email_address= test_input($_POST["email_address"]);
                if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
                    $email_address_err = "Invalid email format";
                    $is_ok =  false;
                }
            }

            if($is_ok){
                $sql = "INSERT INTO civilian_detail (password, first_name, last_name, gender, NIC_num, address, district,village,street, Occupation, phone_num, email)
                VALUES ('$password', '$first_name', '$last_name', '$gender', '$nic', '$address', '$district', '$village','$street','$occupation', '$phone_number', '$email_address')";
                $query_run= $con->query($sql);
                
                $query1="ALTER TABLE disaster_events ADD COLUMN `user_".$nic."` varchar(50) NOT NULL DEFAULT 'not_set not_requested not_applied'";
                $query1_run= mysqli_query($con,$query1);
    
                $query2 = "CREATE TABLE `user_notif_ic_".$nic."` (Notification_id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,Date date, Time time,Content text)"; 
                $query2_run= mysqli_query($notification_DB,$query2);
    
                if($query_run && $query_run && $query2_run){
                    header('location:member.php');
                    
                }else{
                    echo '<script type="text/javascript"> alert ("Data is not submited") </script>';
                }
            }
        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        
    ?>
    <h1 class="head1">Application form</h1><br>
    <h3 class="head3">Please fill this form to create a new account</h3>
    <h4 class="head4">* Required</h4>
    <div class="div1">
        <form method="post" action="form.php">
            <label for="nic">NIC number</label>
            <input type="text" id="nic" name="nic" placeholder="Enter NIC number" value="<?php echo $nic;?>" required>
            <span class="error">* <?php echo $nic_err; ?></span><br><br>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter password" value="<?php echo $password;?>" required>
            <span class="error">* <?php echo $password_err; ?></span><br><br>

            <label for="first_name">First name</label>
            <input type="text" id="first_name" name="first_name" placeholder="Enter first name" value="<?php echo $first_name;?>" required>
            <span class="error">* <?php echo $first_name_err; ?></span><br><br>
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Enter last name" value="<?php echo $last_name;?>" required>
            <span class="error">*<?php echo $last_name_err; ?></span><br><br>
            <label for="gender">Gender</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <span class="error">*<?php echo $gender_err; ?></span><br><br>
            
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter address" value="<?php echo $address;?>" required>
            <span class="error">*<?php echo $address_err; ?></span><br><br>
            <label for="district">District</label>
            <select id="district" name="district" >
                <option value='Ampara'>Ampara</option>
                <option value='Anurashapura'>Anurashapura</option>
                <option value='Badulla'>Badulla</option>
                <option value='Batticaloa'>Batticaloa</option>
                <option value='Colombo'>Colombo</option>
                <option value='Galle'>Galle</option>
                <option value='Gampha'>Gampha</option>
                <option value='Hambatota'>Hambantota</option>
                <option value='Jaffna'>Jaffna</option>
                <option value='Kaltura'>Kaltura</option>
                <option value='Kandy'>Kandy</option>
                <option value='Kegalle'>Kegalle</option>
                <option value='Kilinochchi'>Kilinochchi</option>
                <option value='Kurunegala'>Kurunegala</option>
                <option value='Mannar'>Mannar</option>
                <option value='Matale'>Matale</option>
                <option value='Mathara'>Mathara</option>
                <option value='Moneragala'>Moneragala</option>
                <option value='Mullaitivu'></option>
                <option value='Nuwara-Eliya'>Nuwara-Eliya</option>
                <option value='Polonnaruwa'>Polonnaruwa</option>
                <option value='Puttalam'>Puttalam</option>
                <option value='Ratnapura'>Ratnapura</option>
                <option value='Tricomalee'>Tricomalee</option>
                <option value='Vavuniya'>Vavuniya</option>
            </select>
            <span class="error"><?php echo $district_err; ?></span><br><br>
            
            
            <label for="village">Village</label>
            <input type="text" id="village" name="village" placeholder="Enter village" value="<?php echo $village;?>">
            <span class="error"><?php echo $village_err; ?></span><br><br>

            <label for="street">Street</label>
            <input type="text" id="street" name="street" placeholder="Enter street" value="<?php echo $street;?>">
            <span class="error"><?php echo $street_err; ?></span><br><br>
  
            <label for="occupation">Occupation</label>
            <input type="text" id="occupation" name="occupation" placeholder="occupation" value="<?php echo $occupation;?>"><br><br>

            <label id="phone_number">Phone number</label>
            <input type="text" id="phone_number" name="phone_number" placeholder="Enter phone number" value="<?php echo $phone_number;?>">
            <span class="error"><?php echo $phone_number_err ?></span><br><br>

            <label id="Email">Email address</label>
            <input type="text" id="Email" name="email_address" placeholder="Email address" value="<?php echo $email_address;?>">
            <span class="error"><?php echo $email_address_err ?></span><br><br>

            <input type="submit" id="submit" name="submit">
        </form>
    </div>
   
</body>
</html>
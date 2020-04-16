
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
            if (empty($_POST["nic"])){
                $nic_err = "NIC is required";
            } else {
                $nic = test_input($_POST["nic"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["password"])){
                $password_err = "Password is required";
            } else {
                $nic = test_input($_POST["password"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["first_name"])){
                $first_name_err = "First name is required";
            } else {
                $first_name = test_input($_POST["first_name"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["last_name"])){
                $last_name_err = "last name is required";
            } else {
                $last_name = test_input($_POST["last_name"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["gender"])){
                $gender_err = "gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }
        }
      
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["address"])){
                $address_err = "Address is required";
            } else {
                $address = test_input($_POST["address"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["district"])){
                $district_err = "District is required";
            } else {
                $district = test_input($_POST["district"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["village"])){
                $village_err = "Village is required";
            } else {
                $village = test_input($_POST["village"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["street"])){
                $street_err = "Street is required";
            } else {
                $street = test_input($_POST["street"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["occupation"])){
                $occupation = "";
            } else {
                $occupation = test_input($_POST["occupation"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["phone_number"])){
                $phone_number= "";
            } else {
                $phone_number = test_input($_POST["phone_number"]);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["email_address"])){
                $email_address = "";
            } else {
                $email_address= test_input($_POST["email_address"]);
                if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
                    $email_address_err = "Invalid email format";
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
        <form method="post" action="insert.php">
            <label for="nic">NIC number</label>
            <input type="text" id="nic" name="nic" placeholder="Enter NIC number" value="<?php echo $nic;?>" required>
            <span class="error">*<?php echo $nic_err; ?></span><br><br>
            <label for="password">Password</label>
            <input type="text" id="" name="password" placeholder="Enter password" value="<?php echo $password;?>" required>
            <span class="error">* <?php echo $password_err; ?></span><br><br>
            <label for="last_name">Last name</label>
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
            <span class="error">*<?php echo $district_err; ?></span><br><br>
            
            
            <label for="village">Village</label>
            <input type="text" id="village" name="village" placeholder="Enter village" value="<?php echo $village;?>" required>
            <span class="error">*<?php echo $village_err; ?></span><br><br>
            <label for="street">Street</label>
            <input type="text" id="street" name="street" placeholder="Enter street" value="<?php echo $street;?>" required>
            <span class="error">*<?php echo $street_err; ?></span><br><br>
  
            <label for="occupation">Occupation</label>
            <input type="text" id="occupation" name="occupation" placeholder="occupation" value="<?php echo $occupation;?>"><br><br>
            <label id="phone_number">Phone number</label>
            <input type="text" id="phone_number" name="phone_number" placeholder="Enter phone number" value="<?php echo $phone_number;?>"><br><br>
            <label id="Email">Email address</label>
            <input type="text" id="Email" name="email_address" placeholder="Email address" value="<?php echo $email_address;?>"><br><br>
            <input type="submit" id="submit" name="submit">
        </form>
    </div>
   
</body>
</html>
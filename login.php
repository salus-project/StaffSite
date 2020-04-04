<?php
    session_start();
    require 'dbconfi/confi.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
        <link rel="stylesheet" href="css_codes/login.css">
    </head>
    <body style="background-color:lightgray">
        <div style="height:100px">
        </div>
        <div class="div1">
            <center>
            <h2  style="color: blueviolet">Login Here</h2>

            </center>

            <form class="form_box" action="login.php" method="post">
                <center>
                <label class="label">USERNAME </label><br>
                <input name = "username" type="text" class="input_box" placeholder="USER NAME" required/><br>
                <label class="label">PASSWORD </label><br>
                <input name="password" type="password" class="input_box" placeholder="PASSWORD" required/><br>
                <input name="login" type="submit" class="login_button" value="LOGIN"/><br>
                </center>
            </form>
            <?php
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                    
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $query="select * from officer_detail where user_name='$username' AND password='$password'";
                
                    $result=$con->query($query);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            //$_SESSION['']=$row[''];
                            $_SESSION['username'] = $row["user_name"];
                            $_SESSION['user_nic'] = $row["NIC_num"];
                            $_SESSION['first_name']=$row["first_name"];
                            $_SESSION['last_name']=$row['last_name'];
                            $_SESSION['gender']=$row['gender'];
                            $_SESSION['district']=$row['district'];
                            $_SESSION['address']=$row['address'];
                        }
                    
                            header('location:homepage.php');
                        
                    }else{
                        echo '<script type="text/javascript">';
                        echo 'alert("Invalid Username or password")';
                        echo '</script>';
                    }
                }

            ?>
            
        </div>

    </body>


</html>
<?php
session_start();
require "header.php" 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Member</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
        <style>
            ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 60px;
            } 

            li a {
            display: block;
            background-color: #dddddd;
            }
            .new_member{
                width: 200px;
                border: none;
                padding: 20px;
            }
            .tag{
           
                font-size: 20px;
            }
        </style>
    </head>
<body>

<ul>
  <li><button class="new_member"><a class="tag" href="form.php">Add new civilian</a></button></li>
 
</ul>

</body>
</html>

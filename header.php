<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css_codes/header.css">

    </head>

    <body>
        
        <div class="titlebar">
            <div class="coverphoto">
                <img src="Profiles/199872641943.jpg" alt=<?php echo "Your profile picture";?> class="profile_pic">
            </div>
            <div class person_name>
                <h1><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?> </h1>
            </div>

            <div class="logout">
                 <button><a href="login.php">Log out</a></button>
            </div>
            
        </div>
        <div class="topnav">
            <a href="homepage.php">HOME</a>
            <a href="member.php">MEMBER</a>
            <a href="post.php">POST</a>
            <a href="event.php">EVENT</a>
            <a href="about.php">ABOUT</a>
            </div>
        <div>

    </body>

</html>
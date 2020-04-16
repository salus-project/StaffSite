<?php  
    session_start();
    require 'dbconfi/confi.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Events</title>
        <link rel="stylesheet" href="css_codes/events.css">

    </head>

    <body>
        
        <?php require "header.php" ?>
        <?php
            $query="select event_id,name,status from disaster_events";
            $result=$con->query($query);
        ?>

        <div id=body>
            <div>
                <a href="create_event.php"><button>Create new event</button></a>
            </div>
            <div>
                <form action='view_event.php' method='get'>
                    <table id=event_table>
                        <?php
                            while($row=$result->fetch_assoc()){
                                echo "<tr><td class=name><button type=submit id=event_name name=event_id value=" . $row['event_id'] . ">" . $row['name'] . "</button></td><td>" . $row['status'] . "</td></tr>";
                            }
                        ?>
                    </table>
                </form>
            </div>
        </div>

    </body>
</html>
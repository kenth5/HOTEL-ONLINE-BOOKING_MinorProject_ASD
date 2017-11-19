<!DOCTYPE>
<?php
    require_once("dbconnection.php");
    require_once("sqlfunctions.php");
?>

<html>
    <head>
        <title>My Reservation</title>
        <link rel="stylesheet" type="text/css" href="userReservationStyle.css"/>
        <link rel="shortcut icon" type="image/png" href="images/kerker.png">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    </head>
    
    <body>
        <div id="topNav">
            <ul id="links">
                <li><a href="contactUs.php">CONTACT US</a></li> 
            </ul>
        </div>
        
        <div id="lowerNav">
            <li id="AMBIENCE"><a href="user.php">GO BACK</a></li>
        </div>
        
        <div id="divLogin">
            <p id="intro">Here, you will find your reservations, the date you checked in and out.<br>You can't view your reservation here unless it is approved by the administration</p>
            
            <table>
                <tr>
                    <thead>
                    <th>ROOM TYPE</th>
                    <th>CHECK-IN DATE</th>
                    <th>CHECK-OUT DATE</th>
                    <th>NO OF GUEST</th>
                    <th>NO OF ROOM</th>
                    <th>TOTAL PRICE</th>
                    </thead>
                </tr>
                <?php
                    displayMyReservation();
                ?>
            </table>
        </div>
        
        
        <div id="forLogo">
            <img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/>
            <h2 id="myAccount">my reservation</h2>
            
            
            
        </div>
        
        <div id="forFooter">
            <p id="Copyright">Copyright 2017 &copy;Kerokero Hotel. All Rights Reserved.</p> 
        </div>
        
        
    </body>
</html>
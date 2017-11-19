<?php
    session_start();
    require_once("dbconnection.php");
    $_SESSION["aa"]=" ";

    function redirect(){
        header("Location: user.php");
    }
?>

<!DOCTYPE>
<html>
    <head>
        <title>Rooms</title>
        <link rel="stylesheet" type="text/css" href="roomsStyle.css"/>
        <link rel="shortcut icon" type="image/png" href="images/kerker.png">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">

    </head>
    
    <body>
        <div id="topNav">
            <ul id="links">
                <li id="loginNav"><a href="loginPage.php">LOGIN</a></li>
                <li><a href="contactUs.php">CONTACT US</a></li>
            </ul>
        </div>
        
        <div id="lowerNav">
            <li id="AMBIENCE"><a href="index.php">GO BACK</a></li>
        </div>
        
        <div id="divLogin">
            <form action="#" method="post">
                <div id="room1">
                <img id="hot1" src="images/deluxeRoom.png" width="300" height="164" alt="room"/>
                <h4>DELUXE ROOM</h4>
                <h4>PHP 7500/NIGHT</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=1;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>"
                    ?>
                <input id="button" type="submit" name="reserve1" value="RESERVE"/>
                <?php
                    if(isset($_POST["reserve1"])){
                        if($_SESSION["login"]==true)
                        {
                            
                            header('Location: myReservation.php');
                        }
                        else if($_SESSION["login"]==false){
                            echo '<script>alert("You have not logged in first. Try logging in to reserve.")</script>';
                        }
                    }
                ?>
                </div>
            
                
            <div id="room2">
                <img id="hot2" src="images/superiorRoom.png" width="300" height="164" alt="room"/>
                <h4>SUPERIOR ROOM</h4>
                <h4>PHP 7200/NIGHT</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=2;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>"
                    ?>
                <a href="myReservation.php"><input id="button" type="submit" name="reserve2" value="RESERVE"/></a>
                <?php
                    if(isset($_POST["reserve2"])){
                        if($_SESSION["login"]==true)
                        {
                            header('Location: myReservation.php');
                        }
                        else if($_SESSION["login"]==false){
                            echo '<script>alert("You have not logged in first. Try logging in to reserve.")</script>';
                        }
                    }
                ?>
            </div>
            
            <div id="room3">
                <img id="hot3" src="images/executiveRoom.png" width="300" height="164" alt="room"/>
                <h4>EXECUTIVE ROOM</h4>
                <h4>PHP 7800/NIGHT</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=3;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>"
                    ?>
                <a href="myReservation.php"><input id="button" type="submit" name="reserve3" value="RESERVE"/></a>
                <?php
                    if(isset($_POST["reserve3"])){
                        if($_SESSION["login"]==true)
                        {
                            header('Location: myReservation.php');
                        }
                        else if($_SESSION["login"]==false){
                            echo '<script>alert("You have not logged in first. Try logging in to reserve.")</script>';
                        }
                    }
                ?>
            </div>
            
            <div id="room4">
                <img id="hot4" src="images/pacificRoom.png" width="300" height="164" alt="room"/>
                <h4>PACIFIC ROOM</h4>
                <h4>PHP 8800</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=4;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>"
                    ?>
                <a href="myReservation.php"><input id="button" type="submit" name="reserve4" value="RESERVE"/></a>
                <?php
                    if(isset($_POST["reserve4"])){
                        if($_SESSION["login"]==true)
                        {
                            header('Location: myReservation.php');
                        }
                        else if($_SESSION["login"]==false){
                            echo '<script>alert("You have not logged in first. Try logging in to reserve.")</script>';
                        }
                    }
                ?>
            </div>
            
            <div id="room5">
                <img id="hot5" src="images/pacificSuite.png" width="300" height="164" alt="room"/>
                <h4>PACIFIC SUITE</h4>
                <h4>PHP 10700</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=5;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>"
                    ?>
                <a href="myReservation.php"><input id="button" type="submit" name="reserve5" value="RESERVE"/></a>
                <?php
                    if(isset($_POST["reserve5"])){
                        if($_SESSION["login"]==true)
                        {
                            header('Location: myReservation.php');
                        }
                        else if($_SESSION["login"]==false){
                            echo '<script>alert("You have not logged in first. Try logging in to reserve.")</script>';
                        }
                    }
                ?>
            </div>
            
            <div id="room6">
                <img id="hot6" src="images/deluxeSuite.png" width="300" height="164" alt="room"/>
                <h4>DELUXE SUITE</h4>
                <h4>PHP 13600</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=6;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>"
                    ?>
                <a href="myReservation.php"><input id="button" type="submit" name="reserve6" value="RESERVE"/></a>
                <?php
                    if(isset($_POST["reserve6"])){
                        if($_SESSION["login"]==true)
                        {
                            header('Location: myReservation.php');
                        }
                        else if($_SESSION["login"]==false){
                            echo '<script>alert("You have not logged in first. Try logging in to reserve.")</script>';
                        }
                    }
                ?>
            </div>
            
            <div id="room7">
                <img id="hot7" src="images/executiveSuite.png" width="300" height="164" alt="room"/>
                <h4>EXECUTIVE SUITE</h4>
                <h4>PHP 23100</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=7;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>"
                    ?>
                <a href="myReservation.php"><input id="button" type="submit" name="reserve7" value="RESERVE"/></a>
                <?php
                    if(isset($_POST["reserve7"])){
                        if($_SESSION["login"]==true)
                        {
                            header('Location: myReservation.php');
                        }
                        else if($_SESSION["login"]==false){
                            echo '<script>alert("You have not logged in first. Try logging in to reserve.")</script>';
                        }
                    }
                ?>
            </div>
            
            <div id="room8">
                <img id="hot8" src="images/presidentialSuite.png" width="300" height="164" alt="room"/>
                <h4>PRESIDENTIAL SUITE</h4>
                <h4>PHP 60100</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=8;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>"
                    ?>
                <a href="myReservation.php"><input id="button" type="submit" name="reserve8" value="RESERVE"/></a>
                <?php
                    if(isset($_POST["reserve8"])){
                        if($_SESSION["login"]==true)
                        {
                            header('Location: myReservation.php');
                        }
                        else if($_SESSION["login"]==false){
                            echo '<script>alert("You have not logged in first. Try logging in to reserve.")</script>';
                        }
                    }
                ?>
            </div>
            </form>
        </div>
        
        
        <div id="forLogo">
            <img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/>
            <h2 id="myAccount">ROOMS</h2>
        </div>
        
        <div id="forFooter">
            <p id="Copyright">Copyright 2017 &copy; Kerokero Hotels. All Rights Reserved.</p> 
        </div>
        
        
    </body>
</html>
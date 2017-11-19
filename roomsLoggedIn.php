<?php
    session_start();
    $_SESSION['roomType']="a";
    function redirect(){
        header("Location: user.php");
    }
?>

<?php
    require_once("dbconnection.php");
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
                <li id="loginNav"><select id="dropdown" onchange = "la(this.value)">
                    <option><?php
                        echo $_SESSION["name"];
                    ?>
                    </option>
                    <option value="userReservation.php">my reservations</option>
                    <option value="index.php">LOGOUT</option>
                </select>
                    
                <script>
                    function la(src){
                        window.location=src;
                    }
                </script>
                </li>
                
                <li><a href="loginPage.php">CONTACT US</a></li>
            </ul>
        </div>
        
        <div id="lowerNav">
            <li id="AMBIENCE"><a href="user.php">GO BACK</a></li>
        </div>
        
        <div id="divLogin">
            <form action="roomsLoggedIn.php" method="post">
                <div id="room1">
                <img id="hot1" src="images/deluxeRoom.png" width="300" height="164" alt="room"/>
                <h4>DELUXE ROOM</h4>
                <h4>PHP 7500/NIGHT</h4>
                <?php
                    $query = "select roomAvailability from rooms where roomId=1;";
                    $result = mysqli_query($con, $query);
                    
                    $row=mysqli_fetch_array($result);
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>";
                    ?>
                <input id="button" type="submit" name="reserve1" value="RESERVE"/>
                <?php
                    if(isset($_POST["reserve1"])){
                            $_SESSION['roomNo']=1;
                            $type="Deluxe Room";
                            $_SESSION['roomtype']=$type;
                            echo $type;
                            header('Location: myReservation.php');
                        
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
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>";
                    ?>
                <input id="button" type="submit" name="reservee" value="RESERVE"/>
                <?php
                    if(isset($_POST["reservee"])){
                            $_SESSION['roomNo']=2;
                            $type="Superior Room";
                            $_SESSION['roomtype']=$type;
                            echo $type;
                            header('Location: myReservation.php');
                        
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
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>";
                    ?>
                <input id="button" type="submit" name="reserve3" value="RESERVE"/>
                
                <?php
                    if(isset($_POST["reserve3"])){
                            $_SESSION['roomNo']=3;
                            $type="Executive Room";
                            $_SESSION['roomtype']=$type;
                            echo $type;
                            header('Location: myReservation.php');
                        
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
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>";
                    ?>
                <input id="button" type="submit" name="reserve4" value="RESERVE"/>
                
                <?php
                    if(isset($_POST["reserve4"])){
                            $_SESSION['roomNo']=4;
                            $type="Pacific Room";
                            $_SESSION['roomtype']=$type;
                            echo $type;
                            header('Location: myReservation.php');
                        
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
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>";
                    ?>
                <input id="button" type="submit" name="reserve5" value="RESERVE"/>
                
                <?php
                    if(isset($_POST["reserve5"])){
                            $_SESSION['roomNo']=5;
                            $type="Pacific Suite";
                            $_SESSION['roomtype']=$type;
                            echo $type;
                            header('Location: myReservation.php');
                        
                        
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
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>";
                    ?>
                <input id="button" type="submit" name="reserve6" value="RESERVE"/>
                
                <?php
                    if(isset($_POST["reserve6"])){
                            $_SESSION['roomNo']=6;
                            $type="Deluxe Suite";
                            $_SESSION['roomtype']=$type;
                            echo $type;
                            header('Location: myReservation.php');
                        
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
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>";
                    ?>
                <input id="button" type="submit" name="reserve7" value="RESERVE"/>
                
                <?php
                    if(isset($_POST["reserve7"])){
                            $_SESSION['roomNo']=7;
                            $type="Executive Suite";
                            $_SESSION['roomtype']=$type;
                            header('Location: myReservation.php');
                        
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
                    echo "<p>Available rooms : ".$row["roomAvailability"]."</p>";
                    ?>
                <input id="button" type="submit" name="reserve8" value="RESERVE"/>
                
                <?php
                    if(isset($_POST["reserve8"])){
                            $_SESSION['roomNo']=8;
                            $type="Presidential Suite";
                            $_SESSION['roomtype']=$type;
                            header('Location: myReservation.php');  
                        
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
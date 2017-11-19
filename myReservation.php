<?php
    session_start();
    require_once("dbconnection.php");
?>

<?php
    $query = "select * from transactionNo";
    $result = mysqli_query($con, $query);
    
    $row = mysqli_fetch_array($result);
    $_SESSION["transNo"]=$row["transactionNo"];
?>
<!DOCTYPE>
<html>
    
    <head>
        <title>My Reservation</title>
        <link rel="stylesheet" type="text/css" href="myReservationStyle.css"/>
        <link rel="shortcut icon" type="image/png" href="images/kerker.png">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    </head>
    
    <body>
        <div id="topNav">
                <ul id="top">
                <li id="loginNav"><select id="dropdown" onchange = "la(this.value)">
                    <option><?php
                        $username = $_SESSION["name"];
                        echo $_SESSION["name"];
                    ?>
                    </option>
                    <option value="index.php">Logout</option>
                </select>
                    
                <script>
                    function la(src){
                        window.location=src;
                    }
                </script>
                    
                </li>
            </ul>
            <li><a href="contactUs.php">CONTACT US</a></li>
        </div>
        
        <div id="lowerNav">
            <li id="AMBIENCE"><a href="roomsLoggedIn.php">GO BACK</a></li>
        </div>
        
        <div id="divLogin">
            <h4 id="intro">Book your stay with us</h4>
            
            <div id="reserveDiv">
                <form action="myReservation.php" method="post">
                    <div id="chooseARoom">
                        <h4 id="choose">You have chosen:</h4>
                        <br><?php
                        
                        $roomType=$_SESSION["roomtype"];
                            echo $_SESSION["roomtype"];
                        ?>
                    </div>
                    
                    <div id="chckin">
                        <h4 id="checkin">Check-in Date</h4>
                        <input id="checkinDate" type="date" name="checkinDate" size="15" maxlength="30" required="required"/>
                    </div>
                    
                    <div id="chckout">
                        <h4 id="checkin">Check-out Date</h4>
                        <input id="checkoutDate" type="date" name="checkoutDate" size="15" maxlength="30" required="required"/>
                    </div>
                    
                    <div id="numberOfGuest">
                        <h4 id="noguest">Number of Guest</h4>
                        <select id="dropdown2" name="noGuest">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    
                    <div id="numberOfRooms">
                        <h4 id="norooms">Number of Rooms</h4>
                        <select id="dropdown3" name="noRoom">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    
                    <div id="creditCard">
                        <h4>Credit Card Number</h4>
                        <input id="creditcardno" placeholder="Credit card number" width="10" type="number" name="creditcardnumber" size="15" maxlength="30" required="required"/>
                    </div>
                    
                    <input id="button" name="ok" type="submit" value="Reserve"/>
                    
                    <?php
                        if(isset($_POST["ok"])){
                            $roomNo=$_SESSION['roomNo'];
                            $noRoom = $_POST["noRoom"];
                            $query = "select roomAvailability from rooms where roomId=".$roomNo.";";
                            $result = mysqli_query($con, $query);

                            $row=mysqli_fetch_array($result);
                            $roomAvailable = $row["roomAvailability"];
                            if($noRoom>$roomAvailable){
                                echo "<h5>You exceeded the number of rooms</h5><br><h5>".$roomAvailable." room left</h5>";
                            }
                            else{
                            
                            $transactionNumber = $_SESSION["transNo"]+1;
                            $checkinDate = $_POST["checkinDate"];
                            $checkoutDate = $_POST["checkoutDate"];
                            $noGuest = $_POST["noGuest"];
                            $ccNumber = $_POST["creditcardnumber"];
                            
                            $query = "insert into pending_booking values(";
                            $query .= "'".$transactionNumber ."', '" . $username . "', " . $roomNo . ", '" . $checkinDate . "', '" . $checkoutDate . "', " . $noGuest .", ". $noRoom . ", " . $ccNumber . "";
                            $query .= ");";
                            $result = mysqli_query($con, $query);
                            $query = null;
                            
                            $query = "update rooms set roomAvailability=roomAvailability-".$noRoom." where roomId=".$roomNo.";";
                            $result = mysqli_query($con, $query);
                            $query = null;
                                
                            echo "<script>alert('You successfully reserved a room!');
                            window.location.href='user.php';
                            </script>";
                            }
                        }
                    ?>
                    
                </form>
            </div>
            
            
            
        </div>
        
        
        <div id="forLogo">
            <img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/>
            <h2 id="myAccount">RESERVE</h2>
        </div>
        
        <div id="forFooter">
            <p id="Copyright">Copyright 2017 &copy; Kerokero Hotels. All Rights Reserved.</p> 
        </div>
        
    </body>
</html>
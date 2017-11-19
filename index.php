<?php
    session_start();
    $_SESSION["login"]=false;
    $_SESSION["query"]="";
    require_once("dbconnection.php");
?>

<!DOCTYPE>

<html>
    <head>
        <title>Kerokero Hotel</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel="shortcut icon" type="image/png" href="images/kerker.png">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    </head>
    
    <body>
        <div id="topNav">
            <ul id="top">
                <li><a href="contactUs.php">CONTACT US</a></li>
                <li id="loginNav"><a href="loginPage.php">LOGIN</a></li>
            </ul>
        </div>
        
        <div id="lowerNav">
            <li id="AMBIENCE"><a href="#forReservation">THE HOTEL</a></li>
            <li><a href="#forLocation ">LOCATION</a></li>
            <li><a href="#forOffers">OFFERS</a></li>
            <li><a href="rooms.php">ROOMS</a></li>
            <li><a href="#forAbout">ABOUT US</a></li>
        </div>
        
        <div id="forLogo">
                
        </div>
        
        <div id="theMiddle">
            <a href="#forLocation"><h4 id="theMiddleTag">EXPERIENCE BEING A ROYALTY</h4></a>
        </div>
        
        <div id="forReservation">
            <a href="#topNav"><img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/></a>
            <img id="imgIntro" src="images/kerker.png" width="160" height="160"/>
            <h2>THE KEROKERO HOTEL</h2>
            <p id="para">The Kerokero Hotel is a five star hotel that offers world-class rooms, suites, and spacious events' place best for huge gatherings.</p>
            <p id="para">Located at the Ecoland in the City of Davao, the Kerokero Hotel gives you the experience of being a royalty. With its world class accomodation and globally known Filipino hospitality, you will surely leave the hotel with a smile on your faces.</p>
        </div>
        
        <div id="theMiddle2">
            <a href="#forLocation"><h4 id="theMiddleTag2">A GLIMPSE OF ITS LOCATION</h4></a>
        </div>
        
        <div id="forLocation">
            <h2 id="loc">LOCATION:<br>Right in the heart of the City of Davao's<br>business and shopping district</h2>
            
            
            <div id="smoothPic" style="max-width:500px">
                <img class="mySlides lefty" src="images/forLocation.png" style="width:100%">
                <img class="mySlides lefty" src="images/forLocation2.png" style="width:100%">
                <img class="mySlides lefty" src="images/forLocation3.png" style="width:100%">
                
            </div>
            
            <script>
                var myIndex = 0;
                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    for (i = 0; i < x.length; i++) {
                       x[i].style.display = "none";  
                    }
                    
                    myIndex++;
                    
                    if (myIndex > x.length) {myIndex = 1}    
                        x[myIndex-1].style.display = "block";  
                        setTimeout(carousel, 3000); // Change image every 2 seconds
                    }

                carousel();
            </script>
        </div>
        
        <div id="theMiddle3">
            <a href="#forOffers"><h4 id="theMiddleTag3">GRAB OUR AFFORDBABLE OFFERS</h4></a>
        </div>
        
        <div id="forOffers">
            <h4 id="hotelOffers">THE KEROKERO HOTELS ROOMS AND SUITES</h4>
            
            <div id="offer1">
                <h4>Deluxe Room</h4>
                <p>Php 7500</p>
            </div>
            
            <div id="offer2">
                <h4>Superior Room</h4>
                <p>Php 7200</p>
            </div>
            
            <div id="offer3">
                <h4>Executive Room</h4>
                <p>Php 8800</p>
            </div>
            
            <div id="offer4">
                <h4>Pacific Room</h4>
                <p>Php 10700</p>
            </div>
            
            <div id="offer5">
                <h4>Deluxe Suite</h4>
                <p>Php 13600</p>
            </div>
            
            <div id="offer6">
                <h4>Deluxe Suite</h4>
                <p>Php 13600</p>
            </div>
            
            <div id="offer7">
                <h4>Executive Suite</h4>
                <p>Php 23100</p>
            </div>
            
            <div id="offer8">
                <h4>Presidential Suite</h4>
                <p>Php 60100</p>
            </div>
            
            
        </div>
        <div id="theMiddle4">
            <a href="#forLocation"><h4 id="theMiddleTag2">ALL ABOUT THE HOTEL</h4></a>
        </div>
        
        <div id="forAbout">
            <h4 id="paraHotel">ABOUT THE HOTEL</h4>
            <p id="paraHotel2">The Kerokero Hotel is run by the well known<br>and successful entrepreneurs in the Philippines and the South East Asian Region.<br>The Kerokero Hotel provides the customers a Filipino hospitality and a Western type of ambience. <br>Here are the people behind the success of the hotel.</p>
            <div id="about1">
                <img id="king"src="images/king.png" width="180" height="180" alt="king"/>
                <h4><br>Kenneth Celocia</h4>
                <p>President</p>
            </div>
            
            <div id="about2">
                <img id="rona" src="images/rona.png" width="180" height="180" alt="king"/>
                <h4><br>Rona Licera</h4>
                <p>Vice President, Finance and Business Development</p>
            </div>
            
            <div id="about3">
                <img id="rona" src="images/kenth.png" width="180" height="180" alt="king"/>
                <h4><br>Kenth Wilson Singco</h4>
                <p>Vice President, Operations</p>
            </div>
            
            <div id="about4">
                <img id="rona" src="images/roxan.png" width="180" height="180" alt="king"/>
                <h4><br>Roxan Tiu</h4>
                <p>Vice President, Sales & Marketing</p>
            </div>
        
        </div>
        
        <div id="forFooter">
            <p id="Copyright">Copyright 2017 &copy; Kerokero Hotel. All Rights Reserved.</p>
        </div>        
    </body>
    
</html>
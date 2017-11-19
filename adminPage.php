<?php
    function redirect(){
        header("Location: loginPage.php");
    }
?>

<?php
    require_once("dbconnection.php");
    require_once("sqlfunctions.php");
?>


<!DOCTYPE>


<html>
    <head>
        <title>Administration</title>
        <link rel="stylesheet" type="text/css" href="adminStyle.css"/>
        <link rel="shortcut icon" type="image/png" href="images/kerker.png">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
        <script src="jquery-3.2.1.min.js"></script>
    </head>
    
    <body>
        <div id="topNav">
            <ul id="navi">
                <a href="index.php"><li id="loginNav">LOGOUT</li></a>
            </ul>
        </div>
        
        <div id="lowerNav">
            <a id="refreshing" href="adminPage.php"><li>Refresh</li></a>
        </div>
        
        <div id="divTab">
            <div class="tab">
              <button class="tablinks" onclick="openTab(event, 'Reservations')" id="defaultOpen">Reservations</button>
              <button class="tablinks" onclick="openTab(event, 'Book')">Booked </button>
              <button class="tablinks" onclick="openTab(event, 'User_Accounts')">User Accounts</button>
              <button class="tablinks" onclick="openTab(event, 'Archive')">Archive</button>
            </div>

            <div id="Reservations" class="tabcontent">
                <table>
                    <tr>
                        <thead>
                            <th>TRANSACTION<br>NO</th>
                            <th>USER NAME</th>
                            <th>ROOM TYPE</th>
                            <th>CHECK-IN<br> DATE</th>
                            <th>CHECK-OUT<br> DATE</th>
                            <th>NO OF<br>GUEST</th>
                            <th>NO OF<br>ROOM</th>
                            <th>CREDIT CARD NO</th>
                            <th>TOTAL<br>PRICE</th>
                            <th> </th>
                            <th> </th>
                        </thead>
                    </tr>
                    
                    <?php
                        displayReservations();
                    ?>
                </table>
                
            </div>
            
            <div id="Book" class="tabcontent">
                <table>
                    <tr>
                        <thead>
                            <th>TRANSACTION<br>NO</th>
                            <th>USER NAME</th>
                            <th>ROOM TYPE</th>
                            <th>CHECK-IN<br> DATE</th>
                            <th>CHECK-OUT<br> DATE</th>
                            <th>NO OF<br>GUEST</th>
                            <th>NO OF<br>ROOM</th>
                            <th>CREDIT CARD<br> NO</th>
                            <th>TOTAL PRICE</th>
                            <th> </th>
                            <th> </th>
                        </thead>
                    </tr>
                    
                    <?php
                        displayBook();
                    ?>
                </table>
                
            </div>

            <div id="User_Accounts" class="tabcontent">
                <table>
                    <tr>
                        <thead>
                            <th>USER NAME</th>
                            <th>LAST NAME</th>
                            <th>FIRST NAME</th>
                            <th>EMAIL ACCOUNT</th>
                            <th>ACCOUNT STATUS</th>
                        </thead>
                    </tr>
                    
                    <?php
                        displayUsers();
                    ?>
                </table>
                
            </div>

            <div id="Archive" class="tabcontent">
                <table>
                    <tr>
                        <thead>
                            <th>TRANSACTION<br>NO</th>
                            <th>USER NAME</th>
                            <th>ROOM TYPE</th>
                            <th>CHECK-IN DATE</th>
                            <th>CHECK-OUT DATE</th>
                            <th>NO OF<br>GUEST</th>
                            <th>NO OF<br>ROOM</th>
                            <th>CREDIT CARD NO</th>
                            <th>TOTAL PRICE</th>
                            <th>STATUS</th>
                        </thead>
                    </tr>
                    
                    <?php
                        displayArchive();
                    ?>
                </table>
            </div>

            <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
                
            //Script for Deactivating activating users
                $(document).on("click", ".theButtons", function(){
                    alert("Status Changed");
                    
                    let UStatus=$('.status'+$(this).attr('rown')+'').text();
                    let userID=$('.userID'+$(this).attr('rown')+'').text();
                    
                    $.post("sqlfunctions.php",{stat:UStatus,IdNo:userID},
                        function(data){
                        $('#samppp').html(data);
                        location.reload();
                        });
                })
                
                $(document).on("click", ".theButtonApprove", function(){
                    
                    let tNoApprove=$('.transNoR'+$(this).attr('rown')+'').text();
                    
                    
                    alert("Reservation approved");
                    
                    $.post("sqlfunctions.php",{transNoApprove:tNoApprove,ss:"ss"},
                        function(data){
                        console.log(tNoApprove);
                        
                        location.reload();
                        });
                })
                
                $(document).on("click", ".theButtonArchiveR", function(){
                    
                    let tNoArchiveR=$('.transNoR'+$(this).attr('rown')+'').text();
                    
                    
                    alert("Data archived");
                    
                    $.post("sqlfunctions.php",{transNoArchive:tNoArchiveR,ss:"ss"},
                        function(data){
                        console.log(tNoArchiveR);
                        
                        location.reload();
                        });
                })
                
                
                $(document).on("click", ".theButtonCheckOut", function(){
                    let tNoCheckOut=$('.transNoCO'+$(this).attr('rown')+'').text();
                    
                    
                    $.post("sqlfunctions.php",{transNoCheckOut:tNoCheckOut,ss:"ss"},
                        function(data){
                        console.log(tNoCheckOut);
                        alert("Check out success");
                        
                        location.reload();
                        });
                })
                
            </script>
        </div>
        
        
        <div id="forLogo">
            <p>ADMINISTRATION</p>
        </div>
            
        
    </body>
</html>
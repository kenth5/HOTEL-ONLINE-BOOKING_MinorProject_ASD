<!DOCTYPE>
<?php
    require_once("dbconnection.php");
    session_start();
?>

<html id="st">
    <head>
        <title>Recovery</title>
        <link rel="stylesheet" type="text/css" href="recoveryStyle.css"/>
        <link rel="shortcut icon" type="image/png" href="images/kerker.png">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    </head>
    
    <body>
        <div id="topNav">
            <ul id="links">
                <li id="loginNav"><a href="loginPage.php">LOGIN</a></li>
                <li><a href="loginPage.php">CONTACT US</a></li> 
            </ul>
        </div>
        
        <div id="lowerNav">
            <li id="AMBIENCE"><a href="loginPage.php">GO BACK</a></li>
        </div>
        
        <div id="divLogin">
            <p id="intro">To be able to get in to your account,<br>answer the question that you have chosen right at the course of your registration.<br>We have provided couple of sections for you<br>to be able to change your password.</p>
        </div>
        
        
        <div id="forLogo">
            <img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/>
            <h2 id="myAccount">RECOVERY</h2>
            
            <div class="st" id="login">
                <form action="#login" method="post">
                    <h3>RECOVERY</h3>
                    <p>Answer the question that you provided during the registration process.</p>
                    
                    <!--Dinhi ang question-->
                    <br><input type="text" name="userName" placeholder="Your username" size="25" maxlength="30" required="required"/>
                    <br><input id="button" type="submit" name="ok" value="OK" align="bottom"/>
                    <?php
                        if(isset($_POST['userName'])){
                            $query = "select * from users";
                            $result = mysqli_query($con, $query);
                            $bol=false;

                            while($row = mysqli_fetch_array($result)){
                                if($row['userID']==$_POST['userName']){
                                    $bol=true;
                                    $_SESSION['recoveryUserName']=$row['userID'];
                                    header('Location: recovery2.php');
                                    break;
                                }
                            }

                            if($bol===false){
                                echo "<br><h5>User doesn't exist</h5>";
                            }
                        }
                    ?>
                </form>
            </div>
            
            
        </div>
        
        <div id="forFooter">
            <p id="Copyright">Copyright 2017 &copy;Kerokero Hotel. All Rights Reserved.</p> 
        </div>
        
        
    </body>
</html>
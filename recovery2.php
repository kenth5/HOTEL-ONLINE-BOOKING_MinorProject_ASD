<!DOCTYPE>
<?php
    session_start();
    require_once("dbconnection.php");
?>

<html>
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
            <li id="AMBIENCE"><a href="recovery.php">GO BACK</a></li>
        </div>
        
        <div id="divLogin">
            <p id="intro">To be able to get in to your account,<br>answer the question that you have chosen right at the course of your registration.<br>We have provided couple of sections for you<br>to be able to change your password.</p>
        </div>
        
        
        <div id="forLogo">
            <img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/>
            <h2 id="myAccount">RECOVERY</h2>
            
            <div id="login">
                <form action="#login" method="post">
                    <h3>RECOVERY</h3>
                    <p>Answer the question that you provided during the registration process.</p>
                    <?php
                        $query = "select question from users where userID='".$_SESSION['recoveryUserName']."'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);
                        echo "<br>".$row['question'];
                    ?>
                    <!--Dinhi ang question-->
                    <br><input type="text" name="recoveryAnswer" placeholder="Your answer" size="25" maxlength="30" required="required"/>   
                    <br><input type="password" name="changePass" placeholder="New password" size="25" maxlength="30" required="required"/>
                    <br><input type="password" name="changePass2" placeholder="Confirm new password" size="25" maxlength="30" required="required"/>
                    <br><input id="button" type="submit" name="ok" value="OK" align="bottom"/>
                    <?php
                        if(isset($_POST['ok'])){
                            $query = "select recovery from users where userID='".$_SESSION['recoveryUserName']."'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_array($result);
                            if($_POST['changePass']!=$_POST['changePass2']){
                                echo "<br><br><h5>Password do not match</h5>";
                            }
                            else if($row['recovery']!=$_POST['recoveryAnswer']){
                                echo "<br><br><h5>Incorrect answer</h5>";
                            }
                            else if($row['recovery']==$_POST['recoveryAnswer']){
                                $query="UPDATE `users` SET `password` = '".$_POST['changePass']."' WHERE `users`.`userID` = '".$_SESSION['recoveryUserName']."'";
                                $result = mysqli_query($con, $query);
                                if($result==1){
                                echo '<script>
                                    alert("Account successfully recovered");
                                    </script>';
                                    header('Location: loginPage.php');
                                }
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
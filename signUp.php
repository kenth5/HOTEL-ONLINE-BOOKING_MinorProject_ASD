<?php
    function redirect(){
        header("Location: loginPage.php");
    }
?>

<?php
    require_once("dbconnection.php");
?>


<!DOCTYPE>


<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="signUpStyle.css"/>
        <link rel="shortcut icon" type="image/png" href="images/kerker.png">
        <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    </head>
    
    <body>
        <div id="topNav">
            <ul id="links">
                <li><a href="loginPage.html">LOGIN</a></li>
                <li><a href="reservation.html">MY RESERVATIONS</a></li>
            </ul>
        </div>
        
        <div id="lowerNav">
            <li id="AMBIENCE"><a href="index.html">THE HOTEL</a></li>
        </div>
        
        <div id="divLogin">
            <p id="intro">To be able to book for reservation, register online. Create an account for free.</p>
        </div>
        
        
        <div id="forLogo">
            <img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/>
            <h2 id="myAccount">SIGN UP</h2>
            
            <div id="login">
                <form action="signUp.php" method="post">
                    <h3>SIGN UP</h3>
                    <p>Last Name<br><input type="text" name="lastName" size="25" maxlength="30" required="required"/></p>
                    <p>First Name<br><input type="text" name="firstName" size="25" maxlength="30" required="required"/></p>
                    <p>Username<br><input type="text" name="username" size="25" maxlength="30" required="required"/></p>
                    <p>Password<br><input type="password" name="password" size="25" maxlength="30" required="required"/></p>
                    <p>Confirm Password<br><input type="password" name="confirmPassword" size="25" maxlength="30" required="required"/></p>
                    <p>Choose your recovery question.</p>
                    <select id="dropdown" required="required">
                        <option>Who is your mother?</option>
                        <option>What is your favorite color?</option>
                        <option>Where do you live?</option>
                        <option>What is your favorite pet?</option>
                        <option>How was this experience signing up?</option>
                    </select>
                    <p>Answer<br><input type="text" name="recovery" size="25" maxlength="30" required="required"/></p>
                    <input id="button" type = "submit" name="ok" value="Sign In" align="bottom"/>
                    
                    <?php
                        if(isset($_POST["ok"])){
                            $userID = $_POST["username"];
                            $lastname = $_POST["lastName"];
                            $firstname = $_POST["firstName"];
                            $password = $_POST["password"];
                            $confirmPassword = $_POST["confirmPassword"];
                            $recovery = $_POST["recovery"];
                            
                            if($password === $confirmPassword){
                                $query = "insert into users values(";
                                $query .= "'" . $userID . "', '" . $lastname . "', '" . $firstname . "', '" . $password . "', '" . $userID . "'";
                                $query .= ");";
                                redirect();
                                $result = mysqli_query($con, $query);
                            }else{
                                echo "<h5><br>Passwords do not match. Try again.</h5>";
                            }
                        }
                    ?>
                </form>
            </div>
            
            
        </div>
        
        <div id="forFooter">
            <p id="Copyright">Copyright 2017 &copy; <a id="marc" href="http://www.marcopolohotels.com/index.html" target="_blank">Marco Polo Hotels</a>. All Rights Reserved.</p> 
        </div>
        
        
    </body>
</html>
<?php
    function redirect(){
        header("Location: user.php");
    }
?>
<?php
    require_once("dbconnection.php");
    $query = "select * from users";
    $result = mysqli_query($con, $query);

    if(!$result){
        die("Failed");
    }
?>

<?php
    $username="";
    function check($userID){
        global $result;
        global $con;
        
        $bol = false;
        while($row = mysqli_fetch_array($result)){
            if($userID == $row["userID"]){
                $bol = true;
                break;
            }else{
                $bol = false;
            }
        }
        return $bol;
    }
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
                <li id="loginNav"><a href="loginPage.php">LOGIN</a></li>
                <li><a href="loginPage.php">CONTACT US</a></li> 
            </ul>
        </div>
        
        <div id="lowerNav">
            <li id="AMBIENCE"><a href="index.php">GO BACK</a></li>
        </div>
        
        <div id="divLogin">
            <p id="intro">To be able to book for reservation, register online. Create an account for free.</p>
        </div>
        
        
        <div id="forLogo">
            <img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/>
            <h2 id="myAccount">SIGN UP</h2>
            
            <div id="login">
                <form action="#login" method="post">
                    <h3>SIGN UP</h3>
                    <p>Last Name<br><input type="text" name="lastName" size="25" maxlength="30" required="required" autocapitalize="word"/></p>
                    <p>First Name<br><input type="text" name="firstName" size="25" maxlength="30" required="required"/></p>
                    <p>Username<br><input type="text" name="username" size="25" maxlength="15" required="required"/></p>
                    <p>Email<br><input type="email" placeholder="Enter your email" name="email" size="25" maxlength="30" required="required"/></p>
                    <p>Password<br><input type="password" name="password" size="25" maxlength="30" required="required"/></p>
                    <p>Confirm Password<br><input type="password" name="confirmPassword" size="25" maxlength="30" required="required"/></p>
                    <p>Choose your recovery question.</p>
                    <select id="dropdown" name="dropdown" required="required">
                        <option>Who is your mother?</option>
                        <option>What is your favorite color?</option>
                        <option>Where do you live?</option>
                        <option>What is your favorite pet?</option>
                        <option>How was this experience signing up?</option>
                    </select>
                    <p>Answer<br><input type="text" name="recovery" size="25" m axlength="30" required="required"/></p>
                    <input id="button" type = "submit" name="ok" value="Sign Up" align="bottom"/>
                    
                    <?php
                        if(isset($_POST["ok"])){
                            $userID = $_POST["username"];
                            if (check($userID)===false){
                                $lastname = $_POST["lastName"];
                                $firstname = $_POST["firstName"];
                                $email = $_POST["email"];
                                $password = $_POST["password"];
                                $confirmPassword = $_POST["confirmPassword"];
                                $question = $_POST["dropdown"];
                                $recovery = $_POST["recovery"];
                                
                                unset($_SESSION['name']);
                                $_SESSION["name"]=$userID;
                                $_SESSION["login"]=true;

                                if($password === $confirmPassword){
                                    $query = "insert into users values(";
                                    $query .= "'" . $userID . "', '" . $lastname . "', '" . $firstname . "', '" . $password ."', '".$email. "', '" . $question . "', '".$recovery."', 'activated'";
                                    $query .= ");";
                                    $result = mysqli_query($con, $query);
                                    $query = null;
                                    echo $query;
                                    redirect();
                                }else{
                                    echo "<h5><br>Passwords do not match. Try again.</h5>";
                                }
                            }
                            else{
                                echo "<h5><br>USER ALREADY EXISTS. TRY ANOTHER.</h5>";
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
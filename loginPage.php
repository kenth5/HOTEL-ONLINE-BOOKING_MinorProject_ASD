<?php
    session_start();
    function redirect1(){
        header("Location: user.php");
    }
    function redirect2(){
        header("Location: adminPage.php");
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
    function check($userID, $password){
        global $result;
        global $con;
        
        $blocked=false;
        $bol = false;
        $admin = false;
        $coun = 0;
        while($row = mysqli_fetch_array($result)){
            if($userID == $row["userID"] & $password == $row["password"]){
                if($coun===0){
                    $admin=true;
                }
                $bol = true;
                $_SESSION["name"]=$userID;
                $_SESSION["login"]=true;
                if($row['status']==="deactivated"){
                    $blocked=true;
                }
                break;
                
            }else{
                $coun+=1;
                $bol = false;
            }
        }
        
        if($bol != true){
            echo "<h5>Invalid user account</h5>";
        }
        else if($blocked===true){
            echo "<h5>Your account is blocked by the admin</h5>";
        }
        else if($admin===false){
            redirect1();
        }
        else{
            redirect2();
        }
        
    }
?>

<!DOCTYPE>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="loginPageStyle.css"/>
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
            <p id="intro">To be able to<br> book a stay, login online<p/>
            <p id="intro2">For those who haven't<br>had one, create an account for free.</p>
        </div>
        
        
        <div id="forLogo">
            <img id="kerorologo" src="images/LOGO8.png" width="160" height="160"/>
            <h2 id="myAccount">MY ACCOUNT</h2>
            
            
            <form action="loginPage.php" method="post">
                <div id="login">
                    <h3>LOGIN</h3>
                    <p>Username<input type="text" name="username" size="25" maxlength="30" required="required"/></p>
                    <p>Password<input type="password" name="password" size="25" maxlength="30" required="required"/></p>
                    <input id="button" type = "submit" name="ok" value="Login" align="bottom"/><br>
                    <p id="forgs"><a href="recovery.php">Forgot password? Click here</a>.</p>
                    
                    <?php
                        if(isset($_POST["ok"])){
                            check($_POST["username"], $_POST["password"]);
                        }
                    ?>
                    
                </div>
            </form>
            
            <div id="signUp">
                <h3>NO ACCOUNT YET? SIGN UP HERE FOR FREE.</h3>
                <a href="signUp.php"><input id="button" type = "submit" name="signUp" value="Sign Up" align="bottom"/></a>
            </div>
            
        </div>
        
        <div id="forFooter">
            <p id="Copyright">Copyright 2017 &copy; Kerokero Hotels. All Rights Reserved.</p> 
        </div>
        
        
    </body>
</html>
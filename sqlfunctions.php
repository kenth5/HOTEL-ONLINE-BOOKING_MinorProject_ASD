<style>
    #ma{
    margin-top: 20px;
    background-color: #0F5959;
    color: white;
    font-family: 'Julius Sans One', 'Lucida Sans', sans-serif;
    padding: 8px 30px;
    border: 2px solid #0F5959;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
}

#ma:hover{
    background-color: #ffffff;
    color: black;
}
</style>

<?php
    require_once("dbconnection.php");
    session_start();
    //delete/write 

    if(isset($_POST["stat"])){
        $userName=$_POST["IdNo"];
        $status="";
        
        $query = "select * from users_view";
        $result = mysqli_query($con,$query);
        
        $countee=0;
        while($row=mysqli_fetch_array($result)){
            if($userName==$row['userID']){
                $status=$row['status'];
                break;
            }
        }
        
        if ($status=="activated"){
            $query="UPDATE `users` SET `status` = 'deactivated' WHERE `users`.`userID` ='".$userName."';";
            $result = mysqli_query($con, $query);
        }
        else if($status=="deactivated"){
            $query="UPDATE `users` SET `status` = 'activated' WHERE `users`.`userID` ='".$userName."';";
            $result = mysqli_query($con, $query);
        }
        echo $query;
    }

    else if(isset($_POST["transNoApprove"])){
        $transNo=$_POST["transNoApprove"];
        //delete from pending reservations
        $query = "select * from pending_booking";
        $result = mysqli_query($con, $query);
        $query=null;
        
        $query = "select * from pending_booking";
        $result = mysqli_query($con,$query);
        
        while($row=mysqli_fetch_array($result)){
            if($transNo===$row['transactionNo']){
                $username=$row['userID'];
                $roomtype=$row['roomId'];
                $checkinDate=$row['checkinDate'];
                $checkoutDate=$row['checkoutDate'];
                $noOfGuest=$row['noOfGuest'];
                $noOfRooms=$row['noOfRoom'];
                $ccNumber=$row['ccNumber'];
                    
                $query = "DELETE FROM `pending_booking` WHERE `pending_booking`.`transactionNo` =".$transNo.";";
                
                $result = mysqli_query($con, $query);
                $query=null;
                
                //write to approved table
                $query = "insert into approved_booking values(";
                $query .= $transNo .", '" . $username . "'," . $roomtype . ", '" . $checkinDate . "', '" . $checkoutDate . "', " . $noOfGuest .", ". $noOfRooms . ", " . $ccNumber ;
                $query .= ");";
                $result = mysqli_query($con, $query);
                echo $query;
                $query = null;
                
                $query = "update rooms set roomAvailability=roomAvailability-".$noRoom." where roomName='".$roomType."';";
                $result = mysqli_query($con, $query);
                $query = null;
                
                break;
            }
        }
    }

    else if(isset($_POST["transNoArchive"])){
        $transNo=$_POST["transNoArchive"];
        //delete from pending reservations
        $query = "select * from pending_booking";
        $result = mysqli_query($con, $query);
        $query=null;
        
        $query = "select * from pending_booking";
        $result = mysqli_query($con,$query);
        
        while($row=mysqli_fetch_array($result)){
            if($transNo===$row['transactionNo']){
                $username=$row['userID'];
                $roomtype=$row['roomId'];
                $checkinDate=$row['checkinDate'];
                $checkoutDate=$row['checkoutDate'];
                $noOfGuest=$row['noOfGuest'];
                $noOfRooms=$row['noOfRoom'];
                $ccNumber=$row['ccNumber'];
                    
                $query = "DELETE FROM `pending_booking` WHERE `pending_booking`.`transactionNo` =".$transNo.";";
                
                $result = mysqli_query($con, $query);
                $query=null;
                
                $query="update rooms set roomAvailability = roomAvailability+".$noOfRooms." where roomId='".$roomtype."';";
                $result = mysqli_query($con, $query);
                echo $query;
                $query = null;
                
                //write to approved table
                $query = "insert into archive values(";
                $query .= $transNo .", '" . $username . "'," . $roomtype . ", '" . $checkinDate . "', '" . $checkoutDate . "'," . $noOfGuest .", ". $noOfRooms . "," . $ccNumber . ",'Denied'";
                $query .= ");";
                $result = mysqli_query($con, $query);
                echo $query;
                $query = null;
                break;
            }
        }
    }

    else if(isset($_POST["transNoBooked"])){
        $transNo=$_POST["transNoBooked"];
        //delete from pending reservations
        $query = "select * from approved_booking";
        $result = mysqli_query($con, $query);
        $query=null;
        
        $query = "select * from approved_booking";
        $result = mysqli_query($con,$query);
        
        while($row=mysqli_fetch_array($result)){
            if($transNo===$row['transactionNo']){
                $username=$row['userID'];
                $roomtype=$row['roomId'];
                $checkinDate=$row['checkinDate'];
                $checkoutDate=$row['checkoutDate'];
                $noOfGuest=$row['noOfGuest'];
                $noOfRooms=$row['noOfRoom'];
                $ccNumber=$row['ccNumber'];
                    
                $query = "DELETE FROM `approved_booking` WHERE `approved_booking`.`transactionNo` =".$transNo.";";
                
                $result = mysqli_query($con, $query);
                $query=null;
                
                //write to approved table
                $query = "insert into archive values(";
                $query .= $transNo .", '" . $username . "'," . $roomtype . ", '" . $checkinDate . "', '" . $checkoutDate . "', " . $noOfGuest .", ". $noOfRooms . ", " . $ccNumber;
                $query .= ");";
                $result = mysqli_query($con, $query);
                echo $query;
                $query = null;
                break;
            }
        }
    }

    else if(isset($_POST["transNoCheckOut"])){
        $transNo=$_POST["transNoCheckOut"];
        //delete from pending reservations
        $query = "select * from approved_booking";
        $result = mysqli_query($con, $query);
        $query=null;
        
        $query = "select * from approved_booking";
        $result = mysqli_query($con,$query);
        
        while($row=mysqli_fetch_array($result)){
            if($transNo===$row['transactionNo']){
                $username=$row['userID'];
                $roomtype=$row['roomId'];
                $checkinDate=$row['checkinDate'];
                $checkoutDate=$row['checkoutDate'];
                $noOfGuest=$row['noOfGuest'];
                $noOfRooms=$row['noOfRoom'];
                $ccNumber=$row['ccNumber'];
                    
                $query = "DELETE FROM `approved_booking` WHERE `approved_booking`.`transactionNo` =".$transNo.";";
                
                $result = mysqli_query($con, $query);
                $query=null;
                
                $query="update rooms set roomAvailability = roomAvailability+".$noOfRooms." where roomName='".$roomtype."';";
                $result = mysqli_query($con, $query);
                echo $query;
                $query = null;
                
                //write to approved table
                $query = "insert into archive values(";
                $query .= $transNo .", '" . $username . "'," . $roomtype . ", '" . $checkinDate . "', '" . $checkoutDate . "', " . $noOfGuest .", ". $noOfRooms . ", " . $ccNumber . ", 'Check out'";
                $query .= ");";
                $result = mysqli_query($con, $query);
                $query = null;
                
                
                break;
            }
        }
    }


    //display functions

    function displayUsers(){
        global $con;
        $query = "select * from users_view";
        $result = mysqli_query($con,$query);
        
        $countee=0;
        while($row=mysqli_fetch_array($result)){
            if($countee===0){
                $countee++;
                continue;
            }
            else{
            echo "<tr><td class='userID".$countee."'>".$row["userID"] . "</td>";
            echo "<td>".$row["lastname"]."</td>";
            echo "<td>".$row["firstname"]."</td>";
            echo "<td>".$row["email"]."</td>"; 
            echo "<td><input value=".$row["status"]." type='button' class='theButtons' id='ma' rown='".$countee."'></td></tr>";
            $countee++;
            } 
        }
    }
?>

<?php
    function displayReservations(){
        global $con;
        $query = "select * from pending_booking";
        $result = mysqli_query($con, $query);
        $countee=0;
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr><td class='transNoR".$countee."'>" . $row["transactionNo"] . "</td>";
            echo "<td>" . $row["userID"] . "</td>";
            $rooms=array('Deluxe Room','Superior Room','Executive Room','Pacific Room','Pacific Suite','Deluxe Suite','Executive Suite','presidential Suite');
            $roomId=$row["roomId"];
            $roomPrice=array(7500,7200,7800,8800,10700,13600,23100,60100);
            $totalPrice=$row["noOfRoom"]*$roomPrice[$roomId-1];
            echo "<td>" . $rooms[$roomId-1] . "</td>";
            echo "<td>" . $row["checkinDate"] . "</td>";
            echo "<td>" . $row["checkoutDate"] . "</td>";
            echo "<td>" . $row["noOfGuest"] . "</td>";
            echo "<td>" . $row["noOfRoom"] . "</td>";
            echo "<td>" . $row["ccNumber"] . "</td>";
            echo "<td> &#8369 " . $totalPrice . "</td></tr>";
            echo "<td><input value='Approve' type='button' class='theButtonApprove' id='ma' rown='".$countee."'></td>";
            echo "<td><input value='Deny' type='button' class='theButtonArchiveR' id='ma' rown='".$countee."'></td></tr>";
            $countee++;
        }
    }

    function displayBook(){
        global $con;
        $query = "select * from approved_booking";
        $result = mysqli_query($con, $query);
        $countee=0;
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr><td class='transNoCO".$countee."'>" . $row["transactionNo"] . "</td>";
            echo "<td>" . $row["userID"] . "</td>";
            $rooms=array('Deluxe Room','Superior Room','Executive Room','Pacific Room','Pacific Suite','Deluxe Suite','Executive Suite','presidential Suite');
            $roomId=$row["roomId"];
            $roomPrice=array(7500,7200,7800,8800,10700,13600,23100,60100);
            $totalPrice=$row["noOfRoom"]*$roomPrice[$roomId-1];
            echo "<td>" . $rooms[$roomId-1] . "</td>";
            echo "<td>" . $row["checkinDate"] . "</td>";
            echo "<td>" . $row["checkoutDate"] . "</td>";
            echo "<td>" . $row["noOfGuest"] . "</td>";
            echo "<td>" . $row["noOfRoom"] . "</td>";
            echo "<td>" . $row["ccNumber"] . "</td>";
            echo "<td> &#8369 " . $totalPrice . "</td>";
            echo "<td><input value='Check out' type='button' class='theButtonCheckOut' id='ma' rown='".$countee."'></td></tr>";
            $countee++;
        }
    }

    function displayArchive(){
        global $con;
        $query = "select * from archive";
        $result = mysqli_query($con, $query);
        $countee=0;
        
        while($row = mysqli_fetch_array($result)){
            
            echo "<tr><td>" . $row["transactionNo"] . "</td>";
            echo "<td>" . $row["userID"] . "</td>";
            $rooms=array('Deluxe Room','Superior Room','Executive Room','Pacific Room','Pacific Suite','Deluxe Suite','Executive Suite','presidential Suite');
            $roomId=$row["roomId"];
            $roomPrice=array(7500,7200,7800,8800,10700,13600,23100,60100);
            $totalPrice=$row["noOfRoom"]*$roomPrice[$roomId-1];
            echo "<td>" . $rooms[$roomId-1] . "</td>";
            echo "<td>" . $row["checkinDate"] . "</td>";
            echo "<td>" . $row["checkoutDate"] . "</td>";
            echo "<td>" . $row["noOfGuest"] . "</td>";
            echo "<td>" . $row["noOfRoom"] . "</td>";
            echo "<td>" . $row["ccNumber"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td> &#8369 " . $totalPrice . "</td></tr>";
            $countee++;
        }
    }

    function displayMyReservation(){
        global $con;
        $query = "select * from approved_booking";
        $result = mysqli_query($con, $query);
        $countee=0;
        
        while($row = mysqli_fetch_array($result)){
            if($row['userID']==$_SESSION["name"]){
                $rooms=array('Deluxe Room','Superior Room','Executive Room','Pacific Room','Pacific Suite','Deluxe Suite','Executive Suite','presidential Suite');
                $roomPrice=array(7500,7200,7800,8800,10700,13600,23100,60100);
                $roomId=$row["roomId"];
                $totalPrice=$row["noOfRoom"]*$roomPrice[$roomId-1];
                echo "<tr><td>" . $rooms[$roomId-1] . "</td>";
                echo "<td>" . $row["checkinDate"] . "</td>";
                echo "<td>" . $row["checkoutDate"] . "</td>";
                echo "<td>" . $row["noOfGuest"] . "</td>";
                echo "<td>" . $row["noOfRoom"] . "</td>";
                echo "<td> &#8369 " . $totalPrice . "</td></tr>";
                $countee++;
            }
        }
    }
?>




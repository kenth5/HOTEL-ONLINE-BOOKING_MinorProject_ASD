<?php
    
    require_once("dbconnection.php");

    if(isset($_POST["transNo"])){
        $transNo=$_POST["transNo"];
        //delete from pending reservations
        $query = "select * from pending_booking";
        $result = mysqli_query($con, $query);
        $query=null;
        
        $query = "select * from pending_booking";
        $result = mysqli_query($con,$query);
        
        while($row=mysqli_fetch_array($result)){
            if($transNo===$row['transactionNo']){
                $username=$row['username'];
                $roomtype=$row['roomType'];
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
                $query .= "'".$transNo ."', '" . $username . "', '" . $roomtype . "', '" . $checkinDate . "', '" . $checkoutDate . "', '" . $noOfGuest ."', '". $noOfRooms . "', '" . $ccNumber . "'";
                $query .= ");";
                $result = mysqli_query($con, $query);
                echo $query;
                $query = null;
                break;
            }
        }
    }
?>
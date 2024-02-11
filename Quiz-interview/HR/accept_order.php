<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "food_order"; 

session_start();
// Create a database connection
$con = mysqli_connect($server, $username, $password, $database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["enteredOTP"])) {
        $orderID = 1;
        $check = $_POST["enteredOTP"];
        $sql = "SELECT * FROM `orders` WHERE OrderID = $orderID and OTP = $check";
        $otp = mysqli_query($con, $sql);
        // echo $otp;    
        // $result = mysqli_fetch_array($otp);
         $hi=mysqli_num_rows($otp);
        // echo $result['OTP'];
        echo $hi;
        exit();
    }


    if (isset($_POST["orderID"])) {
        $orderID = $_POST["orderID"];
        $sql = "UPDATE orders SET OrderStatus = 'Accepted' WHERE OrderID = $orderID";
        // $sql2 = "INSERT INTO orderdetails VALUES ('$orderID'"
        if (mysqli_query($con, $sql)) {
            echo "1"; // Success
        } else {
            echo "0"; // Error
        }
        // echo "Order accepted successfully";
        $sql= "SELECT * FROM `orderdeatils` WHERE ordersId = $orderID";
        $query = mysqli_query($con, $sql);
        $x="";
        // echo mysqli_num_rows($/query);
        while($rows = mysqli_fetch_assoc($query)){
            $sql2= "SELECT * FROM `fooditem` WHERE FoodId = " .$rows['FoodId'];
            $foodname = mysqli_query($con, $sql2);
            $hu = mysqli_fetch_assoc($foodname);
            $x = $x."<tr> <td> ".$hu['FoodName']."</td>";
            $x = $x."<td> ".$rows['Amount']."</td>";
            $x = $x."<td> ".$rows['Quantity']."</td>";
            $x=$x."</tr>";
        }

        echo $x;
    } 

    elseif (isset($_POST["reject"])) {
        $orderID = $_POST["orderID"];
        $sql = "UPDATE orders SET OrderStatus = 'Rejected' WHERE OrderID = $orderID";
        if (mysqli_query($con, $sql)) {
            echo "1"; 
        } else {
            echo "0"; 
        }
        echo "Order rejected successfully";
    } else {
        echo "Invalid request";
    }
    exit();
    
} 


?>

<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "food_order"; 

session_start();
// Create a database connection
$con = mysqli_connect($server, $username, $password, $database);

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['action']) && $_POST['action'] == 'insertdata') {
    $ShopName = $_POST["category"];
    $shopkeeperName = $_POST["shopkeeperName"];
    $ShopDescription = $_POST["newItem"];
    $username = $_POST["username"];
    $contactNo = $_POST["contactNo"];
    
    $sql = "INSERT INTO `shops`(`ShopName`, `ShopkeeperName`, `ShopDescription`, `UserName`, `ContactNo`) VALUES ('$ShopName','$shopkeeperName','$ShopDescription','$username',$contactNo)";

    if (mysqli_query($con, $sql)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }

    // Close the database connection
    mysqli_close($con);
    exit();
}

if (isset($_POST['action']) && $_POST['action'] == 'shopInsertCategory') {
    $FoodId = $_POST["FoodId"];
    $FoodName = $_POST["FoodName"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $foodcategoryId = $_POST["foodcategoryId"];
    $shopsId = $_POST["shopsId"];
    $offers = $_POST["offers"];
    $available = $_POST["available"];
    $TimeTaken = $_POST["TimeTaken"];
    
    $sql = "INSERT INTO fooditem (FoodName, price, description, foodcategoryId, shopsId, offers, available, TimeTaken)
    VALUES ('$FoodName', '$price', '$description', '$foodcategoryId', '$shopsId', '$offers', '$available', '$TimeTaken')";
    if (mysqli_query($con, $sql)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }

    // Close the database connection
    mysqli_close($con);
    exit();
}

if (isset($_POST['action']) && $_POST['action'] == 'addCategory') {
    $category = $_POST['category'];
    $shopId = $_POST['shopId'];
    
    $sql = "INSERT INTO `foodcategory` (foodCatergoryName)
    VALUES ('$category')";
    if (mysqli_query($con, $sql)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }

    // Close the database connection
    mysqli_close($con);
    exit();
}


if (isset($_POST['action']) && $_POST['action'] == 'editCategory') {
    $foodId = $_POST["foodId"];
    $FoodName = $_POST["FoodName"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $foodcategoryId = $_POST["foodcategoryId"];
    $shopsId = $_POST["shopsId"];
    $offers = $_POST["offers"];
    $available = $_POST["available"];
    $TimeTaken = $_POST["TimeTaken"];

    $sql = "UPDATE fooditem SET 
        `FoodName` = '$FoodName',
        `price` = '$price',
        `description` = '$description',
        `foodcategoryId` = '$foodcategoryId',
        `shopsId` = '$shopsId',
        `offers` = '$offers',
        `available` = '$available',
        `TimeTaken` = '$TimeTaken'
        WHERE `FoodId` = $foodId";

    if (mysqli_query($con, $sql)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }

    // Close the database connection
    mysqli_close($con);
    exit();
}

if (isset($_POST['action']) && $_POST['action'] == 'editFoodcategory') {
    $editCate = $_POST['category'];
    $FoodId = $_POST['foodId'];

    $sql = "UPDATE foodcategory SET 
        foodCatergoryName = '$editCate'
        WHERE foodId = $FoodId";


        // UPDATE `foodcategory` SET  `foodCatergoryName`='$editcate' , WHERE foodId

    if (mysqli_query($con, $sql)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }

    // Close the database connection
    mysqli_close($con);
    exit();
}


if (isset($_POST['action']) && $_POST['action'] == 'deleteData') {
    $foodId = $_POST["foodId"];
    $sql= "DELETE FROM `foodcategory` WHERE foodId = $foodId    ";
    if (mysqli_query($con, $sql)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }

    // Close the database connection
    mysqli_close($con);
    exit();
}


if (isset($_POST['action']) && $_POST['action'] == 'deleteDatacategory') {
    $foodId = $_POST["FoodId"];
    $sql= "DELETE FROM `fooditem` WHERE FoodId = $foodId";
    if (mysqli_query($con, $sql)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }
    mysqli_close($con);
    exit();
}


if (isset($_POST['action']) && $_POST['action'] == 'Accepted') {
    $orderID = $_POST["orderID"];
    $newStatus = $_POST["status"];

    $sql = "UPDATE orders SET OrderStatus = '$newStatus' WHERE OrderID = $orderID";

    echo "Order status updated successfully to: " . $newStatus;

    exit();
}


if (isset($_POST['action']) && $_POST['action'] == 'click') {
    $fx = $_POST["fx"];
    // echo $fx;
    $sql= "SELECT * FROM `orderdeatils` WHERE ordersId = $fx";
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

    $sql= "SELECT * FROM `orders` WHERE OrderID = $fx";
    $query = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($query);

   $x=$x."<tr><th colspan=3>Customer Notes </th></tr>";
$x=$x."<tr><td colspan=3> ".$rows["CustomersNotes"]."</td></tr>";
if ($rows['OrderStatus'] == 'Pending') {
    $x = $x . "<tr class='action'>
        <td colspan='5' class='action'>
            <button class='accept' onclick='acceptOrder(" . $rows['OrderID'] . ")'>Accept</button>
            <button>Reject</button>
        </td>
    </tr>";
} else {
    $x = $x . "<tr class='action'>
        <td colspan='5' class='action'>
            <select class='select'>
                <option> Baking  </option>
                <option> Baked </option>
                <option> Come </option>
            </select>
            <button onclick='updateStatus(" . $rows['OrderID'] . ")'>Update</button>
        </td>
    </tr>";
}

    if($rows['OrderStatus']=='Pending')
    echo $x;
    

    // Close the database connection
    mysqli_close($con);
    exit();
}
?>


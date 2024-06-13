<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

session_start();

// Insert a new payment record
if (isset($_POST['name']) && isset($_POST['price'])) {
    $amount = $_POST['price'];
    $name = $_POST['name'];
    $payment_status = "Pending";
    $date = date('Y-m-d H:i:s');

    $stmt = $con->prepare("INSERT INTO payment (name, amount, payment_status, added_on) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("siss", $name, $amount, $payment_status, $date);



    if ($stmt->execute()) {
        $_SESSION['order_id'] = $stmt->insert_id;
        echo "Payment record inserted successfully.";
    } else {
        echo "Error inserting payment record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

if (isset($_POST['payment_id']) && isset($_SESSION['order_id'])) {
    $payment_id = $_POST['payment_id'];
    $order_id = $_SESSION['order_id'];

    $stmt = $con->prepare("UPDATE payment SET payment_status = 'complete', payment_id = ? WHERE id = ?");
    $stmt->bind_param("si", $payment_id, $order_id);


    $name = $_SESSION['order_id'];

    $stmt2 = $con->prepare("UPDATE interview_details SET `name` = ? WHERE id = ?");
    $stmt2->bind_param("si", $order_id, $card_id);
    $stmt2->execute();


    // Execute the statement
    if ($stmt->execute()) {
        echo "Payment status updated successfully.";
    } else {
        echo "Error updating payment status: " . $stmt->error;
    }

    if ($stmt2->affected_rows > 0) {
        echo "Interview details updated successfully.";
    } else {
        echo "Failed to update interview details.";
    }

    
    $stmt->close();
    $stmt2->close();
    unset($_SESSION['order_id']);
}

// Close the connection
$con->close();

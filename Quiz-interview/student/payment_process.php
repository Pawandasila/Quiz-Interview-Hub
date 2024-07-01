<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['card_id'])) {
    $amount = $_POST['price'];
    $name = $_POST['name'];
    $card_id = $_POST['card_id'];
    $payment_status = "Pending";
    $date = date('Y-m-d H:i:s');

    $stmt = $con->prepare("INSERT INTO payment (name, amount, payment_status, added_on , cardId) VALUES (?, ?, ?, ? , ?)");
    $stmt->bind_param("sissi", $name, $amount, $payment_status, $date, $card_id);


    if ($stmt->execute()) {
        $_SESSION['order_id'] = $stmt->insert_id;
        echo "Payment record inserted successfully.";
    } else {
        echo "Error inserting payment record: " . $stmt->error;
    }

    $stmt->close();
}


if (isset($_POST['payment_id']) && isset($_SESSION['order_id']) && isset($_POST['card_id'])) {
    $payment_id = $_POST['payment_id'];
    $order_id = $_SESSION['order_id'];
    $card_id = $_POST['card_id'];

    $stmt = $con->prepare("UPDATE payment SET payment_status = 'complete', payment_id = ? WHERE id = ?");
    $stmt->bind_param("si", $payment_id, $order_id);

    if ($stmt->execute()) {
        echo "Payment status updated successfully.";
    } else {
        echo "Error updating payment status: " . $stmt->error;
    }

    $stmt->close();

    $stmt2 = $con->prepare("UPDATE interview_details SET payment_status = 'success' WHERE id = ?");
    $stmt2->bind_param("i", $card_id);

    if ($stmt2->execute()) {
        echo "Interview details updated successfully.";
    } else {
        echo "Failed to update interview details: " . $stmt2->error;
    }

    $stmt2->close();
    unset($_SESSION['order_id']);
}

$con->close();
?>

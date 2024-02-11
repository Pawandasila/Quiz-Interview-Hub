<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    // $username = $_POST['username'];
    $password = $_POST['password'];

    $pass = mysqli_query($con, "SELECT * FROM `student_login` WHERE `email` = '".$_POST['username']."'");
    $pass_veri = mysqli_fetch_assoc($pass);

    $newpass = $pass_veri['password'];

    if(password_verify($password, $newpass)){
        echo "<script>alert('Confirm Password')</script>";
    }else{
        echo "<script>alert('not ')</script>";
    }

}

mysqli_close($con);


?>
<body>
    <form action="#" method="post">
        <label for="username">Username</label>
        <input type="email" name="username">
        <label for="password">password</label>
        <input type="password" name="password">

        <button name ="submit" type="submit">login</button>
    </form>
</body>
</html>
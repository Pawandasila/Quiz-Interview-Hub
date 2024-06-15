<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['image'])) {
    $img = $_POST['image'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);

    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $filename = 'uploads/' . uniqid() . '.png';

    if (file_put_contents($filename, $data)) {
        $sqlFilename = $con->real_escape_string($filename);
        $uploaded_by = rand(1, 10);  // Randomly assign a user ID between 1 and 10

        // SQL query to insert image metadata into 'images' table
        $sql = "INSERT INTO images (filename, uploaded_by) VALUES ('$sqlFilename', '$uploaded_by')";

        // Execute SQL query
        if ($con->query($sql) === TRUE) {
            // Return success JSON response
            echo json_encode(['status' => 'success', 'message' => 'Image uploaded successfully.', 'filename' => $filename]);
        } else {
            // Return error JSON response if SQL insertion fails
            echo json_encode(['status' => 'error', 'message' => 'Error uploading image to database.']);
        }
    } else {
        // Return error JSON response if image file saving fails
        echo json_encode(['status' => 'error', 'message' => 'Error saving image file.']);
    }
} else {
    // Return error JSON response for invalid request
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}

// Close database connection
$con->close();
?>

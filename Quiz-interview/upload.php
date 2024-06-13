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

// echo "Connected successfully";

// Close the connection
$con->close();
?>


<?php
// Check if the image data is received and process it
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['image'])) {
    $img = $_POST['image'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);

    // Ensure 'uploads' directory exists
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    // Generate unique filename for the image
    $filename = 'uploads/' . uniqid() . '.png';

    // Save the image file
    if (file_put_contents($filename, $data)) {
        // Prepare data for SQL insertion
        $sqlFilename = $conn->real_escape_string($filename); // Escape filename to prevent SQL injection

        // Example: Get user ID from session or request (replace with your actual logic)
        $userId = 1; // Replace with actual user ID or fetch dynamically

        // SQL query to insert image metadata into 'images' table
        $sql = "INSERT INTO images (filename, uploaded_by) VALUES ('$sqlFilename', $userId)";

        // Execute SQL query
        if ($conn->query($sql) === TRUE) {
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
$conn->close();
?>

<?php
// Database Connection
$conn = mysqli_connect("localhost", "root", "", "eazy_pg");

// Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get User Input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST["Username"];
    $Message = $_POST["Message"];

    // Insert Data into Database
    $sql = "INSERT INTO feedback (Username, Message) VALUES ('$Username', '$Message')";

    if (mysqli_query($conn, $sql)) {
        echo "Feedback Submitted Successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close Connection
mysqli_close($conn);
?>
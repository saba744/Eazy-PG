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
    $Email = $_POST["Email"];
    $password = $_POST["password"]; // Removed password_hash

    // Insert Data into Database
    $sql = "INSERT INTO signup (Username, Email, password) VALUES ('$Username', '$Email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration Successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close Connection
mysqli_close($conn);
?>

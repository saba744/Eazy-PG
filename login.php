<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email']; // Capital "E" use karo
    $password = $_POST['password']; // No hashing

    // Database connection
    $dbcnx = mysqli_connect("localhost", "root", "", "eazy_pg");

    if (!$dbcnx) {
        die("Unable to connect to the database");
    }

    // Secure Query using Prepared Statements (Prevents SQL Injection)
    $sql = "SELECT * FROM signup WHERE Email = ? AND password = ?";
    $stmt = mysqli_prepare($dbcnx, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $Email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Login Successful'); window.location.href='home.html';</script>";
    } else {
        echo "<script>alert('Incorrect Email or Password'); window.location.href='login.html';</script>";
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($dbcnx);
}
?>

<?php
// Database Connection
$conn = mysqli_connect("localhost", "root", "", "eazy_pg");

// Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch Data
$sql = "SELECT * FROM feedback";
$r = mysqli_query($conn, $sql);

if (mysqli_num_rows($r) > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = mysqli_fetch_assoc($r)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Username']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Message']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No feedback available.";
}

// Close Connection
mysqli_close($conn);
?>

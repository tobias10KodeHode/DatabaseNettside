<?php
$serverName = "localhost";
$userName = "tobias";
$password = "lWKtbY1ce4A8BhiK";
$dbName = "userdb";

// Establish database connection
$connection = mysqli_connect($serverName, $userName, $password, $dbName);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $cred = $_POST["cred"];

    // Prepare SQL statement
    $sql = "INSERT INTO userinfo (fullname, email, cred) VALUES (?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $fullname, $email, $cred);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
        header("Location: admin_panel.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
}

// Close connection
$connection->close();
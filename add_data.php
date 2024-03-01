<?php

$serverName = "mysql-164554-0.cloudclusters.net";
$userName = "admin";
$passWord = "i82lnHyw";
$dbName = "userdb";
$dbServerPort ="19904";

// Establish database connection
$connection = mysqli_connect($serverName, $userName, $passWord, $dbName, $dbServerPort);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $cred = $_POST["credentials"];

    $when_created = date('Y-m-d H:i:s');

    // Prepare SQL statement
    $sql = "INSERT INTO userinfo (fullname, email, password, when_created) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $cred, $when_created);

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

<?php

$serverName = "mysql-164554-0.cloudclusters.net";
$userName = "admin";
$passWord = "i82lnHyw";
$dbName = "userdb";
$port = "19904";

// Create connection
$conn = new mysqli($serverName, $userName, $passWord, $dbName, $port);

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

    
    $sql = "INSERT INTO userinfo (fullname, email, password, when_created) VALUES (?, ?, ?, ?)";

    
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $cred, $when_created);

    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
        header("Location: admin_panel.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    $stmt->close();
}

// Close connection
$connection->close();

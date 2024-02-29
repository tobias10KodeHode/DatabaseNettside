<?php
// Database connection
$servername = "localhost";
$username = "tobias";
$password = "lWKtbY1ce4A8BhiK";
$database = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select data from the table
$sql = "SELECT * FROM userinfo";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display the data (you can format it as needed)
        echo "ID: " . $row["id"]. " - Name: " . $row["fullname"]. " - Email: " . $row["email"]. " - Password: " . $row["cred"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();


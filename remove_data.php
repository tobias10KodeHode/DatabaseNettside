<?php
$serverName = "localhost";
$userName = "tobias";
$password = "lWKtbY1ce4A8BhiK";
$dbName = "userdb";

// Establish database connection
$connection = mysqli_connect($serverName, $userName, $password, $dbName);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a delete request is made
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    // Delete row from the database
    $sql = "DELETE FROM userinfo WHERE id = $delete_id";
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}

// Retrieve data from the database
$sql = "SELECT * FROM userinfo";
$result = $connection->query($sql);

// Display data in an HTML table
if ($result->num_rows > 0) {
    echo "<table><tr><th>fullname</th><th>fullname</th><th>email</th><th>Action</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["fullname"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td><td><a href='?delete_id=".$row["id"]."'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$connection->close();

<?php
// Database connection
$serverName = "mysql-164554-0.cloudclusters.net";
$userName = "admin";
$passWord = "i82lnHyw";
$dbName = "userdb";
$port = "19904";

// Create connection
$conn = new mysqli($serverName, $userName, $passWord, $dbName, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['delete_button'])) {
    
    $id_to_delete = $_POST['data_id'];

    
    $delete_sql = "DELETE FROM userinfo WHERE id = $id_to_delete";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Row deleted successfully.";
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}


$sql = "SELECT * FROM userinfo";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        // Display the data
        $text = "ID: " . $row["id"]. " - Name: " . $row["fullname"]. " - Email: " . $row["email"]. " - Password: " . $row["password"]. " ";
        echo "<p>$text</p>";
        // Add a delete button for each row
        echo "<form method='post' action=''>"; // Form for each row
        echo "<input type='hidden' name='data_id' value='" . $row["id"] . "'>"; // Hidden input field to store the ID of the row
        echo "<button type='submit' name='delete_button'>Delete</button>"; // Delete button
        echo "</form>"; // End of form
        echo "<br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();

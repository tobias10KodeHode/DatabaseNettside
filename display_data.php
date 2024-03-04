<?php
// Database connection
$serverName = "nefstadutvikling.no.mysql:3306";
$userName = "nefstadutvikling_nonefstadutvikling_userdb";
$passWord = "i82lnHyw";
$dbName = "nefstadutvikling_nonefstadutvikling_userdb";

// Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the delete button is clicked
if(isset($_POST['delete_button'])) {
    // Get the id of the row to be deleted
    $id_to_delete = $_POST['data_id'];

    // Query to delete the row
    $delete_sql = "DELETE FROM userinfo WHERE id = $id_to_delete";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Row deleted successfully.";
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}

// Query to select data from the table
$sql = "SELECT * FROM userinfo";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display the data
        echo "ID: " . $row["id"]. " - Name: " . $row["fullname"]. " - Email: " . $row["email"]. " - Password: " . $row["password"]. " ";
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

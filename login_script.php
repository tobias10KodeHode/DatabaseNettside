<?php


// Database connection parameters
$serverName = "nefstadutvikling.no.mysql:3306";
$userName = "nefstadutvikling_nonefstadutvikling_userdb";
$passWord = "i82lnHyw";
$dbName = "userdb";

// Establishing connection
$connection = mysqli_connect($serverName, $userName, $passWord, $dbName);
echo 'Connection Established!';

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}



// Retrieving username and password from form submission
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

// Query to validate user credentials
$query = "SELECT * FROM logininfo WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $query);

// Check if query returned any rows
if (mysqli_num_rows($result) == 1) {
    // Authentication successful
    echo "Login successful";
    header('Location: admin_panel.php', true, 301);
    // You may set session variables or redirect the user to the dashboard
} else {
    // Authentication failed
    echo "Invalid username or password";
}
// Close database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {background-color: red;}
        h1 {color: black;}
    </style>
</head>
<body">
    <h1> NOT GRANTED </h1>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <h1> DU ER LOGGET INN </h1>
    <div class="add_data">
        <h2>Sett inn data</h2>
        <form action="add_data.php" method="post">
            Full Name: <input type="text" name="fullname"><br>
            Email: <input type="email" name="email"><br>
            Password: <input type="password" name="cred"><br> <!-- Change this to match your database column name -->
            <input type="submit" value="Submit">
        </form>
    </div>
    <br>
    <div class="remove_data">
        <h1> User Info </h1>
        <?php
        // Include the database connection and query code
        include 'remove_data.php';

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Display the data (you can format it as needed)
                echo "ID: " . $row["id"] . " - Name: " . $row["fullname"] . " - Email: " . $row["email"] . " - Password: " . $row["cred"] . "<br>";
            }
        } else {
            echo "0 results";
        }


        ?>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_panel.css">
    <title>Admin Panel</title>
</head>

<body>
    <h1> DU ER LOGGET INN </h1>
    <h2>Sett inn data</h2>
    <div class="add_data">
        <form action="add_data.php" method="post">
            <div class="input">
                <label for="fullname">Full Name: </label>
                <input type="text" name="fullname">
            </div>
            <div class="input">
                <label for="email">Email: </label>
                <input type="email" name="email">
            </div>
            <div class="input">
                <label for="password">Password: </label>
                <input type="password" name="credentials">
            </div>
            <input id="submit" type="submit" value="Submit">
        </form>
    </div>
    <br>
    <h1> User Info </h1>
    <div class="display_data">
        <?php
        
        include 'display_data.php';

        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                // Display the data 
                echo $text;
            }
        } else {
            echo "0 results";
        }


        ?>
    </div>
</body>

</html>
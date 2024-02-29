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
</body>

</html>
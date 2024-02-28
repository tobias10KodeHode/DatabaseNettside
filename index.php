<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <!-- <script src="script.js"></script> -->
    <title>Admin Panel</title>
</head>

<body>
    <div class="login-container">
        <form id="login-form" method="post" action="login.php"> <!-- Add method and action attributes -->
            <h2>Login</h2>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <!-- Add name attribute -->
            <input type="password" id="password" name="password" placeholder="Password" required>
            <!-- Add name attribute -->
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
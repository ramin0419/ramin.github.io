<?php
session_start();

// Check if the user is already logged in; if so, redirect to the client portal
if (isset($_SESSION['user_id'])) {
    header("Location: client_portal.php");
    exit;
}

// Handle the login form submission (validate username and password)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform authentication (e.g., check credentials against a database)
    if ($username === "demo" && $password === "password") {
        $_SESSION['user_id'] = 1; // Store user ID in the session
        header("Location: client_portal.php");
        exit;
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>

    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
</body>

</html>
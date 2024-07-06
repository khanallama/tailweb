<?php
session_start();
include '../Helper/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if (registerUser($username, $hashed_password)) {
            header("Location: login.php");
        } else {
            $error = "Registration failed. Username might already be taken.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/login_styles.css">
</head>
<body>
<div class="container">
    <h1>tailwebs.</h1>
    <form method="post" action="signup.php">
        <h2>Sign Up</h2>
        <?php if (isset($error)) {
            echo "<p>$error</p>";
        } ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <button type="submit">Sign Up</button>
    </form>
</div>
</body>
</html>

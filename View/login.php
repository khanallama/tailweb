<?php
session_start();
include '../Helper/functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authenticate($username, $password);
    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: home.php");
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/login_styles.css">
    <script src="../assets/js/scripts.js"></script>

</head>
<body>
<div class="container">
    <h1>tailwebs.</h1>
    <form method="post" action="login.php">
        <?php if (isset($error)) {
            echo "<p>$error</p>";
        } ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <span onclick="passwordShowHide()" class="password-toggle">&#128065;</span>
        </div>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
</div>
</body>
</html>

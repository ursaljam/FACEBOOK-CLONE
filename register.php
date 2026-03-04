<?php
include_once 'config.php';
include_once 'controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $authController = new AuthController();
    $message = $authController->registerUser($_POST['username'], $_POST['email'], $_POST['password']);
    echo $message;
}
?>

<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

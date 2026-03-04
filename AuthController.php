<?php
include_once '../config.php';
include_once '../models/User.php';

class AuthController {

    public function registerUser($username, $email, $password) {
        $user = new User($GLOBALS['conn']);
        $user->username = $username;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        if ($user->register()) {
            return "Registration successful!";
        } else {
            return "Error in registration.";
        }
    }

    public function loginUser($email, $password) {
        $user = new User($GLOBALS['conn']);
        $user->email = $email;
        $user->password = $password;
        if ($user->login()) {
            return "Login successful!";
        } else {
            return "Invalid email or password.";
        }
    }
}
?>

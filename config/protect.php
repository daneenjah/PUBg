<?php
//your password
$password = 'yourpassword';

if (empty($_COOKIE['password']) || $_COOKIE['password'] !== $password) {
    //password not set or incorrect. Send to login.php.
    header('Location: login.php');
    exit;
}
?>

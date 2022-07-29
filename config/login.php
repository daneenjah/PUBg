<?php
//your password
$password = 'yourpassword';

//redirects here after login
$redirect_after_login = 'settings.php';

//will not ask password again for
$remember_password = strtotime('+30 days');//30 days

if (isset($_POST['password']) && $_POST['password'] == $password) {
    setcookie("password", $password, $remember_password);
    header('Location: ' . $redirect_after_login);
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Password protected</title>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
</head>
<body>
    <div style="text-align:center;margin-top:50px;">
        You must enter the password to view this content.
        <br>
        <form method="POST">
            <input type="hidden" name="password">
        </form>
    </div>
</body>
</html>

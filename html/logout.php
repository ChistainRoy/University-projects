<?php
// logout.php
session_start(); // Start the session
// Perform logout tasks, such as unsetting session variables or destroying the session
session_unset();
session_destroy();
// Redirect to the login page or any other desired page
header("Location: auth-login-basic.php");
exit;

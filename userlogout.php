<?php
include("connection.php");
session_start();
unset($_SESSION['customer_id']);
header('Location: index.php');

$myfile = fopen("userlog.txt", "a") or die("Unable to open file!");
$txt = "user logout".PHP_EOL;
fwrite($myfile, $txt);


?>

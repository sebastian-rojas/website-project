<?php
include("connection.php");
session_start();
unset($_SESSION['username']);

$myfile = fopen("adminlog.txt", "a") or die("Unable to open file!");
$txt = " admin logout".PHP_EOL;
fwrite($myfile, $txt);
header('Location: index.php');




?>

<?php
include('connection.php');
$name=$_POST["name"];
$address=$_POST["address"];
$number=$_POST["phone"];
$email=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["password"];

  $sql = "INSERT INTO customer 
  (customer_id,name,address,phone_number,email,username,password) 
  VALUES(0,'$name','$address','$number','$email','$username','$password')";  
if (mysqli_query($conn,$sql))
{

$myfile = fopen("userlog.txt", "a") or die("Unable to open file!");
$txt = " user signup account".PHP_EOL;
fwrite($myfile, $txt);
	header("Location: index.php");
}
else{
echo "Again fill your information";
}  
?>
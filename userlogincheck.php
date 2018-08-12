<?php
	$username=$_POST['username'];
	$password=$_POST['password'];
	// Include database connection settings
	include('connection.php');
	// Retrieve username and password from database according to user's input
	$login = mysqli_query($conn,"SELECT * FROM customer WHERE username = '$username' and password = '$password'");
	// Check username and password match
	if (mysqli_num_rows($login) == 1){
		$row=mysqli_fetch_assoc($login);
	// Set username session variable
		session_start();
	$_SESSION['customer_id']=$row['customer_id'];

$myfile = fopen("userlog.txt", "a") or die("Unable to open file!");
$txt = " user login".PHP_EOL;
fwrite($myfile, $txt);

	// Jump to secured page
	header("Location: book_event.php");
	
}
	else{
	echo "<br><font color='red'>Note: Wrong Username and Password</font><br>";
	}
?>
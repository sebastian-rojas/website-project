<?php		
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	// Include database connection settings
	include('connection.php');
	// Retrieve username and password from database according to user's input
	$login = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username' and password = '$password'");
	// Check username and password match
	if (mysqli_num_rows($login) == 1){
	// Set username session variable
	$_SESSION['username']=$_POST['username'];
	// Jump to secured page

$myfile = fopen("adminlog.txt", "a") or die("Unable to open file!");
$txt = " admin loged in".PHP_EOL;
fwrite($myfile, $txt);
	header("Location: allevents.php");
}
	else{
	echo "<br><font color='red'>Note: Wrong Username and Password</font><br>";
	}

?>




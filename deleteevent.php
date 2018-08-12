<?php
session_start();
if (!isset($_SESSION['username'])) {
header('Location: index.php');
}
else{
$myfile = fopen("adminlog.txt", "a") or die("Unable to open file!");
$txt = " admin delete event".PHP_EOL;
fwrite($myfile, $txt);
}
?>
<?php
include('connection.php');
$event_id=$_POST['event_id'];

$sql="UPDATE events
SET status='deleted' 
WHERE event_id='$event_id'";
$result=mysqli_query($conn,$sql);

if($result){

	header("Location: allevents.php");
}
else
{
echo "not deleted data";

}
?>
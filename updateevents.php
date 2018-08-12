<?php
session_start();
if (!isset($_SESSION['username'])) {
header('Location: index.php');
}
else{
$myfile = fopen("adminlog.txt", "a") or die("Unable to open file!");
$txt = " admin update event".PHP_EOL;
fwrite($myfile, $txt);
}
?>
<?php
include('connection.php');
$event_id=$_POST['event_id'];
$status=$_POST['status'];
$bill=$_POST['bill'];

$sql="UPDATE events
SET status='$status' 
WHERE event_id='$event_id'";
$result=mysqli_query($conn,$sql);

$sql="insert into invoice(order_id,event_id,bill) values(0,'$event_id','$bill')";
$result=mysqli_query($conn,$sql);

if($result){

	header("Location: allevents.php");
}
else
{
echo "not added data";

}
?>
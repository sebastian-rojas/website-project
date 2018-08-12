<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
header('Location: index.php');
}
else{

$myfile = fopen("userlog.txt", "a") or die("Unable to open file!");
$txt = " user insert event data ".PHP_EOL;
fwrite($myfile, $txt);
}
?>
<?php
include('connection.php');

$customer_id=$_SESSION['customer_id'];
$type=$_POST["type"];
$event_date=$_POST["event_date"];

$number_of_participents=$_POST["number_of_participents"];
$data=" ";
if(isset($_POST['item1'])){
$data.=$_POST['item1'];
$data.= ", ";

}
if(isset($_POST['item2'])){
$data.=$_POST['item2'];
$data.= ", ";


}
if(isset($_POST['item3'])){
$data.=$_POST['item3'];
$data.= ", ";


}
if(isset($_POST['item4'])){
$data.=$_POST['item4'];
$data.= " ";


}

$description=$_POST['description'];


	
$things_for_events=$data;
	
  $sql = "INSERT INTO events
  (event_id,customer_id,event_type,event_date,number_of_participents,request_date,things_for_events,description) 
  VALUES(0,'$customer_id','$type','$event_date','$number_of_participents',now(),'$things_for_events','$description')";

                   
if (mysqli_query($conn,$sql))
{
	header("Location: usercheckpendingevents.php");
}
else
echo "Again fill your information";


  
?>
<?php
session_start();
if(!isset($_COOKIE['user'])){  
    header("location: ../../home.html");
  }

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){
		$uname = $_SESSION['uname']; 
$sql="update staff SET `status`= 'Completed' where id = '".$_REQUEST["id"]."'";

	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    $c=mysqli_affected_rows($conn);


    echo "<br/>";    
    echo "Removed";
header("Location:managerhomepage.html");
}
?>


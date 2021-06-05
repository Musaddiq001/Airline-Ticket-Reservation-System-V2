<?php

session_start();
if(!isset($_COOKIE['user'])){  
  header("location: ../../home.html");
}

$txt = date("Y-m-d");
echo $txt;
if($_SERVER['REQUEST_METHOD'] == "POST"){

if(strlen($_REQUEST["name"])==0){
	echo "Name mandatory!";
}
else{

	$sql="insert into staff(`name`, `location`, `startdate`, `status`) values('".$_REQUEST["name"]."','".$_REQUEST["location"]."','$txt','Training')";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$c=mysqli_affected_rows($conn);
	echo "<br/>";
echo "New staff added for training!";
header("Location:managerhomepage.html");
}
}

?>

<form action="addstaff.php" name="fm" method="post">
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add staff for training</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>

    <body>

        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Welcome to</h1>
            <h2>Airline Ticket Reservation System </h2>
            <h4>Add staff for training</h4><br><br>
            <ul class="nav justify-content-center">

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="managerhomepage.html">Back</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addmanager.php">Add New Airport Manager</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="managers.php">Airport Managers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="agents.php">Airport Agents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customers.php">Customers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="flights.php">Available Flights</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sold.php">Sold tickets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addflight.php">Add New Flight</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="editflightinfo.php">Edit Flight Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
<form>

<table>
  
<tr>
  <td>Name: </td>
  <td><input type="text" name="name"></td>
</tr> 
<tr> 
  <td>Location:</td>
  <td><input type="text" name="location"></td>
</tr> 
<tr> 
  <td> <input type="submit" name="sbt" value="submit" /> </td>


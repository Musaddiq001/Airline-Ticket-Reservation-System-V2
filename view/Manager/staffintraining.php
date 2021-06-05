<?php
session_start();
if(!isset($_COOKIE['user'])){  
  header("location: ../../home.html");
}

$cred=array();

$sql="SELECT * FROM `staff` WHERE 1";
	$conn = mysqli_connect("localhost", "root", "","cred");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$c=mysqli_affected_rows($conn);
$flag=0;
$result = $conn->query($sql);

if(isset($_SESSION["valid"]) && $_SESSION["valid"]=="yes"){

		$data=array();
		
		
		$conn = mysqli_connect("localhost", "root", "","cred");
		$sql="select * from staff where status = 'Training'";

		$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
		while($row = mysqli_fetch_assoc($result)) {

            $temp["id"]=$row["id"];
            $temp["name"]=$row["name"];           
			$temp["location"]=$row["location"];
			$temp["startdate"]=$row["startdate"];
            $temp["status"]=$row["status"];
     		$data[]=$temp;
			
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff in training</title>
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
            <h4>Managers</h4><br><br>
            <ul class="nav justify-content-center">

                  <div class="sticky-top"><nav class="navbar navbar-expand-sm bg-dark navbar-dark">

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
                                <a class="nav-link" href="addagent.php">Add New Airport Agent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="addmanager.php">Add New Airport Manager</a>
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
<style>
table, th, td {
  border: 3px solid black;
}
table.center {
  margin-left: auto;
  margin-right: auto;
}
</style>


    <form action="remove.php" method="post">
<table id="myTable" class="Center" width="60%">

        <tr >
          <th>ID</th>
          <th>Name</th>
          <th>Location</th>
          <th>Start Date</th>
		  <th>Status</th>


        </tr>

        <?php
          foreach($data as $v){?>
              <tr>
              <td align="center"><?php echo $v["id"];?></a</span></td>
              <td align="center"><?php echo $v["name"];?></span></td>
              <td align="center"><?php echo $v["location"];?></span></td>
			  <td align="center"><?php echo $v["startdate"];?></span></td>
			  <td align="center"><?php echo $v["status"];?></span></td>
			  <td align="center"><td align="center"><input type="Text" id="id" name="id"></span></td>
			  <td colspan="2">
                    <input type="submit" name="order" value="Remove"></td>
              </tr>
        <?php
            }
        
        ?>
      </table>
      </div>
      <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

            </div>
            <div class="jumbotron text-center" style="margin-bottom:0">
  Quick Search : 

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by ID" title="Type ID"><br>
	  
</div>
        </div>

</body>

</html>
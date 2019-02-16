<?php
$con=mysqli_connect("localhost","root","","inno");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM rawdata");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body{
  background-image: url("back.jpg");
  background-repeat: no-repeat;
    background-size: cover;
		}
    #Tabul{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 80%;
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: rgb(0, 0, 0);
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
}

#First {
	border: 1px solid #f2f2f2;
    padding: 8px;
}
#Tabul td, #Tabul th {
	border: 1px solid #f2f2f2;
    padding: 8px;
}

#Tabul tr:hover {background-color: #ddd;}

#Tabul th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #3552A7;
    color: white;
}
	</style>
</head>
<body style="overflow-x: hidden;">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><IMG SRC="logo.jpg" ALT="elephant" WIDTH=60 HEIGHT=40></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="detect.php">Recent</a></li>
        <!--<li><a href="history.php">History</a></li>
        <li><a href="data.php">SampleData</a></li>
        <li><a href="chanel.php">Channel</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="loginuser.php"><button class="btn btn-danger ">Logout</button></a>
      </ul>
    </div>
  </div>
</nav>
  

		
	<div class="container jumbotron" style="margin-top: 10%;">
		<h1 class="text-center">Dataset of The Stations with The City</h1>
		<div class="container" style="margin-left: 10% ">
			<br><br>
			<table  id="Tabul" border='1' >
				<tr id="First">
				<th>Id</th>
				<th>Station Name</th>
				<th>City Name</th>
				<th>Location</th>
				</tr>
				<?php 
					while($row = mysqli_fetch_array($result))
					{
				?>
				<tr>
					<th> <?php echo $row['id']; ?> </th>
					<th> <?php echo $row['stationname']; ?> </th>
					<th> <?php echo $row['cityname']; ?> </th>
					<th> <?php echo $row['location']; ?> </th>
				</tr>
			<?php  } mysqli_close($con);?>
			</table>
			</div>
		
	</div>
</body>
</html>
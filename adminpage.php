<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: index.php");
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Table with database</title>

<style>
 body{

background: #11998e;  
background: -webkit-linear-gradient(to right, #38ef7d, #11998e);  
background: linear-gradient(to right, #38ef7d, #11998e); 
   width:100%;
   height:100%;
   font-family:'Arial', Times, serif;
   
}
table {
border-collapse: collapse;
width: 98%;
color: rgb(105, 128, 0);
font-family: monospace;
font-size: 13px;
text-align: left;
  justify-content: center;
  margin-left: 7px;
  text-align: center;
  
}
th {
background-color: rgb(0, 0, 0);
color: white;
}
table, th, td {
            border: 1px solid black;
        }   


tr:nth-child(even) {background-color: #f2f2f2}
tr:nth-child(odd) {background-color: #f2f2f2}

h1{

  font-size:xx-large;
  margin-bottom: 60px;
}
a{

  text-decoration: none;
  color: black;
}
.button{
            width:80px;
            height:30px;
            border-radius: 5px;
            background: #ffeb3b;;

}
.button:hover{

  background: #ffc107;
  cursor:pointer;
}


.accept2{
            width:80px;
            height:30px;
            border-radius: 5px;
            background: #ff483b;

}
.accept2:hover{

  background: #ff0707;
  cursor:pointer;
}
#backbtn{
         
         position: relative;
         top:30px;

       }
       #logg{
position:relative;
right:15px;
text-decoration:none;
    }

h2{
    margin-bottom:75px;
}
#logo{
  width:90px;
  height:50px;
}

nav{
  opacity:0.9;
}

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img id="logo" src="Jindal_logo.png">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://en.wikipedia.org/wiki/Jindal_Tamnar_Thermal_Power_Plant">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact_us.php">Contact Us</a>
      </li>
      

      
     
    </ul>

 

  </div>
  <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
</nav>

  <h1><center> Query Database</center></h1>
  
<table>
<tr>
<th>Email</th>
<th>Username</th>
<th>job_desc</th>
<th>job_qty</th>
<th>req_date</th>
<th>Job_value</th>
<th>Paid/free</th>
<th>vender_name</th>
<th>cost</th>
<th>date</th>
<th>Operation</th>
<th>Operation2</th>

</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "login");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, email, user, job_description, job_qty, req_date, value_of_job, charge_or_free, vender_name, cost_center, date FROM database1 ORDER BY `id` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {  

echo "<tr><td>" . $row["email"]. "</td><td>" . $row["user"] . "</td><td>" . $row["job_description"] . "</td><td>" . $row["job_qty"] . "</td><td>" . $row["req_date"] . "</td><td>" . $row["value_of_job"] . "</td><td>" . $row["charge_or_free"] . "</td><td>" . $row["vender_name"] . "</td><td>" . $row["cost_center"] . "</td><td>" . $row["date"]. "</td><td>" . "<button class='button'><a href ='reject.php?rn=$row[id]'>Reject</a></button>" . "</td><td>". "<button class='accept2'><a href ='accept_data.php?rm=$row[id]'>Accept</a></button>" . "</td></tr>";

}


} else { echo "0 results"; }
$conn->close();
?>
</table>

  <a href="welcome.php">
  <center>  <button type="button" id="backbtn" class="btn btn-warning">Back</button></center>

  </a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php


$flag=0;


$id = $_GET['rm'];


$conn = mysqli_connect("localhost", "root", "", "login");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, email, user, job_description, job_qty, req_date, value_of_job, charge_or_free, vender_name, cost_center, date FROM database1 WHERE ID='$id' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {  

$emailTO = $row["email"];
$subject="Accepted your query request";
$body="It is to inform you that your query of ". $row["job_description"]. " raised on ". $row["date"] ." has been successfully accepted of "." Job Quantity: ". $row["job_qty"] .", Estimated Date: ". $row["req_date"] .", Vender's Name: ". $row["vender_name"] .", Cost: ". $row["cost_center"];
$headers="From: pp8280@gmail.com";

if(mail($emailTO,$subject,$body,$headers)){

    echo "Acceptence message is sent to the sender Mail";

}

else{
    echo "The message could not be sent";
}

}


} else { echo "0 results"; }
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  
  <style type="text/css">
    body{

   background-image: url("chim.jpg");   
  background-repeat: no-repeat;
  background-attachment: fixed;
         width:100%;
         height:100%;
         opacity:0.8;
         color:white;
         
    }
    .container{

        position:relative;
        top:70px;
    }
    #lol1{
        position:relative;
        top:60px;  
    }
    #select1{

        width:110px;
        height:40px;
    }
    h2{

      justify-content: center;
      justify-items: centers;
    }

#submit{

  position:relative;
  left:150px;
  top:40px;
}

h4 {
            
            font-family: serif;
            color: #008000;
            text-align: center;
            animation: animate 
                1.5s linear infinite;
        }
  
        @keyframes animate {
            0% {
                opacity: 0;
            }
  
            50% {
                opacity: 0.7;
            }
  
            100% {
                opacity: 0;
            }
        }

       #backbtn{
         position:relative;
         top:40px;
         left:170px;

       }
    
    

  </style>
  </head>
  <body>
      

      
      <div class="container">
      
    <h1>JOB COMPLETION DETAILS</h1>
   <h4>
    <?php
  
  if($flag==1){

          echo "Request has been succesfully sent and Kindly wait for reply!!";
        }

    ?>
    </h4>
      
      <div id="error"></div>
      
      <form id="lol1" action="mainpage.php" method="post">
      


      <div class="col-md-6">
  <fieldset class="form-group">
    <label for="text">Name Of Machine</label>
    <input type="text" class="form-control" id="name_of_machine" name="name_of_machine" placeholder="Enter Name Of Machine">
    
  </fieldset>
      </div>




  <div class="col-md-6">
  <fieldset class="form-group">
    <label for="text">Cost of Material consumed</label>
    <input type="number" class="form-control" id="material_cost" name="material_cost" placeholder="Enter Cost of Material Consumed">
    
  </fieldset>
</div>



<div class="col-md-6">
  <fieldset class="form-group">
    <label for="text">Total Cost in job preparation</label>
    <input type="number" class="form-control" id="total_cost" name="total_cost" placeholder="Enter Total Cost in job preparation">
    
  </fieldset>
</div>

<div class="col-md-6">
  <fieldset class="form-group">
    <label for="text">Net Profit</label>
    <input type="number" class="form-control" id="net_profit" name="net_profit" placeholder="Enter Net-Profit('Job Value - Total Cost')">
    
  </fieldset>
</div>

<div class="col-md-4">
  <fieldset class="form-group">
    <label for="text">Running Hour For Machine</label>
    <input type="time" class="form-control" id="running_hour" name="running_hour" placeholder="Enter Running Hour For Machine">
    
  </fieldset>
      </div>

  <div class="col-md-6">
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
  <a href="welcome.php">
  <button type="button" id ="backbtn" class="btn btn-warning">Back</button>
  </a>
  </div>
</form>
          
        </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
          
          
    <script type="text/javascript">
          
          $("form").submit(function(e) {
              
              var error = "";
              
              if ($("#email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#subject").val() == "") {
                  
                  error += "The subject field is required.<br>"
                  
              }
              
              if ($("#content").val() == "") {
                  
                  error += "The content field is required.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })
          
    </script>
          
  </body>
</html>
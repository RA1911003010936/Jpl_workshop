<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: index.php");
}

$flag=0;
if(isset($_POST["email"]))
{
    $server = "localhost";
    $username = "root";
    $password= "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){

      echo "Cannot coonect to db";
    }
   
    $email= $_POST['email'];
    $user= $_POST['user'];
    $job_description= $_POST['job_description'];
    $job_qty= $_POST['job_qty'];
    $req_date= $_POST['req_date'];
    $value_of_job= $_POST['value_of_job'];
    $charge_or_free= $_POST['charge_or_free'];
    $vender_name= $_POST['vender_name'];
    $cost_center= $_POST['cost_center'];
    
    $sql ="INSERT INTO `login`.`database1` (`email`, `user`, `job_description`, `job_qty`, `req_date`, `value_of_job`, `charge_or_free`, `vender_name`, `cost_center`, `date`) VALUES ('$email', '$user', '$job_description', '$job_qty', '$req_date', '$value_of_job', '$charge_or_free', '$vender_name', '$cost_center',current_timestamp());";
    
    
 

    if($con -> query($sql) == true)
    {
      $flag=1;
    }

    else
    {
      echo "Error:". $sql.$con ->error;
    }


    
$emailTO = 'pp7509050612@gmail.com';
$subject="query request";
$body="Request for Item";
$headers="From: pp8280@gmail.com";

if(mail($emailTO,$subject,$body,$headers)){

    echo "Acceptence message is sent to the sender Mail";

}

else{
    echo "The message could not be sent";
}

    $con->close();
   
  }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <!meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!meta http-equiv="x-ua-compatible" content="ie=edge">

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
        top:20px;  
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
  
</nav>


      
      <div class="container">
      
    <h1>Raise a query</h1>
   <h4>
    <?php
  
  if($flag==1){

          echo "Request has been succesfully sent and Kindly wait for reply!!";
        }

    ?>
    </h4>
      
      <div id="error"></div>
      
      <form id="lol1" action="mainpage.php" method="post">
      <div class="col-md-4">
  <fieldset class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    <small class="text-muted">We'll never share your email with anyone else.</small>
  </fieldset>
      </div>


      <div class="col-md-4">
  <fieldset class="form-group">
    <label for="text">Username</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Enter Username">
    
  </fieldset>
      </div>



      <div class="col-md-4">
  <fieldset class="form-group">
    <label for="text">job_qty</label>
    <input type="number" class="form-control" id="job_qty" name="job_qty" placeholder="Enter job_qty">
    
  </fieldset>
      </div>


  <div class="col-md-12">
  <fieldset class="form-group">
    <label for="text">job_description</label>
    <input type="text" class="form-control" id="job_description" name="job_description" placeholder="Enter job_description">
    
  </fieldset>
</div>



  <div class="col-md-3">
  <fieldset class="form-group">
    <label for="text">value_of_job</label>
    <input type="text" class="form-control" id="value_of_job" name="value_of_job" placeholder="Enter value_of_job">
    
  </fieldset>
  </div>

  <div class="col-md-3">
  <fieldset class="form-group">
    <label for="text">charge_or_free</label>
    <input type="text" class="form-control" id="charge_or_free" name="charge_or_free" placeholder="Enter charge_or_free">
    
  </fieldset>
  </div>

  <div class="col-md-3">
  <fieldset class="form-group">
  <label for="text">vender_name</label>
    <input type="text" class="form-control" id="vender_name" name="vender_name" placeholder="Enter vender_name">
  </fieldset>
  </div>
  


  <div class="col-md-3">
  <fieldset class="form-group">
    <label for="text">cost_center</label>
      <input type="number" class="form-control" id="cost_center" name="cost_center" placeholder="Enter cost_center">
    </fieldset>
  </div>

  <div class="col-md-4">
  <fieldset class="form-group">
    <label for="text">Required Date</label>
    <input type="date" class="form-control" id="date" name="req_date" placeholder="Enter date ">
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
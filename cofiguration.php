<?php

session_start();


require_once 'vendor/autoload.php';


$google_client = new Google_Client();


$google_client->setClientId('882596888932-59apra63c86sioabp3hc1c7lbh5o90tn.apps.googleusercontent.com');

$google_client->setClientSecret('RPaRPBhN3TMXuAAAk0kdzTJ_');

$google_client->setRedirectUri('http://localhost/login_jpl/googleapi.php');

$google_client->addScope('email');

$google_client->addScope('profile');

?> 
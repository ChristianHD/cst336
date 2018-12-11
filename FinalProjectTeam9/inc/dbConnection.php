<?php

function getDatabaseConnection($dbname = "heroku_d14d6fd39ec2215"){
    //C9 db info
    
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $username = 'bf29d6bb70a081';
    $password = '182044f8';
    
    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;

}

?>
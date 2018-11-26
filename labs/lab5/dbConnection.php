<?php

    function getDatabaseConnection ($dbname = 'heroku_d14d6fd39ec2215'){
    //function getDatabaseConnection ($dbname = 'ottermart'){
    
    // $host = 'localhost';
    // $username = 'root';
    // $password = '';
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $host = 'us-cdbr-iron-east-01.cleardb.net';
        $username = 'bf29d6bb70a081';
        $password = '182044f8';
    } 

    
    // Creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    
    // Display error when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
}

?>

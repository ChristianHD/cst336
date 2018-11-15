<?php

function getDatabaseConnection ($dbname = 'ottermart'){
    
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("bf29d6bb70a081:182044f8@us-cdbr-iron-east-01.cleardb.net/heroku_d14d6fd39ec2215?reconnect=true"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

    
    // Creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username,$password);
    
    // Display error when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
}

?>

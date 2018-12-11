<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$score = $_GET['score'];
echo $score;

//Adding new score to database

//Retrieving total times quiz has been submitted and average score for this user

//Encoding data using JSON

?>
<?php

// Replace with your actual MySQL database credentials
$hostname = '%';
$username = 'ja';
$password = 'password';
$database = 'main';


$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$id = $_GET['id'];

 // Select all records from the "game" table
 $selectQuery = "SELECT * FROM game WHERE id='".$id."'";
 $result = $mysqli->query($selectQuery);

 // Check if any records were found
 if ($result->num_rows == 1) {

     $row = $result->fetch_assoc();


     echo $row;
 } else {
     echo "Can't find the game!";
 }

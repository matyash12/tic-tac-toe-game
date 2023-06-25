<?php

require 'mysqlconnection.php';

$id = $_GET['id'];

 // Select all records from the "game" table
 $selectQuery = "SELECT * FROM game WHERE id='".$id."'";
 $result = $mysqli->query($selectQuery);

 // Check if any records were found
 if ($result->num_rows == 1) {

     $row = $result->fetch_assoc();


     echo json_encode(array(
        'status' => 200,
        'description' => '',
        'data' => $row
        ));
 } else {
     echo json_encode(array(
        'status' => 400,
        'description' => 'Cant find the game',
        'data' => ''
        ));
 }

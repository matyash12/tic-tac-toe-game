<?php
require 'mysqlconnection.php';
require 'writejson.php';


//player always play 1 computer is 2
$whattochange = $_GET['field']; //one two three
$id = $_GET['id'];



//check if the move is legal

// Select all records from the "game" table
$selectQuery = "SELECT * FROM game WHERE id='" . $id . "'";
$result = $mysqli->query($selectQuery);

// Check if any records were found
if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();
    if ($row[$whattochange] != 0){
        WriteJson(400, 'Illegal move', null);
        exit();
    }

} else {
    WriteJson(400, 'Cant find the game', null);
    exit();
}






$sql = "UPDATE game SET ".$whattochange." = 1 WHERE id = ".$id;


if ($mysqli->query($sql) === TRUE) {
    WriteJson(200,'',null);
} else {
    WriteJson(400,'Failed to make a move',null);
}

require "computermove.php";


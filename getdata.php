<?php

require 'mysqlconnection.php';
require 'writejson.php';

$id = $_GET['id'];

// Select all records from the "game" table
$selectQuery = "SELECT * FROM game WHERE id='" . $id . "'";
$result = $mysqli->query($selectQuery);

// Check if any records were found
if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();
    WriteJson(200, '', $row);

} else {
    WriteJson(400, 'Cant find the game', null);
}
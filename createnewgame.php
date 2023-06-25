<?php
require 'mysqlconnection.php';


// Insert a new record into the "game" table
$insertQuery = "INSERT INTO game (one, two, three, four, five, six, seven, eight, nine)
               VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0)";
if ($mysqli->query($insertQuery) === TRUE) {
    $id  = $mysqli->insert_id;
    echo json_encode(array(
        'status' => 200,
        'description' => '',
        'gameid' => $id
        ));
} else {
    echo json_encode(array(
        'status' => 400,
        'description' => 'Failed to insert into mysql',
        'data' => ''
        ));
}

$mysqli->close();
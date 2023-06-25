<?php
require 'mysqlconnection.php';
require 'writejson.php';

// Insert a new record into the "game" table
$insertQuery = "INSERT INTO game (one, two, three, four, five, six, seven, eight, nine)
               VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0)";
if ($mysqli->query($insertQuery) === TRUE) {
    $id = $mysqli->insert_id;
    WriteJson(200, '', array('gameid' => $id));
} else {
    WriteJson(400,'Failed to insert into MYSQL',null);

}

$mysqli->close();
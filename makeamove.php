<?php
require 'mysqlconnection.php';
require 'writejson.php';


//player always play 1 computer is 2
$whattochange = $_GET['field']; //one two three
$gameid = $_GET['gameid'];
$sql = "UPDATE game SET ".$whattochange." = 1 WHERE id = ".$gameid;


if ($mysqli->query($sql) === TRUE) {
    WriteJson(200,'',null);
    echo json_encode(array(
        'status' => 200,
        'description' => '',
        'data' => ''
        ));
} else {
    WriteJson(400,'Failed to make a move',null);
}




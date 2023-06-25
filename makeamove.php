<?php
// Replace with your actual MySQL database credentials
$hostname = '127.0.0.1';
$username = 'ja';
$password = 'password';
$database = 'main';


$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    echo json_encode(array(
        'status' => 400,
        'description' => 'FAiled to connect to mysql',
        'data' => ''
        ));
    exit();
}

//player always play 1 computer is 2
$whattochange = $_GET['field']; //one two three
$gameid = $_GET['gameid'];
$sql = "UPDATE game SET ".$whattochange." = 1 WHERE id = ".$gameid;


if ($mysqli->query($sql) === TRUE) {
    echo json_encode(array(
        'status' => 200,
        'description' => '',
        'data' => ''
        ));
} else {
    echo json_encode(array(
        'status' => 400,
        'description' => 'Failed to make a move',
        'data' => ''
        ));
}




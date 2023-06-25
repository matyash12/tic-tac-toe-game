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
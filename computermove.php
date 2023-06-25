<?php


function makeMove($board)
{
    $availableMoves = array_keys($board, 0); // Get indices of empty cells

    if (empty($availableMoves)) {
        return false; // No available moves, game is over
    }

    $randomMoveIndex = array_rand($availableMoves); // Choose a random move index
    $move = $availableMoves[$randomMoveIndex];


    return $move; // Return the updated board state
}




require 'mysqlconnection.php';
require 'writejson.php';


$id = $_GET['id'];

// Select all records from the "game" table
$selectQuery = "SELECT * FROM game WHERE id='" . $id . "'";
$result = $mysqli->query($selectQuery);

// Check if any records were found
if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();
    $move = makeMove($row);
    if ($move == false) {
        WriteJson(400,'Cant make a move',null);
    }

    //player always play 1 computer is 2
    $sql = "UPDATE game SET " . $move . " = 2 WHERE id = " . $id;


    if ($mysqli->query($sql) === TRUE) {
        WriteJson(200,'',null);
    } else {
        WriteJson(400,'Failed to make a move',null);
    }
} else {
    WriteJson(400,'Cant find the game',null);

}

$mysqli->close();
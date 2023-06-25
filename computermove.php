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

$id = $_GET['id'];

// Select all records from the "game" table
$selectQuery = "SELECT * FROM game WHERE id='" . $id . "'";
$result = $mysqli->query($selectQuery);

// Check if any records were found
if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();
    $move = makeMove($row);
    if ($move == false) {
        echo json_encode(
            array(
                'status' => 400,
                'description' => 'Cant make a move'
            )
        );
    }

    //player always play 1 computer is 2
    $sql = "UPDATE game SET " . $move . " = 2 WHERE id = " . $id;


    if ($mysqli->query($sql) === TRUE) {
        echo json_encode(
            array(
                'status' => 200,
                'description' => '',
                'data' => ''
            )
        );
    } else {
        echo json_encode(
            array(
                'status' => 400,
                'description' => 'Failed to make a move',
                'data' => ''
            )
        );
    }
} else {
    echo json_encode(
        array(
            'status' => 400,
            'description' => 'Cant find the game',
            'data' => ''
        )
    );
}

$mysqli->close();
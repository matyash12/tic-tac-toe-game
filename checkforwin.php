<?php
require 'mysqlconnection.php';
require 'writejson.php';

function checkWin($board, $player) {
    $winningCombinations = [
       ['one', 'two', 'three'],     // Top row
        ['four', 'five', 'six'],     // Middle row
        ['seven', 'eight', 'nine'],  // Bottom row
        ['one', 'four', 'seven'],    // Left column
        ['two', 'five', 'eight'],    // Middle column
        ['three', 'six', 'nine'],    // Right column
        ['one', 'five', 'nine'],     // Diagonal from top-left to bottom-right
        ['three', 'five', 'seven']// Diagonal from top-right to bottom-left
    ];
    
    foreach ($winningCombinations as $combination) {
        $isWin = true;
        foreach ($combination as $position) {
            if ($board[$position] !== $player) {
                $isWin = false;
                break;
            }
        }
        if ($isWin) {
            return true; // Player wins
        }
    }
    
    return false; // No win
}



$id = $_GET['id'];

$selectQuery = "SELECT * FROM game WHERE id='" . $id . "'";
$result = $mysqli->query($selectQuery);

// Check if any records were found
if ($result->num_rows == 1) {

    $row = $result->fetch_assoc();
    
    if (checkWin($row,"1") == true){
        WriteJson(200,'',array('Win'=>1));
    }
    elseif (checkWin($row,"2") == true){
        WriteJson(200,'',array('Win'=>2));
    }else{
        WriteJson(200,'',array('Win'=>0));
    }

} else {
    WriteJson(400, 'Cant find the game', null);
}

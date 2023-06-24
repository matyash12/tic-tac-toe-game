<?php
// Replace with your actual MySQL database credentials
$hostname = 'localhost';
$username = 'root';
$password = 'password';
$database = 'main';

// Establish a connection to the MySQL database
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Insert a new record into the "game" table
$insertQuery = "INSERT INTO game (one, two, three, four, five, six, seven, eight, nine, whoplays)
               VALUES (1, 0, 1, 1, 0, 0, 1, 0, 1, 2)";
if ($mysqli->query($insertQuery) === TRUE) {
    echo "New record inserted successfully.";
} else {
    echo "Error inserting record: " . $mysqli->error;
}

// Retrieve records from the "game" table
$selectQuery = "SELECT * FROM game";
$result = $mysqli->query($selectQuery);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . "<br>";
        echo "one: " . $row['one'] . "<br>";
        echo "two: " . $row['two'] . "<br>";
        echo "three: " . $row['three'] . "<br>";
        echo "four: " . $row['four'] . "<br>";
        echo "five: " . $row['five'] . "<br>";
        echo "six: " . $row['six'] . "<br>";
        echo "seven: " . $row['seven'] . "<br>";
        echo "eight: " . $row['eight'] . "<br>";
        echo "nine: " . $row['nine'] . "<br>";
        echo "whoplays: " . $row['whoplays'] . "<br>";
        echo "--------------------------<br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
$mysqli->close();
?>

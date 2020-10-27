<?php

/*
    THIS SCRIPT IS USED TO DEMONSTRATE THAT WE CAN QUERY A DATABASE
    TO GET INFO FROM A TABLE.
*/

// Create a new DB 
$conn = new mysqli('localhost', 'titus', 'password', 'midtrade');

// Check if connection was successful
if ($conn->connect_error) {
    die('Conection Failed: ' . $conn->connect_error);
}

// Don't need prepared statement for this. You're just going to
// select all from the listings table

$sql = "SELECT * FROM listings";
$result = $conn->query($sql);

// Prepare an array for the results
$json_array = array();

// If I'm not getting any rows back
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($json_array, json_encode($row));
    }
} else {
    echo "You didn't get anything back";
}


if(sizeof($json_array) > 0) {
    echo json_encode($json_array);
} else {
    // Something went wrong if this happens.
    echo "something went wrong with json formatting";
}

?>
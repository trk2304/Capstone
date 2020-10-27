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
        $addTo = json_encode($row);
        array_push($json_array, $addTo);
    }
} else {
    echo "You didn't get anything back";
}

// Something went wrong if this happens.
if(sizeof($json_array) > 0) {
    var_dump($json_array);
} else {
    echo "something went wrong with json formatting";
}

?>
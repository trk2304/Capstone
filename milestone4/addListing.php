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

/**
 * Here are the steps for this script:
 * 
 * 1. Use the POST variable to grab relevant information. Scrub that information using htmlspecialchars and other relevant functions.
 * 2. Make a prepared statement to collect the userID from the user table based on the username. If the username doesn't exist, report that finding gracefully.
 * 3. Assuming that the username exist, generate a prepared statement with the username, userID, asking price, item description, and item name and INSERT into the table.
 * 4. Report success.
 */

?>
<?php

/*
    THIS SCRIPT IS USED TO DEMONSTRATE THAT WE CAN QUERY A DATABASE
    TO GET INFO FROM A TABLE.
*/

// Create a new connection to the database.
$conn = new mysqli('midn.cs.usna.edu', 'm213438', 'changeme', 'midtrade');

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

// Begin step 1. Check if the POST variable is set.
if(isset($_POST)) {

// Step 2: Collect the userID from the user table based on the username. userID is bound in $userID variable.
$stmt = $conn->prepare("SELECT userID FROM listings WHERE username = ?");

$username = $_POST['add_listing_username'];
htmlspecialchars($username);
$username = strip_tags($username);

$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($userID);
$stmt->fetch();

if(gettype($userID) != "integer") {
    die("The username does not exist");
}

$stmt->free_result();
$stmt->close();

// Step 2.1: Scrub the input given by the user.
// First, let's get the user's input
$itemName = htmlspecialchars($_POST['add_listing_itemname']);

$askingprice = $_POST['add_listing_price'];

$description = htmlspecialchars($_POST['add_listing_description']);

echo $username . " " . $userID . " " . $itemName . " " . $askingprice . " " . $description;

// Step 3: Generate a prepared statment to insert the information you've scrubbed.
$sql = "INSERT INTO listings (userID, username, ItemName, AskingPrice, ItemDescription) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('issds', $userID, $username, $itemName, $askingprice, $description);
$stmt->execute();


} else {
    echo 'Nothing submitted';
}

?>

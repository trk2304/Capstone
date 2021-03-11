<?PHP

// My goal here is to use this script to add the user to the database if they're new, then log them in. 
// If they're already in the User table, then log them in directly.

// Step 1. Let's get the database connected. I'll probably need a user object.

require_once("user.php");
$userObject = new User();

// Now let's check to see if this user exists already.

$exists = $userObject->getUser($_GET['display']);

if( $exists == null ) {
  // They don't exist. Add them to the user DB.
  $userObject->insertUser($_GET['display']);
}

// Redirect

header("Location: http://10.1.83.57:8080?$_GET");

?>
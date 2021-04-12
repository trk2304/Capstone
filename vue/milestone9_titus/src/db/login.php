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


// Get the token from the qString

$queryString = $_GET['qstring'];

$queryArray = explode("&", $queryString);

$tokenString = $queryArray[0];

$justToken = substr($tokenString, 6);

$user = $_GET['display'];

$fullNameString = $queryArray[3];

$fullNameArray = explode("+", $fullNameString);

print_r($fullNameArray);

// trim first 9 characters of last name string and last 3 characters.

$lastNameFirstStep = substr($fullNameArray[0], 9);

// This is the user's last name
$lastName = substr($lastNameFirstStep, 0, -3);


// This is the user's first name
$firstName = $fullNameArray[1];





// Redirect
header("Location: http://10.1.83.57:8080?token=$justToken&user=$user&firstName=$firstName&lastName=$lastName");
?>

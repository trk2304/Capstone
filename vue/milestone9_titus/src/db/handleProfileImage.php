<?php
require('user.php');
// Taken from this source for development purposes: https://stackoverflow.com/questions/61642547/php-response-to-preflight-request-doesnt-pass-access-control-check-it-does-n
// USE THESE HEADERS FOR EVERY SCRIPT THAT CALLS TO THE DB!!!!
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
    header("HTTP/1.1 200 OK");
    die();
}

if(isset($_POST)) {
    $userObject = new User();

    /* $profileImageName = time() . "_" . $FILES['image']['name'];

    $target = '/var/www/html/milestone6.1/src/images/' . basename($profileImageName); */

    $targetDirectory = '/var/www/html/MidTrade/Capstone/vue/milestone9_titus/src/images/';

    $profileImageName = basename($_FILES['image']['name']);

    $target = $targetDirectory . $profileImageName;

    if( move_uploaded_file($_FILES['image']['tmp_name'], $target) ) {
        echo "The file " . htmlspecialchars( basename( $_FILES['image']['name'] ) ) . " has been uploaded";

        $userObject->changeProfilePic($_POST['userID'], $profileImageName);

    } else {
        echo "Could not upload image.";
    }
} else {
  echo "Could not upload image";

}
?>

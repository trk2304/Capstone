<?php
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

require_once("image.php");

$imageObject = new Image();

if(isset($_GET)) {

  // Get the listingID
  $listingID = $_GET['id'];

  // Get the count

  $imageObject->deleteImageByListingID($listingID);


  echo $payload;  
} else {
  echo "There was some error.";
}


?>

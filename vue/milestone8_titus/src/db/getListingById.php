<?PHP 
/**
 * This script is meant to be the means by which a ListingBlock component can pull necessary information about a listing.
 */
require_once('listing.php');


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

$listingObject = new Listing();


// Need to get the ID from Axios API call.
if(isset($_POST)) {
    // Result holds listing based on provided ID.
    $id = json_decode(file_get_contents('php://input'), true);
    
    // Get the result of the call.
    $result = $listingObject->getListingByListingId($id["id"]);

    // Send the contents of the listing based on the listingID back to the front end.
    echo json_encode($result); 
}


?>
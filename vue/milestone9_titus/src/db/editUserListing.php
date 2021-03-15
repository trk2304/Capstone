<?PHP
/**
 * This script is meant to allow a user to add a new listing to the listing table.
 */

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

require_once('listing.php');

$listingObject = new Listing();

if(isset($_POST)) {
    $result = json_decode(file_get_contents('php://input'), true);
    // Type cast the price
    $price = (double)$result['price'];
    $listingObject->editListing($result['id'], $result['name'], $price, $result['description']);
}

?>

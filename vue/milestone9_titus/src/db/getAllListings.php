<?PHP 
/**
 * This script is meant to be the means by which a ListingBlock component can pull necessary information about a listing.
 */



require_once('listing.php');

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
}('listing.php');

$listingObject = new Listing();

// Result holds all listings in the table.
$result = $listingObject->getAllListings();

echo json_encode($result);
?>

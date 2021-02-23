<?PHP 
/**
 * This script is meant to be the means by which a ListingBlock component can pull necessary information about a listing.
 */
require_once('listing.php');

$listingObject = new Listing();

// Result holds all listings in the table.
$result = $listingObject->getAllListings();

echo json_encode($result);
?>
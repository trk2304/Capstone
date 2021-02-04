<?PHP 
/**
 * This script is meant to be the means by which a ListingBlock component can pull necessary information about a listing.
 */
require_once('listing.php');

$listingObject = new Listing();

// Passing in 1 for the only user in the db.
$result = $listingObject->getUserListings(1);

echo json_encode($result);
?>
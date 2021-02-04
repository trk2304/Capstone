<?PHP

require('listing.php');

$listingObject = new Listing();

$listingObject->addListing(1, "Bike", "Standard mountain bike.", 21.99, "sports");

?>

/**
 *$userID, $productName, $description, $price, $category
 */

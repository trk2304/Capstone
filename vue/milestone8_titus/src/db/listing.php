<?PHP

class Listing {

    private $db = null;

    public function __construct() {
        $this->db = mysqli_connect("localhost", "root", "password", "midtrade");

        if(!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    /**
     * Function adds a listing to the 'listing' table. Requires THIS user's userID in order to add.
     */
    public function addListing($userID, $productName, $description, $price, $category) {
        $stmt = $this->db->prepare("INSERT INTO listing (userID, description, productName, price, category) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('issds', $userID, $description, $productName, $price, $category);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * Requires the correct match of listingID and userID from the 'listing' table in order to delete a listing.
     * Don't forget to go back and account for images. This will be important.
     */
    public function deleteListing($listingID) {
        $stmt = $this->db->prepare("DELETE FROM listing WHERE listingID = ?");
        $stmt->bind_param('i', $listingID);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * Edit product name, product description, price, category, etc.
     * Don't forget to go back and account for images. This will be important.
     */
    public function editListing() {

    }

    /**
     * Provides all information on a listing based on the listingID
     */
    public function getUserListings($listingID) {
        $stmt = $this->db->prepare("SELECT * FROM listing WHERE userID = ?");
        $stmt-> bind_param('i', $listingID);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if(!$result) {
            exit('No rows');
        }

        $stmt->close();

        return $result;
    }

    /**
     * Requires a user as an argument. Is not included in the editListing function.
     */
    public function markAsSold() {

    }

}


?>
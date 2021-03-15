<?PHP

class Image {

    private $db = null;

    public function __construct() {
        $this->db = mysqli_connect("midn.cs.usna.edu", "m213438", "changeme", "midtrade");

        if(!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    /**
     * Function adds an image to the image_listing table based on the listing's ID..
     */
    public function insertImageByListingID($listingID, $path) {
        $stmt = $this->db->prepare("INSERT INTO image_listing (listingID, path) VALUES (?, ?)");
        $stmt->bind_param('is', $listingID, $path);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * This function deletes an image listing based on the listingID
     */
    public function deleteImageByListingID($listingID) {
        $stmt = $this->db->prepare("DELETE FROM image_listing WHERE listingID = ?");
        $stmt->bind_param('i', $listingID);
        $stmt->execute();
        $stmt->close();
    }


    /**
     *  This function returns a count of rows with a given listingID. Don't want more than 3 listings of a particular ID, so the system doesn't get swamped with a ridiculous amount of images.
     */
    public function countImagesByListingID($listingID) {
        $stmt = $this->db->prepare("SELECT count(*) as count FROM image_listing WHERE listingID = ?");
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
     * This funtion returns images based on listingID.
     */
    public function getImagesByListingID($listingID) {
      $stmt = $this->db->prepare("SELECT * FROM image_listing WHERE listingID = ?");
      $stmt->bind_param('i', $listingID);
      $stmt->execute();

      $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      if(!$result) {
        exit("NO ROWS!");
      }

      $stmt->close();
      return $result;
    }

}


?>

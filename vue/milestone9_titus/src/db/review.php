<?PHP

class Review {

    private $db = null;

    public function __construct() {
        $this->db = mysqli_connect("midn.cs.usna.edu", "m213438", "changeme", "midtrade");

        if(!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    /**
     * Returns the reviews about this user.
     */
    public function getReviewsOfThisUser($reviewedUserID) {
      $stmt = $this->db->prepare("SELECT * FROM review WHERE reviewedUserID = ?");
      $stmt->bind_param('s', $reviewedUserID);
      $stmt->execute();

      $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

      if(!$result) {
        $result = "No rows";
      }

      $stmt->close();

      return $result;
    }

    public function getReviewsIWrote($userID) {
      $stmt = $this->db->prepare("SELECT * FROM review WHERE userID = ?");
      $stmt->bind_param('s', $userID);
      $stmt->execute();

      $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

      if(!$result) {
        $result = "No rows";
      }

      $stmt->close();

      return $result;
    } 

    public function insertReview($userID, $reviewedUserID, $title, $description, $rating) {
      $stmt = $this->db->prepare("INSERT INTO review (userID, reviewedUserID, title, description, rating) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param('ssssi', $userID, $reviewedUserID, $title, $description, $rating);
      $stmt->execute();
      $stmt->close();
    }

    public function deleteReview($reviewID) {
      $stmt = $this->db->prepare("DELETE FROM review WHERE reviewID = ?");
      $stmt->bind_param('i', $reviewID);
      $stmt->execute();
      $stmt->close();
    }

    public function editReview($reviewID, $title, $description, $rating) {
      $stmt = $this->db->prepare("UPDATE review SET title = ?, description = ?, rating = ? WHERE reviewID = ?");
      $stmt->bind_param('ssii', $title, $description, $rating, $reviewID);
      $stmt->execute();
      $stmt->close();
    }

    public function getAverageRating($reviewedUserID) {
      $stmt = $this->db->prepare("SELECT AVG(rating) AS average FROM review WHERE reviewedUserID = ?");
      $stmt->bind_param('s', $reviewedUserID);
      $stmt->execute();

      $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

      if(!$result) {
        exit("No rows");
      }

      $stmt->close();

      return $result;
    }

}


?>

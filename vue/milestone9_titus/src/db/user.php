<?PHP

class User {
    
    private $db = null;

    public function __construct() {
        $this->db = mysqli_connect("midn.cs.usna.edu", "m213438", "changeme", "midtrade");

        if(!$this->db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function changeProfilePic($userID, $filePath) {
        $stmt = $this->db->prepare("UPDATE user SET profilePic = ? WHERE userID = ?");
        $stmt->bind_param('si', $filePath, $userID);
        $stmt->execute();
        $stmt->close();
    }

    public function changeBio($userID, $bio) {
        $stmt = $this->db->prepare("UPDATE user SET bio = ? WHERE userID = ?");
        $stmt->bind_param('si', $bio, $userID);
        $stmt->execute();
        $stmt->close();
    }

    /*
        Come back to this once you have some time with LCDR Kenney
    */
    public function getUser($userID) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE userID = ?");
        $stmt->bind_param('i', $userID);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if(!$result) {
            exit('No rows');
        }

        $stmt->close();

        return $result;
    }
}

?>

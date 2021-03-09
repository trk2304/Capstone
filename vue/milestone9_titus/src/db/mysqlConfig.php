<?PHP

// This file will establish db connection.
// Contents of this file are re-used from Titus Kilpatrick's IT360 project.

// Be sure to change $hostname to "midn.cs.usna.edu", $user to "m213438" and $password to "changeme" when using this on your issued laptop on the academy network!!

class myConnectDB extends mysqli {
    public function __construct(
        $hostname = "localhost",
        $user     = "root",
        $password = "password",
        $dbname   = "midtrade"
    ) 
    {
        parent::__construct($hostname, $user, $password, $dbname);
    }

}

?>
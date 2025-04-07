
<?php
class ddbb_controller{
    
    private $conn;
 
    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $bbdd = "easytiket";
        $this->conn= new mysqli($servername, $username, $pass, $bbdd); 
    }
}
?>
<?php

session_start();
//Todo lo de la conexion en la clase signin
$servername = "localhost";
$username = "root";
$pass = "";
$bbdd = "easytiket";

$conn = new mysqli($servername, $username, $pass, $bbdd);

if ($conn == $conn_error) {
    die("Connection error". $conn_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new user_controller();

    if (isset($_POST["sign_in"])) {
        echo "<p>Sign in button is clicked.</p>";
        $user->sign_in();
    }
    if (isset($_POST["sign_out"])) {
        echo "<p>Sign out button is clicked.</p>";
        $user->sign_out();
    }
    if (isset($_POST["sign_up"])) {
        echo "<p>Sign up button is clicked.</p>";           
        $user->sign_up();
    }
}

class user_controller{
    
    private $conn;
    
    public function __construct(){
        
    }
    
    public function sign_in(): void{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = trim($_POST["user"]);
            $gmail = trim($_POST["gmail"]);
            $password = trim($_POST["password"]);
        }
        
    }

    public function sign_out(): void{

    }

    public function sign_up(): void{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = trim($_POST["user"]);
            $gmail = trim($_POST["gmail"]);
            $password = trim($_POST["password"]);
            $conf_pass = trim($_POST["conf_pass"]);
        }
    }
}

?>
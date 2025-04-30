<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $userController = new user_controller();

    if (isset($_POST["sign_in"])) 
    {
       $userController->sign_in();

    }elseif (isset($_POST["sign_up"])) 
    {
        $userController->sign_up();

    }elseif (isset($_POST["sign_out"])) 
    {
        $userController->sign_out();

    }else
    {
        echo "<h1>Error 404</h1>";
    }
}

class user_controller
{

    private $conn;
     
    public function __construct() 
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "easytiket";

        $this->conn = new mysqli("localhost", "root", "", "easytiket");
        
        if ($this->conn->connect_error) 
        {
            die("connection failed" . $this->conn->connect_error);
        }
    }

    public function sign_in()
    {
        $gmail = trim($_POST["gmail"]);
        $pass = trim($_POST["pass"]);
    
        $query = "SELECT gmail, pass FROM usuarios WHERE gmail=? and pass=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $gmail, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) 
        {
            $_SESSION["logged"] = true;
            $_SESSION["gmail"] = $row["gmail"];
            $_SESSION["pass"] = $row["pass"];

            $this->conn->close();

            header(header: "Location: ../view/web.php");
            return true;
        }else
        {
            $_SESSION["logged"] = false;
            $_SESSION["sign_in_error"] = "Gmail or Password are wrong";
            $this->conn->close();
            header("Location: ../view/sign_in.php");
            return false;
        }
        
    }
    
    public function sign_up()
    {
            $user = trim($_POST["user"]);
            $gmail = trim($_POST["gmail"]);
            $pass = trim($_POST["pass"]);
            $conf_pass = trim($_POST["conf_pass"]);

            
            if ($pass != $conf_pass)
            {
                $_SESSION["pass_error"] = "Passwords doesn´t match";
                $this->conn->close();
                header("Location: ../view/sign_up.php");
                return false;
            }

            $query = "INSERT INTO usuarios (user, gmail, pass) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sss", $user, $gmail, $pass);       

            if ($stmt->execute() == true) 
            {
                $_SESSION["signed"] = true;
                $this->conn->close();
        
                header(header: "Location: ../view/sign_in.php");
                return true;
            }else
            {
                $_SESSION["signed"] = false;
                $_SESSION["sign_up_error"] = "User, Gmail or Password are invalid";
                $this->conn->close();
                header("Location: ../view/sign_in.php");
                return false;
            }


    }

    public function sign_out(): void 
    {
        session_unset();

        session_destroy();
        header("Location: ../view/sign_in.php");
    }

}
?>
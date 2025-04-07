<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = new user_controller();
    $user->get_users();

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
        if($user->sign_up()){
          //Ir al home
        }else{
            //mostrar errores
        }
    }
   
}

class user_controller
{

    private $conn;

    public function __construct()
    {
        $conn = new ddbb_controller();
    }
    public function get_users(): array
    {
        $usersList = array();
        $sql = "SELECT * from  users where user =? and password=?";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $usersList[$row["id"]] = new User($row["id"], $row["name"], $row["gmail"]);
            }
        }
        $this->conn->close();
        return $usersList;
    }
    public function sign_in()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = trim($_POST["user"]);
            $gmail = trim($_POST["gmail"]);
            $password = trim($_POST["password"]);

            $sql = "SELECT * from  users where user = $user and gmail = $gmail and passwor = $password";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                return true;
            }
        }
        $this->conn->close();
        return false;

    }

    public function sign_out(): void {}

    public function sign_up()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = trim($_POST["user"]);
            $gmail = trim($_POST["gmail"]);
            $password = trim($_POST["password"]);
            $conf_pass = trim($_POST["conf_pass"]);

            $sql = "INSERT into usuarios values(users, gmail, passwor)";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                return true;
            }
            $this->conn->close();
        }

        if (empty($gmail)) {
            $errors[] = "Gmail is reuired";
        } elseif (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid gmail format";
        }

        //valdar si la contraseña coincide con el confirmar contraseña
        if (empty($conf_pass)) {
            $errors[] = "Confirm password is required";
        } elseif ($password != $conf_pass) {
            $errors[] = "Passwords don´t match";
        }
        return false;
    }
}
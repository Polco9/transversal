<?php

session_start();

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$pass = "";
$bbdd = "easytiket";

$conn = new mysqli($servername, $username, $pass, $bbdd);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Obtener datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST["user"]);
    $gmail = trim($_POST["gmail"]);
    $password = trim($_POST["password"]);
    $conf_pass = trim($_POST["conf_pass"]);
    
    //prueba de errores
    $errors = [];

    // Validar usuario no esta vacio
    if (empty($user)) {
        $errors[] = "User is reguired";
    }
    
    //validar formato gmail
    if (empty($gmail)) {
        $errors[] = "Gmail is reuired";
    }elseif (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "iNVALID gMAIL FORMAT";
    }

    //validar contraseña teien 8 o mas caracteres    
    if (empty($password)) {
        $errors[] = "Password is required";
    }elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }

    //valdar si la contraseña coincide con el confirmar contraseña
    if (empty($conf_pass)) {
        $errors[] = "Confirm password is required";
    }elseif ($password != $conf_pass) {
        $errors[] = "Passwords don´t match";
    }
    //verificar si usuario y gmail ya existen

   
}

$conn->close();
?>
<?php
include('setupDB.php');
require_once ('functions.inc.php');

// Wenn Login Butten geklickt
if (isset($_POST["submit"])) {

    // Holen: Email, Passwort
    $email = $_POST["email"];
    $password = $_POST["passwort"];

    // Wenn Eingabe leer
    if (emptyInputLogin($email, $password) !== false) {
        header("location: ../PHP/login.php?error=emptyInput");
        exit();
    }

    loginUser($conn, $email, $password);
} else {
    header("location: ../PHP/index.php");
    exit();
}
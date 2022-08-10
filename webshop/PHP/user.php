<?php
include('setupDB.php');
require_once ('functions.inc.php');


// Holen: Name, Vorname, Email, Passwort
$vorname = $_POST['vorname'];         
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['passwort'];
$pwdRepeat = $_POST["confirmPasswort"];


// Leere Eingabe
if (emptyInputSignup($vorname, $name, $email, $password, $pwdRepeat) !== false) {
    header("location: ../PHP/signup.php?error=emptyinput");
    exit();
}
// Email fehlerhaft
if (invalidEmail($email) !== false) {
    header("location: ../PHP/signup.php?error=invalidemail");
    exit();
}
// User existiert bereits
if (emailExists($conn, $email) !== false){
    header("location: ../PHP/signup.php?error=emailtaken");
    exit();
}


// Preparation of insert statement
$tname = 'nutzer';
$name1 = 'name';
$name2 = 'vorname';
$name3 = 'email';
$name4= 'password';
$ins = "INSERT INTO $tname($name1, $name2, $name3, $name4) VALUES (?, ?, ?, ?)";
$ps = $conn -> prepare($ins);


// // Function to insert a new user
function insertUser($p, $n1, $n2, $n3, $n4) {
    $p -> bind_param('ssss', $n1, $n2, $n3, $n4);
    if (!$p -> execute()) {
        die("Hinzufügen fehlgeschlagen: " . $conn -> error);
    }
    echo ($n1 . " " . $n2 .  " wurde erfolgreich hinzugefügt! <br>");
}

$f1 = $name;
$f2 = $vorname;
$f3 = $email;
$f4 = $password;


// Execution of the insertion function
insertUser($ps, $f1, $f2, $f3, $f4);

// close the connection
$conn -> close();
?>

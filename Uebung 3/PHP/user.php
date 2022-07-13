<?php
include('setupDB.php');


$name = $_POST['name'];         // [...] müsste aus formular2.html Inhalt nehmen
$vorname = $_POST['vorname'];
$email = $_POST['email'];
$password = $_POST['passwort'];


//preparation of insert statement
$tname = 'nutzer';
$name1 = 'name';
$name2 = 'vorname';
$name3 = 'email';
$name4= 'password';
$ins = "INSERT INTO $tname($name1, $name2, $name3, $name4) VALUES (?, ?, ?, ?)";
$ps = $conn -> prepare($ins);


//function to insert a new user
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


//execution of the insertion function
insertUser($ps, $f1, $f2, $f3, $f4);

// close the connection
$conn -> close();
?>

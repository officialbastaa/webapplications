<?php
include('setupDB.php');
require_once ('functions.inc.php');


if (isset($_REQUEST["name"]) && isset($_REQUEST["lastName"]) && isset($_REQUEST["email"]) && isset($_REQUEST["password"]) && isset($_REQUEST["confirmPasswort"]) ) {
  // Holen: Name, Vorname, Email, Passwort
  $vorname = $_REQUEST["name"];
  $name = $_REQUEST["lastName"];
  $email = $_REQUEST["email"];
  $password = $_REQUEST["password"];
  $pwdRepeat = $_REQUEST["confirmPasswort"];

  if (invalidEmail($email) !== false) {
      echo '{"nachricht": "Wähle eine echte Email Adresse"}';
      exit();
  }

  if (emailExists($conn, $email) !== false){
      echo '{"nachricht": "Es gibt schon ein Konto mit dieser Email"}';
      exit();
  }

  // Function to insert a new user
  function insertUser($p, $n1, $n2, $n3, $n4) {
      $p -> bind_param('ssss', $n1, $n2, $n3, $n4);
      if (!$p -> execute()) {
          die("Hinzufügen fehlgeschlagen: " . $conn -> error);
      }
      echo '{"nachricht": "Konto wurde erfolgreich erstellt!"}';
  }

  // Preparation of insert statement
  $tname = 'nutzer';
  $name1 = 'name';
  $name2 = 'vorname';
  $name3 = 'email';
  $name4= 'password';
  $ins = "INSERT INTO $tname($name1, $name2, $name3, $name4) VALUES (?, ?, ?, ?)";
  $ps = $conn -> prepare($ins);

  insertUser($ps, $name, $vorname, $email, $password);

}

// close the connection
$conn -> close();
?>

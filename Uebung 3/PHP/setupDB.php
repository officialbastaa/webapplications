<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'minishop';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$show = '';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connection_error);
}
else {
    $show .= "Die Verbindung zur Datenbank war erfolgreich!";
}



$sql1 = "CREATE TABLE IF NOT EXISTS nutzer(id INT(6) AUTO_INCREMENT, name VARCHAR(20), vorname VARCHAR(20), email VARCHAR(30), password VARCHAR(20), PRIMARY KEY(id))";
if (!$conn -> query($sql1)) {
    die('Tabelle-Erzeugen fehlgeschlagen: ' . $conn -> error);
}

$sql2 = "CREATE TABLE IF NOT EXISTS artikel(id INT(6) AUTO_INCREMENT, name VARCHAR(20), preis FLOAT, anzahl INT(4), beschreibung VARCHAR(40), bild MEDIUMBLOB, PRIMARY KEY(id))";
if (!$conn -> query($sql2)) {
    die('Tabelle-Erzeugen fehlgeschlagen: ' . $conn -> error);
}

$sql3 = "CREATE TABLE IF NOT EXISTs bestellungen(nid INT(6), aid INT(6), anzahl INT(4), bestelldatum DATE, FOREIGN KEY (nid) REFERENCES nutzer(id), FOREIGN KEY (aid) REFERENCES artikel(id))";
if (!$conn -> query($sql3)) {
    die('Tabelle-Erzeugen fehlgeschlagen: ' . $conn -> error);
}

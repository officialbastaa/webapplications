<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'minishop';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connection_error);
}

$sql = "CREATE TABLE IF NOT EXISTS nutzer(id INT(6) AUTO_INCREMENT, name VARCHAR(20), vorname VARCHAR(20), email VARCHAR(30), password VARCHAR(20), PRIMARY KEY(id))";
$sql = "CREATE TABLE IF NOT EXISTS artikel(id INT(6) AUTO_INCREMENT, name VARCHAR(20), preis FLOAT, anzahl INT(4), beschreibung VARCHAR(40), bild MEDIUMBLOB, PRIMARY KEY(id))";
$sql = "CREATE TABLE IF NOT EXISTS bestellung(anzahl INT(4), bestelltan DATE";

$conn -> query($sql) or die('Ein Fehler!');
?>
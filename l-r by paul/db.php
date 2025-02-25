<?php
// Setează parametrii pentru conexiunea la baza de date
$servername = "localhost";  // Serverul bazei de date (în mod uzual 'localhost' pentru dezvoltare locală)
$username = "root";  // Numele de utilizator pentru conexiune la MySQL
$password = "";  // Parola pentru MySQL
$dbname = "user_system";  // Numele bazei de date

// Creează conexiunea la baza de date MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifică dacă conexiunea a eșuat
if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);  // Dacă conexiunea eșuează, afișează eroarea și oprește scriptul
}
?>

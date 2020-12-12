<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warsztat";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $connect_error);
}

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$telefon = $_POST['telefon'];
$adres = $_POST['adres'];

$sql = "INSERT INTO klient ( imie, nazwisko, telefon, adres) VALUES ('$imie', '$nazwisko', '$telefon', '$adres');";


if ($conn->query($sql)) {
    echo "Zakończono pomyślnie. ps. więcej styli juz za tydzień";
} else {
    echo "Zakończono niepowodzeniem." . $conn->error;
}

$conn->close();

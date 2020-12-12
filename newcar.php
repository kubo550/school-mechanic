<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warsztat";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $connect_error);
}

$marka = $_POST['marka'];
$model = $_POST['model'];
$rocznik = $_POST['rocznik'];
$przebieg = $_POST['przebieg'];

$sql = "INSERT INTO `samochod` ( `id_klienta`, `marka`, `model`, `rocznik`, `przebieg`) VALUES ( '1', '$marka', '$model', '$rocznik', '$przebieg');";


if ($conn->query($sql)) {
    echo "Zakończono pomyślnie. ps. więcej styli juz za tydzień";
} else {
    echo "Zakończono niepomyślnie." . $conn->error;
}

$conn->close();

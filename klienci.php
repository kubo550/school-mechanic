<?php
require_once("connect.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['klientSubmit'])) {
    if ($conn->connect_error) die("Connection error: " . $connect_error);
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $telefon = $_POST['telefon'];
    $adres = $_POST['adres'];

    $sql = "INSERT INTO klient ( imie, nazwisko, telefon, adres) VALUES ('$imie', '$nazwisko', '$telefon', '$adres');";

    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
};

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM `klient` WHERE `klient`.`id` = $id";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}

if (isset($_POST['editKlient'])) {
    $id = $_POST['eid'];
    $imie = $_POST['eimie'];
    $nazwisko = $_POST['enazwisko'];
    $telefon = $_POST['etelefon'];
    $adres = $_POST['eadres'];

    $sql = "UPDATE `klient` SET `imie` = '$imie', `nazwisko` = '$nazwisko', `telefon` = '$telefon', `adres` = '$adres' WHERE `klient`.`id` = $id";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}


?>

<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Dodaj Klienta</h2>
        <hr />

        <div class="form-wrapper">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Imię</label>
                    <input type="text" required name="imie" class="form-control" placeholder="Jakub">
                </div>
                <div class="form-group">
                    <label>Nazwisko</label>
                    <input type="text" required name="nazwisko" class="form-control" placeholder="Kurdziel">
                </div>
                <div class="form-group">
                    <label>Telefon</label>
                    <input type="text" required name="telefon" class="form-control" placeholder="601602603">
                </div>
                <div class="form-group">
                    <label>Adres</label>
                    <input type="text" required name="adres" class="form-control" placeholder="krakow 15">
                </div>
                <div class="text-center">
                    <button type="submit" name="klientSubmit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>

        <hr />
        <h2 class="text-center my-5">Nasi Klienci</h2>


        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Telefon</th>
                    <th class="text-right px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `klient`";
                $res = mysqli_query($conn, $query);


                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<th width='10%' scope='row'>" . $row["id"] . "</th>";
                    echo "<td width='20%'>" . $row["imie"] . "</td>";
                    echo "<td width='30%'>" . $row["nazwisko"] . "</td>";
                    echo "<td width='20%'>" . $row["telefon"] . "</td>";
                    echo  "
                    <td width='20%' class='text-right'>
                        <button class='btn btn-info'> 
                        <a href='editKlienci.php?edit=" . $row["id"] . "'>
                            <i class='fas fa-edit text-light'></i>
                        </button>
                        <button class='btn btn-danger'>
                            <a href='" . $_SERVER['PHP_SELF'] . "?delete=" . $row["id"] . "'>
                                <i class='fas fa-trash text-light'></i> 
                            </a>
                        </button> 
                    </td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
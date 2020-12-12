<?php
require_once("connect.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['klientSubmit'])) {

    if ($conn->connect_error) {
        die("Connection error: " . $connect_error);
    }

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $telefon = $_POST['telefon'];
    $adres = $_POST['adres'];

    $sql = "INSERT INTO klient ( imie, nazwisko, telefon, adres) VALUES ('$imie', '$nazwisko', '$telefon', '$adres');";


    if ($conn->query($sql)) {
        echo "<div id='message'> Zmiany zostały zachowane pomyślnie! </div>";
    } else {
        echo "<div class='error' id='message'>Wystąpił błąd! </div>" . $conn->error;
    }
};

?>

<!DOCTYPE html>
<html lang="pl">


<body>
    <?php echo file_get_contents('header.php'); ?>

    <div class="container">
        <div class="form-wrapper">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput">Imię</label>
                    <input type="text" required name="imie" class="form-control" placeholder="Jakub">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Nazwisko</label>
                    <input type="text" required name="nazwisko" class="form-control" placeholder="Kurdziel">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Telefon</label>
                    <input type="text" required name="telefon" class="form-control" placeholder="601602603">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Adres</label>
                    <input type="text" required name="adres" class="form-control" placeholder="krakow 15">
                </div>
                <div class="text-center">
                    <button type="submit" name="klientSubmit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>
        <div class="table">
            <table>

                <?php
                $query = "SELECT * FROM `klient`";
                $res = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["imie"] . "</td>";
                    echo "<td>" . $row["nazwisko"] . "</td>";
                    echo "<td>" . $row["telefon"] . "</td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>
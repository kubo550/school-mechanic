<?php
require_once("connect.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['samochodySumbit'])) {
    if ($conn->connect_error) {
        die("Connection error: " . $connect_error);
    }

    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $rocznik = $_POST['rocznik'];
    $przebieg = $_POST['przebieg'];

    $sql = "INSERT INTO `samochod` ( `id_klienta`, `marka`, `model`, `rocznik`, `przebieg`) VALUES ( '1', '$marka', '$model', '$rocznik', '$przebieg');";


    if ($conn->query($sql)) {
        echo "<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>";
    } else {
        echo "<div class='error' id='message'>Wystąpił błąd! </div>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pl">

<body>
    <?php echo file_get_contents('header.php'); ?>

    <div class="container">
        <div class="form-wrapper">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput">Marka</label>
                    <input type="text" required name="marka" class="form-control" placeholder="Opel">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Model</label>
                    <input type="text" required name="model" class="form-control" placeholder="Astra">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Rocznik</label>
                    <input type="text" required name="rocznik" class="form-control" placeholder="2001">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Przebieg</label>
                    <input type="numbe requiredr" name="przebieg" class="form-control" placeholder="30000">
                </div>
                <div class="text-center">
                    <button type="submit" name="samochodySumbit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>

        <div class="table">
            <table>

                <?php
                $query = "SELECT * FROM `samochod`";
                $res = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["marka"] . "</td>";
                    echo "<td>" . $row["model"] . "</td>";
                    echo "<td>" . $row["rocznik"] . "</td>";
                    echo "<td>" . $row["przebieg"] . "km </td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</body>

</html>
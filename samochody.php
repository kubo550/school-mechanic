<?php
require_once("connect.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['samochodySumbit'])) {
    if ($conn->connect_error) die("Connection error: " . $connect_error);
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $rocznik = $_POST['rocznik'];
    $przebieg = $_POST['przebieg'];

    $sql = "INSERT INTO `samochod` ( `id_klienta`, `marka`, `model`, `rocznik`, `przebieg`) VALUES ( '1', '$marka', '$model', '$rocznik', '$przebieg');";

    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM `samochod` WHERE `samochod`.`id` = $id";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}

if (isset($_POST['editSamochod'])) {
    $id = $_POST['eid'];
    $marka = $_POST['emarka'];
    $model = $_POST['emodel'];
    $rocznik = $_POST['erocznik'];
    $przebieg = $_POST['eprzebieg'];

    $sql = "UPDATE `samochod` SET `marka` = '$marka', `model` = '$model', `rocznik` = '$rocznik', `przebieg` = '$przebieg' WHERE `samochod`.`id` = $id";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}

?>
<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Dodaj Samochód</h2>
        <hr />

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

        <hr />
        <h2 class="text-center my-5">Wszystkie Samochody</h2>


        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marka</th>
                    <th scope="col">Model</th>
                    <th scope="col">Rocznik</th>
                    <th scope="col">Przebieg</th>
                    <th class="text-right px-4">Actions</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $query = "SELECT * FROM `samochod`";
                $res = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td class='thead-dark' >" . $row["id"] . "</td>";
                    echo "<td>" . $row["marka"] . "</td>";
                    echo "<td>" . $row["model"] . "</td>";
                    echo "<td>" . $row["rocznik"] . "</td>";
                    echo "<td>" . $row["przebieg"] . "km </td>";
                    echo  "
                    <td width='20%' class='text-right'>
                        <button class='btn btn-info'> 
                        <a href='editSamochody.php?edit=" . $row["id"] . "'>
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
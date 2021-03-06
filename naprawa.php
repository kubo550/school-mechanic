<?php
require_once("connect.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['naprawaSubmit'])) {
    if ($conn->connect_error) die("Connection error: " . $connect_error);

    $ID_SAMOCHODU = 1;
    $ID_MECHANIKA = 2;
    $data = $_POST['data'];
    $kwota = $_POST['kwota'];

    $sql = "INSERT INTO `naprawa` (`id_samochodu`, `id_mechanika`, `data_naprawy`, `kwota`) VALUES ('$ID_SAMOCHODU', '$ID_SAMOCHODU', '$data', '$kwota');";

    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
};
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM `naprawa` WHERE `naprawa`.`id` = $id";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}

if (isset($_POST['editNaprawa'])) {
    $id = $_POST['eid'];
    $data = $_POST['edata'];
    $kwota = $_POST['ekwota'];


    $sql = "UPDATE `naprawa` SET `data_naprawy` = '$data', `kwota` = '$kwota' WHERE `naprawa`.`id` = $id";
    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! $conn->error </div>");
}
?>

<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Dodaj Naprawę</h2>
        <hr />

        <div class="form-wrapper">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Data</label>
                    <input type="date" required name="data" class="form-control">
                </div>

                <div class="form-group">
                    <label>Kwota</label>
                    <input type="text" required name="kwota" class="form-control" placeholder="np. 400">
                </div>

                <div class="text-center">
                    <button type="submit" name="naprawaSubmit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>

        <hr />
        <h2 class="text-center my-5">Nasze Naprawy</h2>



        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data Naprawy</th>
                    <th scope="col">Kwota</th>
                    <th class="text-right px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `naprawa`";
                $res = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["data_naprawy"] . "</td>";
                    echo "<td>" . $row["kwota"] . " zł </td>";
                    echo  "
                    <td width='20%' class='text-right'>
                        <button class='btn btn-info'> 
                        <a href='editNaprawa.php?edit=" . $row["id"] . "'>
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
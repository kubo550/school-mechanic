<?php
require_once("connect.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['czesciSubmit'])) {
    if ($conn->connect_error) die("Connection error: " . $connect_error);
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $stan = $_POST['stan_magazynowy'];

    $sql = "INSERT INTO `czesc` (`nazwa`, `cena`, `stan_magazynowy`) VALUES ('$nazwa', '$cena', '$stan');";

    echo $conn->query($sql) ? ("<div class='success' id='message'> Zmiany zostały zachowane pomyślnie! </div>") : ("<div class='error' id='message'>Wystąpił błąd! </div>" . $conn->error);
};
?>

<!DOCTYPE html>
<html lang="pl">

<body>
    <?php echo file_get_contents('header.php'); ?>

    <div class="container">
        <h2>Dodaj część do magazynu</h2>
        <hr />

        <div class="form-wrapper">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Nazwa</label>
                    <input type="text" required name="nazwa" class="form-control" placeholder="Chłodnica">
                </div>
                <div class="form-group">
                    <label>Cena</label>
                    <input type="text" required name="cena" class="form-control" placeholder="100">
                </div>
                <div class="form-group">
                    <label>Stan Magazynowy</label>
                    <input type="number" required name="stan_magazynowy" class="form-control" placeholder="1">
                </div>
                <div class="text-center">
                    <button type="submit" name="czesciSubmit" class="btn btn-primary">Dodaj</button>
                </div>
            </form>
        </div>

        <hr />
        <h2 class="text-center my-5">Nasze Części</h2>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Stan Magazynowy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `czesc`";
                $res = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nazwa"] . "</td>";
                    echo "<td>" . $row["cena"] . "zł </td>";
                    echo "<td>" . $row["stan_magazynowy"] . "</td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
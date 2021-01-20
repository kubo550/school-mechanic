<?php
require_once("connect.php");
$id = $_GET['edit'];

$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT id, nazwa, cena, stan_magazynowy FROM czesc WHERE id = $id";
if ($res = $conn->query($query)) {
    $row =  $res->fetch_assoc();

    $nazwa = $row['nazwa'];
    $cena = $row['cena'];
    $stan_magazynowy = $row['stan_magazynowy'];
}

?>

<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Edycja Częsci</h2>
        <hr />

        <div class="form-wrapper">
            <form action="czesci.php" method="POST">

                <input type="hidden" value="<?php echo $id ?>" name="eid">

                <div class="form-group">
                    <input type="text" value="<?php echo $nazwa ?>" required name="enazwa" class="form-control" placeholder="Nazwa">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $cena ?>" required name="ecena" class="form-control" placeholder="Cena">
                </div>
                <div class="form-group">
                    <input type="number" value="<?php echo $stan_magazynowy ?>" required name="estan_magazynowy" class="form-control" placeholder="Stan Magazynowy">
                </div>

                <div class="text-center">
                    <button type="submit" name="editCzesci" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>
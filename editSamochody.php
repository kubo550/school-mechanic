<?php
require_once("connect.php");
$id = $_GET['edit'];

$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT id, model, marka, rocznik, przebieg FROM samochod WHERE id = $id";
if ($res = $conn->query($query)) {
    $row =  $res->fetch_assoc();

    $marka = $row['marka'];
    $model = $row['model'];
    $rocznik = $row['rocznik'];
    $przebieg = $row['przebieg'];
}

?>

<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Edycja Samochodu</h2>
        <hr />

        <div class="form-wrapper">
            <form action="samochody.php" method="POST">

                <input type="hidden" value="<?php echo $id ?>" name="eid">

                <div class="form-group">
                    <input type="text" value="<?php echo $marka ?>" required name="emarka" class="form-control" placeholder="Marka">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $model ?>" required name="emodel" class="form-control" placeholder="Model">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $rocznik ?>" required name="erocznik" class="form-control" placeholder="Rocznik">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $przebieg ?>" required name="eprzebieg" class="form-control" placeholder="Adres">
                </div>
                <div class="text-center">
                    <button type="submit" name="editSamochod" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>
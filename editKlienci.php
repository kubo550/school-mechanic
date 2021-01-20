<?php
require_once("connect.php");
$id = $_GET['edit'];

$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT id, imie, nazwisko, telefon, adres FROM klient WHERE id = $id";
if ($res = $conn->query($query)) {
    $row =  $res->fetch_assoc();

    $imie = $row['imie'];
    $nazwisko = $row['nazwisko'];
    $telefon = $row['telefon'];
    $adres = $row['adres'];
}

?>

<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h2>Edycja Klienta</h2>
        <hr />

        <div class="form-wrapper">
            <form action="klienci.php" method="POST">

                <input type="hidden" value="<?php echo $id ?>" name="eid">

                <div class="form-group">
                    <input type="text" value="<?php echo $imie ?>" required name="eimie" class="form-control" placeholder="Imię">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $nazwisko ?>" required name="enazwisko" class="form-control" placeholder="Nazwisko">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $telefon ?>" required name="etelefon" class="form-control" placeholder="Numer Telefonu">
                </div>
                <div class="form-group">
                    <input type="text" value="<?php echo $adres ?>" required name="eadres" class="form-control" placeholder="Adres">
                </div>
                <div class="text-center">
                    <button type="submit" name="editKlient" class="btn btn-primary">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>